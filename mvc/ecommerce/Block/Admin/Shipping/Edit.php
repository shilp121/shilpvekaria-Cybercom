<?php
namespace Block\Admin\Shipping;
\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Admin\Shipping\Edit\Tabs');


class Edit extends \Block\Core\Template
{
    public $shipping = null;  
	public function __construct()
	{
		 parent::__construct();
         $this->setTemplate('view/admin/shipping/edit.php');
	}

 	public function getTabContent()
 	{
 		$tabBlock = \Mage::getBlock('Block\Admin\Shipping\Edit\Tabs');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getUrl()->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)){
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
 	}



	public function setShipping()
	{
		$shipping = \Mage::getModel('Model\Shipping');
		$shippingId = $this->getUrl()->getRequest()->getGet('id');
		$shipping->load($shippingId);
		$this->shipping = $shipping;
		return $this; 
	}

	public function getShipping()
	{
		if(!$this->shipping){
			$this->setShipping();
		}
		return $this->shipping;
	}

}







 ?>