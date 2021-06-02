<?php
namespace AHT\OrderComment\Plugin\Block\Checkout;

class LayoutProcessor
{
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, $jslayout)
    {
        $jslayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['order_comment'] =
            $this->processComment('shippingAddress');
        return $jslayout;
    }

    private function processComment($dataScopePrefix)
    {
         return [
            'component' => 'Magento_Ui/js/form/element/textarea',
            'config' => [
                'customScope' => $dataScopePrefix.'.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/textarea',
                'id' => 'order_comment',
                /*'options' => [
                    'dateFormat' => 'y-MM-dd'
                ]*/
            ],
            'dataScope' => $dataScopePrefix.'.custom_attributes.order_comment',
            'label' => __('Order Comment'),
            'provider' => 'checkoutProvider',
            'validation' => [
               'required-entry' => false
            ],
            'sortOrder' => 201,
            'visible' => true,
            'imports' => [
                'initialOptions' => 'index = checkoutProvider:dictionaries.order_comment',
                'setOptions' => 'index = checkoutProvider:dictionaries.order_comment'
            ]
        ];
    }
}
?>