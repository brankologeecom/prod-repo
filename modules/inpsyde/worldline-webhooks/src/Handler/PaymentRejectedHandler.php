<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Webhooks\Handler;

use Exception;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\WebhooksEvent;
class PaymentRejectedHandler implements WebhookHandlerInterface
{
    public function accepts(WebhooksEvent $webhook) : bool
    {
        return $webhook->type === 'payment.rejected';
    }
    /**
     * @throws Exception
     */
    public function handle(WebhooksEvent $webhook, WlopWcOrder $wlopWcOrder) : void
    {
        $wlopWcOrder->addWorldlineOrderNote(\__('Payment rejected.', 'cawl-for-woocommerce'));
        $wlopWcOrder->order()->save();
    }
}
