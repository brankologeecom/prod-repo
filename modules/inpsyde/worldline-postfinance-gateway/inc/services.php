<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

// phpcs:disable Inpsyde.CodeQuality.LineLength.TooLong
use Syde\Vendor\Cawl\Dhii\Services\Factories\Constructor;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\PostfinanceGateway\Payment\PostfinanceRequestModifier;
return static function () : array {
    return ["postfinance.request_modifier" => new Constructor(PostfinanceRequestModifier::class, [])];
};
