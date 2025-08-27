<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

// phpcs:disable Inpsyde.CodeQuality.LineLength.TooLong
use Syde\Vendor\Cawl\Dhii\Services\Factory;
return new Factory([], static function () : array {
    return \array_merge(['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable Google Pay (CAWL)', 'cawl-for-woocommerce'), 'default' => 'no']]);
});
