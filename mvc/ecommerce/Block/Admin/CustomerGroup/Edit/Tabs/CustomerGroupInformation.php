<?php
namespace  Block\Admin\CustomerGroup\Edit\Tabs;
\Mage::loadFileByClassName('BLock\Core\Template');
\Mage::loadFileByClassName('Model\CustomerGroup');


class CustomerGroupInformation extends \Block\Core\Template
{


	protected $customerGroup = null;

	function __construct()
	{

			parent::__construct();
			$this->setTemplate('view/admin/customerGroup/edit/tabs/customerGroupInformation.php');
	}

	public function getOption()
    {
       $status = \Mage::getModel('Model\CustomerGroup');
       return $status->getStatusOption();
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