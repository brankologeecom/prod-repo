<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Environment;

use Syde\Vendor\Cawl\Dhii\Validation\ValidatorInterface;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\ExecutableModule;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\ModuleClassNameIdTrait;
use Syde\Vendor\Cawl\Psr\Container\ContainerInterface;
class EnvironmentModule implements ExecutableModule
{
    use ModuleClassNameIdTrait;
    public function run(ContainerInterface $container) : bool
    {
        /** @var ValidatorInterface $validator */
        $validator = $container->get('core.environment_validator');
        $environment = $container->get('core.wp_environment');
        $validator->validate($environment);
        return \true;
    }
}
