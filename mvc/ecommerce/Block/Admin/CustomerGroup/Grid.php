<?php
namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Model\CustomerGroup');
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{	
	protected $customerGroups = [];
	public function __construct()
	{
		parent::__construct();
        $this->setTemplate('view/admin/customerGroup/grid.php');	
	}

	public function setCustomerGroup()		
	{

			$customerGroup = \Mage::getModel('Model\CustomerGroup');
			$customerGroupData = $customerGroup->fetchAll();
			$this->customerGroups = $customerGroupData;
			return $this;
	}

	public function getCustomerGroup(){
			if(!$this->customerGroups){
				$this->setCustomerGroup();
			}
		   return $this->customerGroups;
	}

}

?>