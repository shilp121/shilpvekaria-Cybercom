<?php
namespace Block\Admin\Category\Edit;

\Mage::loadFileByClassName('Block\Core\Template');	

class Tabs extends \Block\Core\Template
{
	protected $tabs = [];
	protected $defaultTab = null;
	
	function __construct()
	{
		$this->setTemplate('view/admin/category/edit/tabs.php');
		$this->prepareTab();

	}

	public function prepareTab(){
		$this->addTab('category',['label'=>'Add Edit','default'=>true, 'block'=>'Block\Admin\Category\Edit\Tabs\Edit']);
		$this->addTab('categoryInformation',['label'=>'Category Information','default'=>true, 'block'=>'Block\Admin\Category\Edit\Tabs\CategoryInformation']);
		$this->setDefaultTab('category');
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