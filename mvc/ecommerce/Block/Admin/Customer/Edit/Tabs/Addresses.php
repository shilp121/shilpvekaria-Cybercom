<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Model\Addresses');

class Addresses extends \Block\Core\Template
{
	protected $shippingAddress = null;
    protected $billingAddress = null;
	
	function __construct()
	{
			parent::__construct();
			$this->setTemplate('view/admin/customer/edit/tabs/addresses.php');
	}

	public function setShippingAddress()
    {

        $id = (int) $this->getUrl()->getRequest()->getGet('id');
        if(!$id){
        	return false;
        }
        if(!$this->shippingAddress){
        	$shippingAddress = \Mage::getModel('Model\Addresses');
	        $shipping = "SELECT * FROM `addresses` WHERE  `customerId`= '{$id}' AND `type`= 'Shipping';";
	        $shippingAddress->fetchRow($shipping);
        }

        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function getShippingAddress()
    {
        if (!$this->shippingAddress) {
            $this->setShippingAddress();
        }
        return $this->shippingAddress;
    }

    public function setBillingAddress()
    {
        $id = (int) $this->getUrl()->getRequest()->getGet('id');
        if(!$id){
        	return false;
        }
        if(!$this->billingAddress){

        	$billingAddress = \Mage::getModel('Model\Addresses');
	        $billing = "SELECT * FROM `addresses` WHERE  `customerId`= '{$id}' AND `type`= 'Billing';";
	        $billingAddress->fetchRow($billing);
        }
        $this->billingAddress = $billingAddress;
        return $this;
    }

    public function getBillingAddress()
    {
        if (!$this->billingAddress){
            $this->setBillingAddress();
        }
        return $this->billingAddress;
    }
}

?>