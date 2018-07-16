<?php
namespace PedroGuerra\DeveloperTest\Plugin;

class DeveloperTestProcessor
{
    protected $addressType;

    public function __construct(\PedroGuerra\DeveloperTest\Model\Source\AddressType $addressType)
    {
        $this->addressType = $addressType;
    }

    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $processor, $jsLayout)
    {
        $customAttributeCode = 'address_type';
        $addressTypeField = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select'
            ],
            'dataScope' => 'shippingAddress.custom_attributes' . '.' . $customAttributeCode,
            'label' => 'Address Type',
            'provider' => 'checkoutProvider',
            'sortOrder' => 0,
            'validation' => [
                'required-entry' => true
            ],
            'options' => $this->addressType->toOptionArray(),
            'caption' => 'Please select',
            'visible' => true,
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCode] = $addressTypeField;
        return $jsLayout;
    }

}
