<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway;

interface GatewayIds
{
    public const HOSTED_CHECKOUT = 'cawl-for-woocommerce';
    public const HOSTED_TOKENIZATION = 'cawl-hosted-tokenization';
    public const GOOGLE_PAY = 'cawl-google-pay';
    public const APPLE_PAY = 'cawl-apple-pay';
    public const BANK_TRANSFER = 'cawl-bank-transfer';
    public const IDEAL = 'cawl-ideal';
    public const PAYPAL = 'cawl-paypal';
    public const KLARNA_PAY_WITH_KLARNA = 'cawl-klarna-pay-with-klarna';
    public const KLARNA_PAY_NOW = 'cawl-klarna-pay-now';
    public const KLARNA_BANK_TRANSFER = 'cawl-klarna-bank-transfer';
    public const KLARNA_DIRECT_DEBIT = 'cawl-klarna-direct-debit';
    public const KLARNA_PAY_LATER = 'cawl-klarna-pay-later';
    public const KLARNA_PAY_LATER_PAY_IN_3 = 'cawl-klarna-pay-later-pay-in-3';
    public const KLARNA_PAY_LATER_BANK_TRANSFER = 'cawl-klarna-pay-later-bank-transfer';
    public const POSTFINANCE = 'cawl-postfinance';
    public const TWINT = 'cawl-twint';
    public const KLARNA_FINANCING = 'cawl-klarna-financing';
    public const KLARNA_FINANCING_PAY_IN_3 = 'cawl-klarna-financing-pay-in-3';
    public const MEALVOUCHERS = 'cawl-mealvouchers';
    public const CVCO = 'cawl-cvco';
    public const EPS = 'cawl-eps';
    public const HOSTED_CHECKOUT_GATEWAYS = [self::HOSTED_CHECKOUT, self::GOOGLE_PAY, self::APPLE_PAY, self::BANK_TRANSFER, self::IDEAL, self::PAYPAL, self::POSTFINANCE, self::MEALVOUCHERS, self::CVCO, self::EPS];
    public const ALL = [self::HOSTED_CHECKOUT, self::HOSTED_TOKENIZATION, self::GOOGLE_PAY, self::APPLE_PAY, self::BANK_TRANSFER, self::IDEAL, self::PAYPAL, self::KLARNA_PAY_WITH_KLARNA, self::KLARNA_PAY_NOW, self::KLARNA_BANK_TRANSFER, self::KLARNA_DIRECT_DEBIT, self::KLARNA_PAY_LATER, self::KLARNA_PAY_LATER_PAY_IN_3, self::KLARNA_PAY_LATER_BANK_TRANSFER, self::KLARNA_FINANCING, self::KLARNA_FINANCING_PAY_IN_3, self::POSTFINANCE, self::TWINT, self::MEALVOUCHERS, self::CVCO, self::EPS];
}
