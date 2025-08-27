<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\Logger\Exception;

use Syde\Vendor\Cawl\Mockery\Exception\RuntimeException;
/**
 * To be thrown when writing to the log was failed.
 */
class CouldNotWriteToLogException extends RuntimeException implements LoggerExceptionInterface
{
}
