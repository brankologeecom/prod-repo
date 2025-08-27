<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\HostedTokenization;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreateHostedTokenizationRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreateHostedTokenizationResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\GetHostedTokenizationResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
/**
 * HostedTokenization client interface.
 */
interface HostedTokenizationClientInterface
{
    /**
     * Resource /v2/{merchantId}/hostedtokenizations - Create hosted tokenization session
     *
     * @param CreateHostedTokenizationRequest $body
     * @param CallContext|null $callContext
     * @return CreateHostedTokenizationResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function createHostedTokenization(CreateHostedTokenizationRequest $body, CallContext $callContext = null);
    /**
     * Resource /v2/{merchantId}/hostedtokenizations/{hostedTokenizationId} - Get hosted tokenization session
     *
     * @param string $hostedTokenizationId
     * @param CallContext|null $callContext
     * @return GetHostedTokenizationResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getHostedTokenization($hostedTokenizationId, CallContext $callContext = null);
}
