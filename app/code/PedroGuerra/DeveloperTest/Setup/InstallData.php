<?php
namespace PedroGuerra\DeveloperTest\Setup;

use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Customer setup factory
     *
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * Init
     *
     * @param CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        $setup->startSetup();
        $customerSetup->addAttribute('customer_address', 'address_type', array(
            'type' => 'int',
            'input' => 'select',
            'label' => 'Address Type',
            'source'=>'PedroGuerra\DeveloperTest\Model\Source\AddressType',
            'global' => 1,
            'visible' => 1,
            'required' => 1,
            'user_defined' => 1,
            'system'=>0,
            'group'=>'General',
            'visible_on_front' => 1,
        ));

        $addressTypeAttribute = $customerSetup->getEavConfig()->getAttribute('customer_address', 'address_type');
        $addressTypeAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']
        );
        $addressTypeAttribute->save();
        $setup->endSetup();
    }
}
