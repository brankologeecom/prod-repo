<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Syde\Vendor\Cawl\Psr\Container\ContainerInterface;
return static function () : array {
    return ['return_page.payment_gateways' => static function (array $returnPagePaymentGateways, ContainerInterface $container) : array {
        return \array_merge($returnPagePaymentGateways, GatewayIds::ALL);
    }];
};
