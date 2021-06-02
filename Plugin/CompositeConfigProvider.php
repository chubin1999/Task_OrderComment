<?php
namespace AHT\OrderComment\Plugin;

class CompositeConfigProvider
{
	protected $scopeConfig;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {

        $this->scopeConfig = $scopeConfig;
    }

	public function afterGetConfig(\Magento\Checkout\Model\CompositeConfigProvider $subject, $result)
	{
		$getDataCore = $this->scopeConfig->getValue(
            'order_comment/order_comment/order_comment_show_hidden',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        $result['order_comment'] = $getDataCore;

        return $result;
	}

}
