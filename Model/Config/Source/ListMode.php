<?php 
namespace AHT\OrderComment\Model\Config\Source;

class ListMode implements \Magento\Framework\Data\OptionSourceInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => 1, 'label' => __('No')],
    ['value' => 2, 'label' => __('On Shipping Method')],
    ['value' => 3, 'label' => __('Below Shipping Method')]
  ];
 }
}return; ?>