<?php
namespace Block\Admin\Product\Edit;

\Mage::loadFileByClassName('Block\Core\Template');	

class Tabs extends \Block\Core\Template
{
	protected $tabs = [];
	protected $defaultTab = null;
	
	function __construct()
	{
		$this->setTemplate('view/admin/product/edit/tabs.php');
		$this->prepareTab();

	}

	public function prepareTab(){
		$this->addTab('product',['label'=>'Product Information','default'=>true, 'block'=>'Block\Admin\Product\Edit\Tabs\Edit']);
		$this->addTab('media',['label'=>'Media','default'=>true, 'block'=>'Block\Admin\Product\Edit\Tabs\Media']);
		$this->addTab('GroupPrice',['label'=>'Group Price','default'=>true, 'block'=>'Block\Admin\Product\Edit\Tabs\groupPrice']);
		$this->setDefaultTab('product');
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