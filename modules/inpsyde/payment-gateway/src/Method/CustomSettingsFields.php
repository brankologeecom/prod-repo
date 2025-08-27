<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\PaymentGateway\Method;

use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\SettingsFieldRendererInterface;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\SettingsFieldSanitizerInterface;
use Syde\Vendor\Cawl\Psr\Container\ContainerInterface;
class CustomSettingsFields implements CustomSettingsFieldsDefinition
{
    /**
     * @var array<callable(ContainerInterface):SettingsFieldRendererInterface>
     */
    private array $renderers;
    /**
     * @var array<callable(ContainerInterface):SettingsFieldSanitizerInterface>
     */
    private array $sanitizers;
    /**
     * @param array<string,callable(ContainerInterface):SettingsFieldRendererInterface> $renderers
     * @param array<string,callable(ContainerInterface):SettingsFieldSanitizerInterface> $sanitizers
     */
    public function __construct(array $renderers, array $sanitizers)
    {
        $this->renderers = $renderers;
        $this->sanitizers = $sanitizers;
    }
    public function renderers() : array
    {
        return $this->renderers;
    }
    public function sanitizers() : array
    {
        return $this->sanitizers;
    }
}
