<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Webhooks\Handler;

use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\WebhooksEvent;
interface WebhookHandlerInterface
{
    public function accepts(WebhooksEvent $webhook) : bool;
    public function handle(WebhooksEvent $webhook, WlopWcOrder $wlopWcOrder) : void;
}
