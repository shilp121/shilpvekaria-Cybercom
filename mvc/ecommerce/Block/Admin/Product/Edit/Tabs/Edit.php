<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Model\Product');


class Edit extends \Block\Core\Template
{
	public $product = null;  
	
	function __construct()
	{
			parent::__construct();
			$this->setTemplate('view/admin/product/edit/tabs/edit.php');
	}

	public function getOption()
    {
       $status = \Mage::getModel('Model\Product');
       return $status->getStatusOption();
    }
	public function setProduct()
	{
		$product = \Mage::getModel('Model\Product');
		$productId = $this->getUrl()->getRequest()->getGet('id');
		$product->load($productId);
		$this->product = $product;
		return $this; 
	}

	public function getProduct()
	{
		if(!$this->product){
			$this->setProduct();
		}
		return $this->product;
	}

}

?>