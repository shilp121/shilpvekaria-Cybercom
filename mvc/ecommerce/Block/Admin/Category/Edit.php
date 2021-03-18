<?php
namespace Block\Admin\Category;

\Mage::loadFileByClassName('Model\Category');
\Mage::loadFileByClassName('Block\Core\Template');


class Edit extends \Block\Core\Template
{
	public $category = null;
	public function __construct()
	{
		 parent::__construct();
         $this->setTemplate('view/admin/category/edit.php');
	}
	public function getTabContent()
 	{
 		$tabBlock = \Mage::getBlock('Block\Admin\Category\Edit\Tabs');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getUrl()->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)){
			return null;
		}

		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		echo $block->toHtml();
 	}
	public function setCategory()
	{
		$category = \Mage::getModel('Model\Category');
		$categoryId = $this->getUrl()->getRequest()->getGet('id');
		$category->load($categoryId);
		$this->category = $category;
		return $this; 
	}

	public function getCategory()
	{
		if(!$this->category){
			$this->setCategory();
		}
		return $this->category;
	}

}







 ?>