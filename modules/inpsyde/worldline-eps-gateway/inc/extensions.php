<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
return static function () : array {
    return ['payment_gateways' => static function (array $gateways) : array {
        $gateways[] = GatewayIds::EPS;
        return $gateways;
    }];
};
