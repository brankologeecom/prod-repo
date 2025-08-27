<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

// phpcs:disable Inpsyde.CodeQuality.LineLength.TooLong
use Syde\Vendor\Cawl\Dhii\Services\Factory;
return new Factory(['hosted_tokenization_gateway.card_brands'], static function (array $cardBrands) : array {
    return \array_merge(['enabled' => ['title' => \__('Enable/Disable', 'cawl-for-woocommerce'), 'type' => 'checkbox', 'label' => \__('Enable Credit cards (CAWL)', 'cawl-for-woocommerce'), 'default' => 'no'], 'title' => ['title' => \__('Title', 'cawl-for-woocommerce'), 'type' => 'text', 'description' => \__('Personalize the payment method title in checkout.', 'cawl-for-woocommerce'), 'desc_tip' => \true, 'placeholder' => \__('Credit cards', 'cawl-for-woocommerce')], 'card_icons' => ['title' => \__('Card icons', 'cawl-for-woocommerce'), 'type' => 'multiselect', 'class' => 'wc-enhanced-select', 'description' => \__('Choose which card icons will be displayed at checkout.', 'cawl-for-woocommerce'), 'desc_tip' => \true, 'options' => $cardBrands, 'default' => ['amex', 'diners', 'visa', 'mastercard', 'maestro']]]);
});
