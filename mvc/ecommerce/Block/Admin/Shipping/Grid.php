<?php
namespace Block\Admin\Shipping;

\Mage::loadFileByClassName('Model\Shipping');
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{	
	protected $shippings = [];
	public function __construct()
	{
		parent::__construct();
        $this->setTemplate('view/admin/shipping/grid.php');	
	}

	public function setShipping()		
	{

			$shipping = \Mage::getModel('Model\Shipping');
			$shippingData = $shipping->fetchAll();
			$this->shippings = $shippingData;
			return $this;
	}

	public function getShipping(){
			if(!$this->shippings){
				$this->setShipping();
			}
		   return $this->shippings;
	}

}

?>