<?php 

namespace AHT\OrderComment\Helper;

class Data
{
	public function __construct(
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
	) {

		$this->scopeConfig = $scopeConfig;
	}

	public function getConfig($config_path)
	{
		$getDataCore = $this->scopeConfig->getValue(
			$config_path,
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
		return $getDataCore;
	}
}