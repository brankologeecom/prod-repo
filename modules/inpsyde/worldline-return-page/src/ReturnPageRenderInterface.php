<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\ReturnPage;

interface ReturnPageRenderInterface
{
    public function render(array $returnPageParameters) : string;
}
