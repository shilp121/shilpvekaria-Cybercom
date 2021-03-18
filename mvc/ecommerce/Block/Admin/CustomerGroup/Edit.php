<?php
namespace Block\Admin\CustomerGroup;
\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Admin\CustomerGroup\Edit\Tabs');


class Edit extends \Block\Core\Template
{
    public $customerGroup = null;  

	public function __construct()
	{
		 parent::__construct();
         $this->setTemplate('view/admin/customerGroup/edit.php');
	}
	
 	public function getTabContent()
 	{
 		$tabBlock = \Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getUrl()->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)){
			return null;
		}

		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);

		echo $block->toHtml();
 	}



	public function setCustomerGroup()
	{
		$customerGroup = \Mage::getModel('Model\CustomerGroup');
		$customerGroupId = $this->getUrl()->getRequest()->getGet('id');
		$customerGroup->load($customerGroupId);
		$this->customerGroup = $customerGroup;
		return $this; 
	}

	public function getCustomerGroup()
	{
		if(!$this->customerGroup){
			$this->setCustomerGroup();
		}
		return $this->customerGroup;
	}

}







 ?>