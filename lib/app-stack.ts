import {Certificate, CertificateValidation} from "aws-cdk-lib/aws-certificatemanager";
import {Vpc,} from "aws-cdk-lib/aws-ec2";

import {
    AwsLogDriver,
    Cluster,
    ContainerDefinition,
    ContainerImage,
    FargateTaskDefinition,
    PropagatedTagSource,
    Secret,
} from "aws-cdk-lib/aws-ecs";
import {ApplicationLoadBalancedFargateService} from "aws-cdk-lib/aws-ecs-patterns";

import {HostedZone} from "aws-cdk-lib/aws-route53";
import * as cdk from "aws-cdk-lib";
import {aws_efs, aws_kms, aws_secretsmanager, Duration, Fn, RemovalPolicy} from "aws-cdk-lib";
import {Construct} from 'constructs';
import * as iam from "aws-cdk-lib/aws-iam";
import {LogGroup, RetentionDays} from "aws-cdk-lib/aws-logs";
import {AccessPoint} from "aws-cdk-lib/aws-efs";

interface InstanceConfig {
    subdomain: string;
    php: string;
    node: string;
    adminMail: string;
    adminPassword: string;
    plugin: string;
    currency: string;
    timeZone: string;
    language: string;
    composer_modules: string[];
    commands: string[];
}

type SubdomainPath = {
    key: string;
    path: string;
    accessPoint: AccessPoint | null;
};


interface AppProps extends cdk.StackProps {
    readonly hostedZone: string;
    readonly domain: string;
    readonly image: string;
    readonly deployConfig: string;
    readonly vcsAccessToken: string;
}

export class AppStack extends cdk.Stack {
    constructor(scope: Construct, id: string, props: AppProps) {
        super(scope, id, props);
        const buildResourceId = (suffix: string) => `${id.toLowerCase()}-${suffix}`;
        // get the hostedZone
        const hostedZone = HostedZone.fromLookup(this, buildResourceId("Zone"), {
            domainName: props.hostedZone,
        });
        const deployConfig = JSON.parse(props.deployConfig)

        const sharedEfs: SubdomainPath[] = [];
        sharedEfs.push({
            key: 'deployments',
            path: `/var/www/wld-deployments`,
            accessPoint: null
        });
        for (const version in deployConfig) {
            deployConfig[version].forEach((instance: InstanceConfig) => {
                if (instance.subdomain) {
                    sharedEfs.push({
                        key: instance.subdomain+"-modules",
                        path: `/var/www/public/${instance.subdomain}/modules`,
                        accessPoint: null
                    });
                    sharedEfs.push({
                        key: instance.subdomain+"-img",
                        path: `/var/www/public/${instance.subdomain}/img`,
                        accessPoint: null
                    });
                    sharedEfs.push({
                        key: instance.subdomain + "-upload",
                        path: `/var/www/public/${instance.subdomain}/upload`,
                        accessPoint: null
                    });
                    sharedEfs.push({
                        key: instance.subdomain + "-download",
                        path: `/var/www/public/${instance.subdomain}/download`,
                        accessPoint: null
                    });
                }
            });
        }


        // Default VPC
        const vpc = Vpc.fromLookup(this, buildResourceId("Vpc"), {
            isDefault: true,
        });

        // This user ID has to match the user ID in the docker file when creating the user
        const systemUserId = '33';
        const directoryRoot = '/data';

        const efs = new aws_efs.FileSystem(this, buildResourceId('store-efs'), {
            vpc: vpc,
            removalPolicy: RemovalPolicy.DESTROY,
            fileSystemName: buildResourceId('store-efs')
        });
        for (const subdomain of sharedEfs) {
            subdomain.accessPoint = efs.addAccessPoint(buildResourceId('acp_'+ subdomain.key) , {
                createAcl: {
                    ownerGid: systemUserId,
                    ownerUid: systemUserId,
                    permissions: '750'
                },
                path: directoryRoot+ "/"+ subdomain.key,
                posixUser: {
                    gid: systemUserId,
                    uid: systemUserId
                }
            }
           )
        }

        const ksmEncryptionKey = new aws_kms.Key(this, buildResourceId('ECSClusterKey'), {
            enableKeyRotation: true,
        });
        const cluster = new Cluster(this, buildResourceId("Cluster"), {
            clusterName: buildResourceId("Cluster"),
            vpc,
            executeCommandConfiguration: {kmsKey: ksmEncryptionKey}
        });
        // create the https certificate
        const certificate = new Certificate(this, buildResourceId("SiteCertificate"), {
            domainName: props.domain,
            validation: CertificateValidation.fromDns(hostedZone),
        });
        const volumeName = `wl-efs`;
        const volumes = []
        for (const sbD of sharedEfs) {
           volumes.push(
               {
                   name: volumeName + sbD.key,
                   efsVolumeConfiguration: {
                       fileSystemId: sbD.accessPoint?.fileSystem.fileSystemId ?? '',
                       rootDirectory: '/',
                       transitEncryption: 'ENABLED',
                       authorizationConfig: {
                           accessPointId: sbD.accessPoint?.accessPointId ?? '',
                           iam: 'ENABLED'
                       }
                   }
               },
           )
        }

        const taskDefinition = new FargateTaskDefinition(this, buildResourceId("TaskDefinition"), {
            cpu: 2048,
            memoryLimitMiB: 8192,
            volumes
        });
        taskDefinition.addToTaskRolePolicy(
            new iam.PolicyStatement({
                effect: iam.Effect.ALLOW,
                actions: ['ssmmessages:CreateControlChannel', 'ssmmessages:CreateDataChannel', 'ssmmessages:OpenControlChannel', 'ssmmessages:OpenDataChannel'],
                resources: ['*']
            }),
        )

        taskDefinition.addToTaskRolePolicy(
            new iam.PolicyStatement({
                effect: iam.Effect.ALLOW,
                actions: ['kms:Decrypt'],
                resources: [ksmEncryptionKey.keyArn]
            }),
        );
        taskDefinition.addToExecutionRolePolicy(
            new iam.PolicyStatement({
                effect: iam.Effect.ALLOW,
                actions: ['secretsmanager:GetSecretValue'],
                resources: ['*']
            })
        );

        taskDefinition.addToExecutionRolePolicy(
            new iam.PolicyStatement({
                effect: iam.Effect.ALLOW,
                actions: [
                    'ecr:GetAuthorizationToken',
                    'ecr:BatchCheckLayerAvailability',
                    'ecr:GetDownloadUrlForLayer',
                    'ecr:BatchGetImage'
                ],
                resources: ['*'],
            }),
        );
        taskDefinition.obtainExecutionRole()

        const  image = ContainerImage.fromRegistry(props.image)
        const logging = new AwsLogDriver({
            streamPrefix: "app",
            logGroup: new LogGroup(this, buildResourceId("app-log"), {
                removalPolicy: RemovalPolicy.DESTROY,
                retention: RetentionDays.ONE_MONTH,
            }),
        });
        const  secret = aws_secretsmanager.Secret.fromSecretCompleteArn(this,
            buildResourceId('dbSecretArn'),
            Fn.importValue("dbSecretArn"))
        const appContainer = new ContainerDefinition(this, buildResourceId("app"), {
            image,
            taskDefinition,
            logging,
            environment: {
                GITHUB_ACCESS_TOKEN: props.vcsAccessToken,
                DEPLOY_CONFIG: props.deployConfig,
                DB_PORT: "3306",
                DOMAIN: props.domain.replace('*.','')
            },
            secrets: {
                DB_USERNAME: Secret.fromSecretsManager(secret, "username"),
                DB_PASSWORD: Secret.fromSecretsManager(secret, "password"),
                DB_DATABASE: Secret.fromSecretsManager(secret, "dbname"),
                DB_HOST: Secret.fromSecretsManager(secret, "host")
            },
        });
        const mountPoints = [];

        for (const sub of sharedEfs) {
            mountPoints.push(
                {
                    sourceVolume: volumeName + sub.key,
                    containerPath: sub.path,
                    readOnly: false,
                }
            )
        }
        appContainer.addMountPoints(
            ...mountPoints
        )
        appContainer.addPortMappings({
            containerPort: 80,
        });

        const application = new ApplicationLoadBalancedFargateService(this, buildResourceId("Service"), {
            cluster,
            certificate,
            domainName: props.domain,
            enableExecuteCommand: true,
            domainZone: hostedZone,
            taskDefinition,
            // how many task do you want to run ?
            desiredCount: 1,
            propagateTags: PropagatedTagSource.SERVICE,
            redirectHTTP: true,
            publicLoadBalancer: true,
            // following is needed as we are on a public subnet.
            // https://stackoverflow.com/questions/61265108/aws-ecs-fargate-resourceinitializationerror-unable-to-pull-secrets-or-registry
            assignPublicIp: true,
        });
        application.targetGroup.configureHealthCheck({
            path: '/',
            interval: Duration.minutes(5),
        });

        const scalableTarget = application.service.autoScaleTaskCount(
            {
                minCapacity: 1,
                maxCapacity: 2
            })

        scalableTarget.scaleOnCpuUtilization(buildResourceId('CpuScaling'), {
            targetUtilizationPercent: 95
        })

        scalableTarget.scaleOnMemoryUtilization(
            buildResourceId('MemoryScaling'),
            {
                targetUtilizationPercent: 95,
            }
        );
         efs.connections.allowDefaultPortFrom(application.service);

    }
}