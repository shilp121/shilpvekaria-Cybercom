<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Model\Customer');
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{	
	protected $customers = [];
	public function __construct()
	{
		 ///parent::__construct();
		parent::__construct();
        $this->setTemplate('view/admin/customer/grid.php');	
		// $this->setController(new Controller_customer());
	}

	public function setCustomer()		
	{

			$customer = \Mage::getModel('Model\Customer');
			
			$customerData = $customer->fetchAll();
			$this->customers = $customerData;
			return $this;
	}

	public function getCustomer(){
			if(!$this->customers){
				$this->setCustomer();
			}
		   return $this->customers;
	}

}

?>