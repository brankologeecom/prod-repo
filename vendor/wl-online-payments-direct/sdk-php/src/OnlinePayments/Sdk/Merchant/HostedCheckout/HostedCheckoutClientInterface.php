<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\HostedCheckout;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreateHostedCheckoutResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\GetHostedCheckoutResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
/**
 * HostedCheckout client interface.
 */
interface HostedCheckoutClientInterface
{
    /**
     * Resource /v2/{merchantId}/hostedcheckouts - Create hosted checkout
     *
     * @param CreateHostedCheckoutRequest $body
     * @param CallContext|null $callContext
     * @return CreateHostedCheckoutResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createHostedCheckout(CreateHostedCheckoutRequest $body, CallContext $callContext = null);
    /**
     * Resource /v2/{merchantId}/hostedcheckouts/{hostedCheckoutId} - Get hosted checkout status
     *
     * @param string $hostedCheckoutId
     * @param CallContext|null $callContext
     * @return GetHostedCheckoutResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getHostedCheckout($hostedCheckoutId, CallContext $callContext = null);
}
