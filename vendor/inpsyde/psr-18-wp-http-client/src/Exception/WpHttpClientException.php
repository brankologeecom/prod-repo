<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\Wp\HttpClient\Exception;

use Syde\Vendor\Cawl\Psr\Http\Client\ClientExceptionInterface;
use RuntimeException;
/**
 * General Http Client exception.
 *
 * It thrown where it's unable to send request or parse response.
 */
class WpHttpClientException extends RuntimeException implements ClientExceptionInterface
{
}
