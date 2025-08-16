#!/usr/bin/env node
import 'source-map-support/register';
import * as cdk from 'aws-cdk-lib';
import { AppStack } from "../lib/app-stack";

const app = new cdk.App();
const DOMAIN = process.env?.CDK_DOMAIN ?? '';
const HOSTED_ZONE = process.env?.CDK_HOSTED_ZONE ?? '';
const IMAGE = process.env?.IMAGE ?? '';
const VCS_ACCESS_TOKEN = process.env?.VCS_ACCESS_TOKEN ?? '';
const DEPLOY_CONFIG = process.env?.DEPLOY_CONFIG ?? '';
const CDK_STACK_PREFIX = process.env?.CDK_STACK_PREFIX ?? '';


const appStack = new AppStack(app, DOMAIN.replace(/\./g, "-").replace('*', CDK_STACK_PREFIX), {
    env: { account: process.env.CDK_DEFAULT_ACCOUNT, region: process.env.CDK_DEFAULT_REGION },
    domain: DOMAIN,
    hostedZone: HOSTED_ZONE,
    image: IMAGE,
    deployConfig: DEPLOY_CONFIG,
    vcsAccessToken: VCS_ACCESS_TOKEN
});

