<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\PaymentGateway\Method;

use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\SettingsFieldRendererInterface;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\SettingsFieldSanitizerInterface;
use Syde\Vendor\Cawl\Psr\Container\ContainerInterface;
interface CustomSettingsFieldsDefinition
{
    /**
     * @return array<callable(ContainerInterface):SettingsFieldRendererInterface>
     */
    public function renderers() : array;
    /**
     * @return array<callable(ContainerInterface):SettingsFieldSanitizerInterface>
     */
    public function sanitizers() : array;
}
