<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\Transformer;

use Syde\Vendor\Cawl\Dhii\Container\ServiceProvider;
use Syde\Vendor\Cawl\Dhii\Modular\Module\Exception\ModuleExceptionInterface;
use Syde\Vendor\Cawl\Dhii\Modular\Module\ModuleInterface;
use Syde\Vendor\Cawl\Interop\Container\ServiceProviderInterface;
use Syde\Vendor\Cawl\Psr\Container\ContainerInterface;
//phpcs:disable Inpsyde.CodeQuality.NoAccessors.NoGetter
class BuilderModule implements ModuleInterface
{
    public function setup() : ServiceProviderInterface
    {
        return new ServiceProvider(['inpsyde.transformer' => static function (C $ctr) : Transformer {
            return new ConfigurableTransformer();
        }], []);
    }
    public function run(ContainerInterface $ctr)
    {
        // TODO: Implement run() method.
    }
}
