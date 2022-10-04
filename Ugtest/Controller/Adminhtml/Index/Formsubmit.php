<?php

namespace Intest\Ugtest\Controller\Adminhtml\Index;


use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\ResourceConnection;

class Formsubmit extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;

	private $resultJsonFactory;

	protected $request;

	protected $resourceConnection;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		JsonFactory $resultJsonFactory,
		\Magento\Framework\App\RequestInterface $request,
		ResourceConnection $resourceConnection
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
		$this->resultJsonFactory = $resultJsonFactory;
		$this->request = $request;
		$this->resourceConnection = $resourceConnection;
	}

	public function execute()
	{

		$post = $this->request->getPostValue();

		$connection = $this->resourceConnection->getConnection();

		$response = '';
		try {
			$table = $connection->getTableName('ajaxcall');
			$username = $post['username'];

			$query = "INSERT INTO `" . $table . "`(`username`) VALUES ('".$username."')";
	        $connection->query($query);
	        $response = 'Success';
				
		} catch (Exception $e) {
			$response = $e->getMessage();
		}



		$resultJson = $this->resultJsonFactory->create();
		return $resultJson->setData(['ajaxcall' => $response]);
	}


}