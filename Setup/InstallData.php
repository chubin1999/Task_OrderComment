<?php
namespace AHT\OrderComment\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Setup\CustomerSetupFactory;

class InstallData implements InstallDataInterface
{
    protected $customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        $this->addDeliveryAttribute($setup);
    }

    protected function addDeliveryAttribute(ModuleDataSetupInterface $setup)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        if (!$customerSetup->getAttributeId('customer_address', 'order_comment')) {
            $customerSetup->addAttribute('customer_address', 'order_comment',[
                'type' => 'varchar',
                'label' => 'Order Comment',
                'input' => 'hidden',
                'required' => false,
                'visible' => true,
                'system' => 0,
                'visible_on_front' => false,
                'sort_order' => 101,
                'position' => 101
            ]);
        }

    }
}
?>