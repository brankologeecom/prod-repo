<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\Payouts;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\DeclinedPayoutException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreatePayoutRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\PayoutResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
/**
 * Payouts client interface.
 */
interface PayoutsClientInterface
{
    /**
     * Resource /v2/{merchantId}/payouts/{payoutId} - Get payout
     *
     * @param string $payoutId
     * @param CallContext|null $callContext
     * @return PayoutResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getPayout($payoutId, CallContext $callContext = null);
    /**
     * Resource /v2/{merchantId}/payouts - Create payout
     *
     * @param CreatePayoutRequest $body
     * @param CallContext|null $callContext
     * @return PayoutResponse
     *
     * @throws DeclinedPayoutException
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createPayout(CreatePayoutRequest $body, CallContext $callContext = null);
}
