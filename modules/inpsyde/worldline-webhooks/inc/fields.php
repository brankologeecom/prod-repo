<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl;

use Syde\Vendor\Cawl\Dhii\Services\Factory;
use Syde\Vendor\Cawl\Psr\Http\Message\UriInterface;
return new Factory(['webhooks.notification_url'], static function (?UriInterface $notificationUrl) : array {
    return ['test_webhook_id' => ['title' => \__('Test Webhook ID', 'cawl-for-woocommerce'), 'type' => 'text', 'desc_tip' => \true, 'description' => \__('Find/create the Webhook Key in the Developer tab > Webhooks on your CAWL Merchant Portal Dashboard.', 'cawl-for-woocommerce'), 'custom_attributes' => ['autocomplete' => 'off']], 'test_webhook_secret_key' => ['title' => \__('Test Secret webhook key', 'cawl-for-woocommerce'), 'type' => 'password', 'desc_tip' => \true, 'description' => \__('Find/create the Webhook Secret in the Developer tab > Webhooks on your CAWL Merchant Portal Dashboard.', 'cawl-for-woocommerce')], 'live_webhook_id' => ['title' => \__('Live Webhook ID', 'cawl-for-woocommerce'), 'type' => 'text', 'desc_tip' => \true, 'description' => \__('Find/create the Webhook Key in the Developer tab > Webhooks on your CAWL Merchant Portal Dashboard.', 'cawl-for-woocommerce'), 'custom_attributes' => ['autocomplete' => 'off']], 'live_webhook_secret_key' => ['title' => \__('Live Secret webhook key', 'cawl-for-woocommerce'), 'type' => 'password', 'desc_tip' => \true, 'description' => \__('Find/create the Webhook Secret in the Developer tab > Webhooks on your CAWL Merchant Portal Dashboard.', 'cawl-for-woocommerce')], 'webhook_endpoint_url' => ['title' => \__('Webhook endpoint', 'cawl-for-woocommerce'), 'type' => 'text', 'save' => \false, 'default' => (string) $notificationUrl, 'description' => '
                <button type="button" 
                    data-copy="
                    #woocommerce_cawl-for-woocommerce_webhook_endpoint_url
                    " 
                    data-copied-message="' . \__('Copied to clipboard', 'cawl-for-woocommerce') . '"
                    class="button-primary wlop-button-copy">' . \__('Copy', 'cawl-for-woocommerce') . '</button>', 'custom_attributes' => ['readonly' => 'readonly']]];
});
