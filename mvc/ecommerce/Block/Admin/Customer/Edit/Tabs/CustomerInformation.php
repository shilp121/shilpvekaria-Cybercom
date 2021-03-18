<?php
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Model\Customer');

class CustomerInformation extends \Block\Core\Template
{

	protected $customer = null;
	protected $customerTypes = [];

	function __construct()
	{
			parent::__construct();
			$this->setTemplate('view/admin/customer/edit/tabs/customerInformation.php');
	}

	public function getOption()
    {
       $status = \Mage::getModel('Model\Customer');
       return $status->getStatusOption();
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
	public function setCustomerTypes(){
			$customerType = \Mage::getModel('Model\CustomerGroup');
			$addressesData = $customerType->fetchAll();
			$this->customerTypes = $addressesData;
			
			return $this;
    }
    public function getCustomerTypes(){
			if(!$this->customerTypes){
				$this->setCustomerTypes();
			}
			
		   return $this->customerTypes;
    }


}

?>