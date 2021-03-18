<?php
namespace Block\Admin\Payment\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Model\Payment');

class paymentInformation extends \Block\Core\Template
{

	protected $payment = null;

	function __construct()
	{
			parent::__construct();
			$this->setTemplate('view/admin/payment/edit/tabs/paymentInformation.php');
	}

	public function getOption()
    {
       $status = \Mage::getModel('Model\Payment');
       return $status->getStatusOption();
    }

	public function setPayment()
	{
		$payment = \Mage::getModel('Model\Payment');
		$paymentId = $this->getUrl()->getRequest()->getGet('id');
		$payment->load($paymentId);
		$this->payment = $payment;
		return $this; 
	}

	public function getPayment()
	{
		if(!$this->payment){
			$this->setPayment();
		}
		return $this->payment;
	}

}

?>