<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

use Syde\Vendor\Cawl\Inpsyde\Logger\LoggerModule;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\Module;
use Syde\Vendor\Cawl\Inpsyde\PaymentGateway\PaymentGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\ApplePayGateway\ApplePayGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\BankTransferGateway\BankTransferGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Checkout\CheckoutModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Config\ConfigModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Core\CoreModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\CVCOGateway\CVCOGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Documentation\DocumentationModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Environment\EnvironmentModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\GooglePayGateway\GooglePayGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\HostedTokenizationGateway\HostedTokenizationGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\IdealGateway\IdealGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\PayPalGateway\PayPalGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\MealvouchersGateway\MealvouchersGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\PostfinanceGateway\PostfinanceGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\KlarnaGateway\KlarnaGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\ProductType\ProductTypeModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\ReturnPage\ReturnPageModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\TwintGateway\TwintGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Uninstall\UninstallModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Uri\UriModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Utils\UtilsModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Vaulting\VaultingModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WcSupport\WcSupportModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Webhooks\WebhooksModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlineLogging\WorldlineLoggingModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\WorldlinePaymentGatewayModule;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\EpsGateway\EpsGatewayModule;
return static function () : iterable {
    return [new EnvironmentModule(), new CoreModule(), new PaymentGatewayModule(), new LoggerModule(), new WorldlineLoggingModule(), new UriModule(), new WcSupportModule(), new ConfigModule(), new WorldlinePaymentGatewayModule(), new HostedTokenizationGatewayModule(), new GooglePayGatewayModule(), new ApplePayGatewayModule(), new BankTransferGatewayModule(), new IdealGatewayModule(), new EpsGatewayModule(), new PayPalGatewayModule(), new PostfinanceGatewayModule(), new KlarnaGatewayModule(), new TwintGatewayModule(), new CheckoutModule(), new ReturnPageModule(), new WebhooksModule(), new VaultingModule(), new UtilsModule(), new DocumentationModule(), new UninstallModule(), new MealvouchersGatewayModule(), new ProductTypeModule(), new CVCOGatewayModule()];
};
