<?php

namespace Intest\Ugtest\Controller\Adminhtml\Index;


use Magento\Framework\Controller\Result\JsonFactory;

class Ajaxcall extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;

	private $resultJsonFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		JsonFactory $resultJsonFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
		 $this->resultJsonFactory = $resultJsonFactory;
	}

	public function execute()
	{
		$test = "Sucess: this is test ajax call";
		$resultJson = $this->resultJsonFactory->create();
		return $resultJson->setData(['ajaxcall' => $test]);
	}


}