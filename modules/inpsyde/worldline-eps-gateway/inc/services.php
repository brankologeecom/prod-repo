<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

// phpcs:disable Inpsyde.CodeQuality.LineLength.TooLong
use Syde\Vendor\Cawl\Dhii\Services\Factories\Alias;
use Syde\Vendor\Cawl\Dhii\Services\Factories\Constructor;
use Syde\Vendor\Cawl\Dhii\Services\Factories\Value;
use Syde\Vendor\Cawl\Dhii\Services\Factory;
use Syde\Vendor\Cawl\Dhii\Services\Service;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\DefaultIconsRenderer;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\Icon;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\IconProviderInterface;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\StaticIconProvider;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\EpsGateway\EpsGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\EpsGateway\Payment\EpsRequestModifier;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Vaulting\WcTokenRepository;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutUrlFactory;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\WcOrderBasedOrderFactoryInterface;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\GatewayIds;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\HostedPaymentProcessor;
use Syde\Vendor\Cawl\Psr\Container\ContainerInterface;
return static function () : array {
    $moduleRoot = \dirname(__FILE__, 2);
    $gatewayId = GatewayIds::EPS;
    return ["payment_gateway.{$gatewayId}.form_fields" => Service::fromFile("{$moduleRoot}/inc/fields.php"), "payment_gateway.{$gatewayId}.method_title" => static fn(): string => \__('EPS (CAWL)', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.title" => static fn() => \__('EPS', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.method_description" => static fn(): string => \__('Accept payments with EPS transfer.', 'cawl-for-woocommerce'), "payment_gateway.{$gatewayId}.description" => static fn(): string => '', "payment_gateway.{$gatewayId}.order_button_text" => static fn(): ?string => null, "payment_gateway.{$gatewayId}.payment_request_validator" => new Alias('payment_gateways.noop_payment_request_validator'), "payment_gateway.{$gatewayId}.payment_processor" => new Factory(['worldline_payment_gateway.hosted_checkout_url_factory', 'worldline_payment_gateway.wc_order_factory', 'vaulting.repository.wc.tokens.' . GatewayIds::HOSTED_CHECKOUT, 'worldline_payment_gateway.hosted_checkout_language', 'eps.request_modifier'], static function (HostedCheckoutUrlFactory $hostedCheckoutUrlFactory, WcOrderBasedOrderFactoryInterface $wcOrderBasedOrderFactory, WcTokenRepository $wcTokenRepository, ?string $hostedCheckoutLanguage, EpsRequestModifier $epsRequestModifier) : HostedPaymentProcessor {
        return new HostedPaymentProcessor($hostedCheckoutUrlFactory, $wcOrderBasedOrderFactory, $wcTokenRepository, $hostedCheckoutLanguage, $epsRequestModifier);
    }), "payment_gateway.{$gatewayId}.supports" => static function () : array {
        return ['products', 'refunds'];
    }, "payment_gateway.{$gatewayId}.refund_processor" => new Alias('payment_gateway.' . GatewayIds::HOSTED_CHECKOUT . '.refund_processor'), "payment_gateway.{$gatewayId}.availability_callback" => static function (ContainerInterface $container) : callable {
        return static function () use($container) : bool {
            global $woocommerce;
            try {
                $hostedCheckoutAvailabilityCallback = $container->get('payment_gateway.' . GatewayIds::HOSTED_CHECKOUT . '.availability_callback');
                $currencyExistForOneOfTheProducts = $hostedCheckoutAvailabilityCallback();
                if (!$currencyExistForOneOfTheProducts) {
                    return \false;
                }
                $billingCountry = $woocommerce->customer->get_billing_country();
                $currency = \get_woocommerce_currency();
                $availableCountries = $container->get('eps.availability.country_codes');
                \assert(\is_array($availableCountries));
                $availableCurrencies = $container->get('eps.availability.currencies');
                \assert(\is_array($availableCurrencies));
                return \in_array($billingCountry, $availableCountries, \true) && \in_array($currency, $availableCurrencies, \true);
            } catch (\Throwable $exception) {
                return \false;
            }
        };
    }, "payment_gateway.{$gatewayId}.method_icon_provider" => new Factory(['assets.get_module_static_asset_url'], static function (callable $getStaticAssetUrl) : IconProviderInterface {
        /** @var string $src */
        $src = $getStaticAssetUrl(EpsGatewayModule::PACKAGE_NAME, "images/eps-logo.png");
        $icon = new Icon('eps-logo', $src, 'EPS logo');
        return new StaticIconProvider($icon);
    }), "payment_gateway.{$gatewayId}.gateway_icons_renderer" => new Constructor(DefaultIconsRenderer::class, ["payment_gateway.{$gatewayId}.method_icon_provider"]), "eps.request_modifier" => new Constructor(EpsRequestModifier::class, []), "eps.availability.country_codes" => new Value([
        // https://docs.direct.worldline-solutions.com/en/payment-methods-and-features/payment-methods/eps#countries-and-currencies
        "AT",
    ]), "eps.availability.currencies" => new Value([
        // https://docs.direct.worldline-solutions.com/en/payment-methods-and-features/payment-methods/eps#countries-and-currencies
        "EUR",
    ])];
};
