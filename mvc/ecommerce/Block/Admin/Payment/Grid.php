<?php
namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Model\Payment');
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{	
	protected $payments = [];
	public function __construct()
	{
		parent::__construct();
        $this->setTemplate('view/admin/payment/grid.php');	
	}

	public function setPayment()		
	{

			$payment = \Mage::getModel('Model\Payment');
			$paymentData = $payment->fetchAll();
			$this->payments = $paymentData;
			return $this;
	}

	public function getPayment(){
			if(!$this->payments){
				$this->setPayment();
			}
		   return $this->payments;
	}

}

?>