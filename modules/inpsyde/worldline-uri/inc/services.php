<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

use Syde\Vendor\Cawl\Dhii\Services\Factories\Alias;
use Syde\Vendor\Cawl\Dhii\Services\Factories\Constructor;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Uri\UriFactory;
return static function () : array {
    return ['uri.factory' => new Constructor(UriFactory::class, []), 'uri.builder' => new Alias('uri.factory')];
};
