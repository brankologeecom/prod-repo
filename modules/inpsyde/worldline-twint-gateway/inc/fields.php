<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

use Syde\Vendor\Cawl\Dhii\Services\Factory;
return new Factory([], static function () : array {
    return \array_merge(['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable TWINT (CAWL)', 'cawl-for-woocommerce'), 'default' => 'no']]);
});
