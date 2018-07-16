<?php

namespace PedroGuerra\DeveloperTest\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

class AddressType extends \Magento\Framework\DataObject implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => __('Residential')],
            ['value' => 2, 'label' => __('Business')],
        ];
    }

    public static function getOptionArray()
    {
        return [
            1 => __('Residential'),
            2 => __('Business'),
        ];
    }

    public static function getAllOptions()
    {
        $res = [];
        foreach (self::getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }
}
