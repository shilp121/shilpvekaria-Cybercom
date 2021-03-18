<?php
namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Admin\Product\Edit\Tabs');


class Edit extends \Block\Core\Template
{
    public $product = null;  
	public function __construct()
	{
		 parent::__construct();
         $this->setTemplate('view/admin/product/edit.php');
	}

 	public function getTabContent()
 	{
 		$tabBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
		$tabs = $tabBlock->getTabs();
		// print_r($tabs);die();
		$tab = $this->getUrl()->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)){
			return null;
		}

		//print_r($tabs[$tab]['block']);
		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		// print_r($block);
		echo $block->toHtml();
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