<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\CVCOGateway\Payment;

use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Api\HostedCheckoutInput;
use Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WorldlinePaymentGateway\Payment\AbstractHostedPaymentRequestModifier;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\CreateHostedCheckoutRequest;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\RedirectionData;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\RedirectPaymentMethodSpecificInput;
use Syde\Vendor\Cawl\OnlinePayments\Sdk\Domain\RedirectPaymentProduct5403SpecificInput;
class CVCORequestModifier extends AbstractHostedPaymentRequestModifier
{
    public function modify(CreateHostedCheckoutRequest $hostedCheckoutRequest, HostedCheckoutInput $hostedCheckoutInput) : CreateHostedCheckoutRequest
    {
        $hostedCheckoutRequest->setCardPaymentMethodSpecificInput(null);
        $hostedCheckoutRequest->setMobilePaymentMethodSpecificInput(null);
        $redirectPaymentMethodSpecificInput = $hostedCheckoutRequest->getRedirectPaymentMethodSpecificInput();
        $redirectPaymentMethodSpecificInput->setPaymentProductId(5403);
        $redirectPaymentMethodSpecificInput->setRequiresApproval(\false);
        $redirectionData = new RedirectionData();
        $redirectionData->setReturnUrl($hostedCheckoutInput->returnUrl());
        $redirectPaymentMethodSpecificInput->setRedirectionData($redirectionData);
        $hostedCheckoutRequest->setRedirectPaymentMethodSpecificInput($redirectPaymentMethodSpecificInput);
        $this->removeTokensFromRequest($hostedCheckoutRequest);
        return $hostedCheckoutRequest;
    }
}
