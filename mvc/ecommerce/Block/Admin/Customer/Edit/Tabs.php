<?php
namespace Block\Admin\Customer\Edit;

\Mage::loadFileByClassName('Block\Core\Template');	

class Tabs extends \Block\Core\Template
{
	protected $tabs = [];
	protected $defaultTab = null;
	
	function __construct()
	{
		$this->setTemplate('view/admin/customer/edit/tabs.php');
		$this->prepareTab();

	}

	public function prepareTab(){
		$this->addTab('customer',['label'=>'customer','default'=>true, 'block'=>'Block\Admin\Customer\Edit\Tabs\CustomerInformation']);
		$this->addTab('addresses',['label'=> 'Addresses', 'default' =>true, 'block'=>'Block\Admin\Customer\Edit\Tabs\Addresses']);
		$this->setDefaultTab('customer');
		return $this;
	}

	public function setDefaultTab($defaultTab)
	{
		$this->defaultTab = $defaultTab;
		return $this;
	}

	public function getDefaultTab()
	{
		return $this->defaultTab;
	}
	
	public function setTabs(array $tab)
	{
		$this->tabs = $tab;
		return $this;
	}

	public function getTabs()
	{
		return $this->tabs;
	}

	public function addTab($key, $tab = [])
	{
		$this->tabs[$key] = $tab;
		return $this;
	}

	public function getTab($key)
	{
		if(!array_key_exists($key, $tabs)){
			return null;
		}
		return $this->tabs[$key];
	}

	public function removeTab()
	{
		if(array_key_exists($key, $this->tabs))
		{
			unset($this->tabs[$key]);
		}
		return $this;
	}

}


?>