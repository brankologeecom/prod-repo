<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\Complete;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\DeclinedPaymentException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CompletePaymentRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CompletePaymentResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
/**
 * Complete client interface.
 */
interface CompleteClientInterface
{
    /**
     * Resource /v2/{merchantId}/payments/{paymentId}/complete - Complete payment
     *
     * @param string $paymentId
     * @param CompletePaymentRequest $body
     * @param CallContext|null $callContext
     * @return CompletePaymentResponse
     *
     * @throws DeclinedPaymentException
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function completePayment($paymentId, CompletePaymentRequest $body, CallContext $callContext = null);
}
