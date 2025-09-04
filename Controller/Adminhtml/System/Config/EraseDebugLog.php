<?php
declare(strict_types=1);

namespace Worldline\PaymentCore\Controller\Adminhtml\System\Config;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Psr\Log\LoggerInterface;
use Worldline\PaymentCore\Model\Log\ResourceModel\Log;

class EraseDebugLog extends Action implements HttpGetActionInterface
{
    /**
     * @var Log
     */
    private $logResource;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(Context $context, Log $logResource, LoggerInterface $logger)
    {
        parent::__construct($context);
        $this->logResource = $logResource;
        $this->logger = $logger;
    }

    public function execute(): Redirect
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setRefererUrl();

        try {
            $this->logResource->clearTable();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return $resultRedirect;
    }
}
