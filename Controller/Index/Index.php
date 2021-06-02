<?php
namespace AHT\OrderComment\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use AHT\OrderComment\Helper\Data;
class Index extends \Magento\Framework\App\Action\Action
{
	protected $resultPageFactory;

	protected $data;
	
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		Data $data
	) {
		$this->resultPageFactory = $resultPageFactory;
		$this->data = $data;
		parent::__construct($context);
	}
	public function execute()
	{
		$getData = $this->data->getConfig('order_comment/order_comment/order_comment_show_hidden');
		echo '<pre>';
		var_dump($getData);
		die();
		$resultPage = $this->resultPageFactory->create();
		return $resultPage;
	}
}