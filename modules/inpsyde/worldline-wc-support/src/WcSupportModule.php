<?php

declare (strict_types=1);
namespace Syde\Vendor\Cawl\Inpsyde\WorldlineForWoocommerce\WcSupport;

use Automattic\WooCommerce\Utilities\FeaturesUtil;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\ExecutableModule;
use Syde\Vendor\Cawl\Inpsyde\Modularity\Module\ModuleClassNameIdTrait;
use Syde\Vendor\Cawl\Psr\Container\ContainerInterface;
/**
 * The WooCommerce Support module.
 */
class WcSupportModule implements ExecutableModule
{
    use ModuleClassNameIdTrait;
    public function run(ContainerInterface $container) : bool
    {
        $this->addOrderHposSupport();
        return \true;
    }
    private function addOrderHposSupport() : void
    {
        \add_action('before_woocommerce_init', static function () {
            if (\class_exists(FeaturesUtil::class)) {
                FeaturesUtil::declare_compatibility('custom_order_tables', 'cawl-for-woocommerce');
            }
        });
    }
}
