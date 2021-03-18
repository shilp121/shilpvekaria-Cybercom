<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Admin\Customer\Edit\Tabs');


class Edit extends \Block\Core\Template
{
    public $customer = null;  

	public function __construct()
	{
		 parent::__construct();
         $this->setTemplate('view/admin/customer/edit.php');
	}
	
 	public function getTabContent()
 	{
 		$tabBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs');
		$tabs = $tabBlock->getTabs();
		// print\r($tabs);die();
		$tab = $this->getUrl()->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)){
			return null;
		}

		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
 	}



	public function setCustomer()
	{
		$customer = \Mage::getModel('Model\Customer');
		$customerId = $this->getUrl()->getRequest()->getGet('id');
		$customer->load($customerId);
		$this->customer = $customer;
		return $this; 
	}

	public function getCustomer()
	{
		if(!$this->customer){
			$this->setCustomer();
		}
		return $this->customer;
	}

}







 ?>