<?php
namespace Block\Admin\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('BLock\Core\Template');
\Mage::loadFileByClassName('Model\Shipping');


class ShipmentInformation extends \Block\Core\Template
{
	public $shipping = null;  
	
	function __construct()
	{
			parent::__construct();
			$this->setTemplate('view/admin/shipping/edit/tabs/shipmentInformation.php');
	}
	public function getOption()
    {
       $status = \Mage::getModel('Model\Shipping');
       return $status->getStatusOption();
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