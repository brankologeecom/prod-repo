<?php

/*
 * This file was automatically generated.
 */
namespace Syde\Vendor\Cawl\OnlinePayments\Sdk;

use Syde\Vendor\Cawl\OnlinePayments\Sdk\Logging\CommunicatorLogger;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Merchant\MerchantClientInterface;
/**
 * Payment platform client interface.
 */
interface ClientInterface
{
    /**
     * @param CommunicatorLogger $communicatorLogger
     */
    function enableLogging(CommunicatorLogger $communicatorLogger);
    /**
     * @return void
     */
    function disableLogging();
    /**
     * @param string $clientMetaInfo
     * @return $this
     */
    function setClientMetaInfo($clientMetaInfo);
    /**
     * Resource /v2/{merchantId}
     *
     * @param string $merchantId
     * @return MerchantClientInterface
     */
    function merchant($merchantId);
}
