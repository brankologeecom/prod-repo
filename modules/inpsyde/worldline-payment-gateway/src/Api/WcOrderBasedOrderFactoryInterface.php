<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\Order;
use WC_Order;
interface WcOrderBasedOrderFactoryInterface
{
    public function create(WC_Order $wcOrder) : Order;
}
