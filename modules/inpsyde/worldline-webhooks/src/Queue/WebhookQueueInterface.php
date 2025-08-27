<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Webhooks\Queue;

use Exception;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\WebhooksEvent;
interface WebhookQueueInterface
{
    /**
     * @throws Exception
     */
    public function add(WebhooksEvent $webhook) : void;
}
