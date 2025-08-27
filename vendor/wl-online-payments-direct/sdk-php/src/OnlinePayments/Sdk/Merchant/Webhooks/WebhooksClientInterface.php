<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\Webhooks;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\SendTestRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\ValidateCredentialsRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\ValidateCredentialsResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
/**
 * Webhooks client interface.
 */
interface WebhooksClientInterface
{
    /**
     * Resource /v2/{merchantId}/webhooks/validateCredentials - Validate credentials
     *
     * @param ValidateCredentialsRequest $body
     * @param CallContext|null $callContext
     * @return ValidateCredentialsResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function validateWebhookCredentials(ValidateCredentialsRequest $body, CallContext $callContext = null);
    /**
     * Resource /v2/{merchantId}/webhooks/sendtest - Send test
     *
     * @param SendTestRequest $body
     * @param CallContext|null $callContext
     * @return null
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function sendTestWebhook(SendTestRequest $body, CallContext $callContext = null);
}
