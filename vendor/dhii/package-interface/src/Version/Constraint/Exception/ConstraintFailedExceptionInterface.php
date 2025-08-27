<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Dhii\Package\Version\Constraint\Exception;

use Syde\Vendor\Cawl\Dhii\Validation\Exception\ValidationFailedExceptionInterface;
/**
 * Represents a case when a version does not match a constraint.
 */
interface ConstraintFailedExceptionInterface extends ValidationFailedExceptionInterface
{
}
