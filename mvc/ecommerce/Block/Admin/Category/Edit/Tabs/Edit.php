<?php

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Model\Category');


class Edit extends \Block\Core\Template
{
	protected $categorys = null;  
	protected $categoryOptions = [];
	function __construct()
	{
			parent::__construct();
			$this->setTemplate('view/admin/category/edit/tabs/edit.php');
	}

	public function getOption()
    {
       $status = \Mage::getModel('Model\Category');
       return $status->getStatusOption();
    }

	public function setCategory()
	{
		$category = \Mage::getModel('Model\Category');
		$categoryId = $this->getUrl()->getRequest()->getGet('id');
		$category->load($categoryId);
		$this->categorys = $category;
		return $this; 
	}

	public function getCategory()
	{
		if(!$this->categorys){
			$this->setCategory();
		}
		return $this->categorys;
	}


	public function getCategoryOptions(){

		 if (!$this->categoryOptions) {
			$query = "SELECT `{$this->getCategory()->getPrimaryKey()}`, `categoryName` FROM `{$this->getCategory()->getTableName()}`; ";

		 	$options = $this->getCategory()->getAdapter()->fetchPairs($query);	


			$query = "SELECT `{$this->getCategory()->getPrimaryKey()}`, `pathId` 
			FROM `{$this->getCategory()->getTableName()}`; ";
			$this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);	
			
			
			if($this->categoryOptions){
				foreach ($this->categoryOptions as $categoryId => &$pathId) {
					$pathIds = explode("=", $pathId);
					foreach ($pathIds as $key => &$id) {
					 	if(array_key_exists($id, $options)){
					 		$id = $options[$id];
					 	}
					}
					$pathId = implode("/", $pathIds);
				} 	
			}
			 $this->categoryOptions = [""=>"Select"] + $this->categoryOptions;
		 }	
		  return $this->categoryOptions;
	}




}

?>