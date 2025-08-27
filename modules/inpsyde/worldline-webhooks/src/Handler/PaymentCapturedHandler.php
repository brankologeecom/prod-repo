<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Webhooks\Handler;

use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\Webhooks\Helper\WebhookHelper;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Helper\MoneyAmountConverter;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\WlopWcOrder;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\WebhooksEvent;
class PaymentCapturedHandler implements WebhookHandlerInterface
{
    private MoneyAmountConverter $moneyAmountConverter;
    public function __construct(MoneyAmountConverter $moneyAmountConverter)
    {
        $this->moneyAmountConverter = $moneyAmountConverter;
    }
    public function accepts(WebhooksEvent $webhook) : bool
    {
        return $webhook->type === 'payment.captured';
    }
    /**
     * @throws \Exception
     */
    public function handle(WebhooksEvent $webhook, WlopWcOrder $wlopWcOrder) : void
    {
        $capturedAmount = WebhookHelper::paymentCapturedAmount($webhook);
        if ($capturedAmount === null) {
            throw new \Exception("Can't retrieve captured amount. Webhook: {$webhook->id}");
        }
        $wlopWcOrder->addWorldlineOrderNote(\sprintf(
            /* translators: %s refers to the capture amount */
            \__('Payment of %s successfully captured.', 'cawl-for-woocommerce'),
            $this->moneyAmountConverter->amountOfMoneyAsString($capturedAmount)
        ));
        $wlopWcOrder->order()->save();
    }
}
