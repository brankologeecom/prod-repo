<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

use Syde\Vendor\Cawl\Dhii\Services\Factory;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Vaulting\CardBinParser;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Vaulting\CardButtonRenderer;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Vaulting\WcTokenRepository;
use Syde\Vendor\Cawl\Dhii\Services\Factories\Constructor;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
return static function () : array {
    $services = ['vaulting.bin_parser' => new Constructor(CardBinParser::class), 'vaulting.card_button_renderer' => new Constructor(CardButtonRenderer::class)];
    foreach ([GatewayIds::HOSTED_CHECKOUT, GatewayIds::HOSTED_TOKENIZATION] as $gatewayId) {
        $services["vaulting.repository.wc.tokens.{$gatewayId}"] = new Factory(['vaulting.bin_parser'], static fn(CardBinParser $cardBinParser): WcTokenRepository => new WcTokenRepository($gatewayId, $cardBinParser));
    }
    return $services;
};
