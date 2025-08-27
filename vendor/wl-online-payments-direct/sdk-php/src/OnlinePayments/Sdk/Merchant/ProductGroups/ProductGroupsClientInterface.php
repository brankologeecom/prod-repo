<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\ProductGroups;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\ApiException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\AuthorizationException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\CallContext;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Communication\InvalidResponseException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\GetPaymentProductGroupsResponse;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\PaymentProductGroup;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\IdempotenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\PlatformException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ReferenceException;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\ValidationException;
/**
 * ProductGroups client interface.
 */
interface ProductGroupsClientInterface
{
    /**
     * Resource /v2/{merchantId}/productgroups - Get product groups
     *
     * @param GetProductGroupsParams $query
     * @param CallContext|null $callContext
     * @return GetPaymentProductGroupsResponse
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getProductGroups(GetProductGroupsParams $query, CallContext $callContext = null);
    /**
     * Resource /v2/{merchantId}/productgroups/{paymentProductGroupId} - Get product group
     *
     * @param string $paymentProductGroupId
     * @param GetProductGroupParams $query
     * @param CallContext|null $callContext
     * @return PaymentProductGroup
     *
     * @throws IdempotenceException
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws ReferenceException
     * @throws PlatformException
     * @throws ApiException
     * @throws InvalidResponseException
     */
    function getProductGroup($paymentProductGroupId, GetProductGroupParams $query, CallContext $callContext = null);
}
