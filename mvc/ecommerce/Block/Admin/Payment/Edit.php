<?php
namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Admin\Payment\Edit\Tabs');


class Edit extends \Block\Core\Template
{
    public $payment = null;  

	public function __construct()
	{
		 parent::__construct();
         $this->setTemplate('view/admin/payment/edit.php');
	}
	
 	public function getTabContent()
 	{
 		$tabBlock = \Mage::getBlock('Block\Admin\Payment\Edit\Tabs');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getUrl()->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)){
			return null;
		}

		//print_r($tabs[$tab]['block']);
		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		// print_r($block);
		echo $block->toHtml();
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