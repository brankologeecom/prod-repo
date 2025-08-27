<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\GooglePayGateway;

use Inpsyde\Assets\AssetManager;
use Inpsyde\Assets\Script;
use Inpsyde\Assets\Style;
use Inpsyde\Assets\Asset;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\ModuleClassNameIdTrait;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\ExecutableModule;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\ServiceModule;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\ExtendingModule;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\PaymentGateway;
use Syde\Vendor\Cawl\Psr\Container\ContainerExceptionInterface;
use Syde\Vendor\Cawl\Psr\Container\ContainerInterface;
use Syde\Vendor\Cawl\Psr\Container\NotFoundExceptionInterface;
class GooglePayGatewayModule implements ServiceModule, ExtendingModule
{
    use ModuleClassNameIdTrait;
    public const PACKAGE_NAME = 'worldline-google-pay-gateway';
    public function services() : array
    {
        static $services;
        if ($services === null) {
            $services = (require_once \dirname(__DIR__) . '/inc/services.php');
        }
        return $services();
    }
    /**
     * @inheritDoc
     */
    public function extensions() : array
    {
        static $extensions;
        if ($extensions === null) {
            $extensions = (require_once \dirname(__DIR__) . '/inc/extensions.php');
        }
        return $extensions();
    }
}
