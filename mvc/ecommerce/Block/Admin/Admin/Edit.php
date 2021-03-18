<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Model\Admin');
\Mage::loadFileByClassName('Block\Core\Template');


class Edit extends \Block\Core\Template
{
	public $admin = null;
	public function __construct()
	{
		 parent::__construct();
         $this->setTemplate('view/admin/admin/edit.php');
	}

	public function getOption()
    {
       $status = \Mage::getModel('Model\Customer');
       return $status->getStatusOption();
    }

	public function getTabContent()
 	{
 		$tabBlock = \Mage::getBlock('Block\Admin\Admin\Edit\Tabs');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getUrl()->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)){
			return null;
		}

		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
 	}
	public function setAdmin()
	{
		$admin = \Mage::getModel('Model\Admin');
		$adminId = $this->getUrl()->getRequest()->getGet('id');
		$admin->load($adminId);
		$this->admin = $admin;
		return $this; 
	}

	public function getAdmin()
	{
		if(!$this->admin){
			$this->setadmin();
		}
		return $this->admin;
	}

}







 ?>