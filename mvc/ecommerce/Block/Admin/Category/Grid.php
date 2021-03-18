<?php
namespace Block\Admin\Category;
\Mage::loadFileByClassName('Model\Category');
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{	
	protected $categoryOption = []; 
	protected $categorys = [];
	public function __construct()
	{
		 ///parent::__construct();
		parent::__construct();
        $this->setTemplate('view/admin/category/grid.php');	
		// $this->setController(new Controller_Category());
	}

	public function setCategory()		
	{

			$category = \Mage::getModel('Model\Category');
			$query = "SELECT * FROM `{$category->getTableName()}` ORDER BY `pathId` ASC;";
			$categoryData = $category->fetchAll($query);
			$this->categorys = $categoryData;
			return $this;
	}

	public function getCategory(){
			if(!$this->categorys){
				$this->setCategory();
			}
		   return $this->categorys;
	}

	public function getName($category)
	{
		$categoryModel = \Mage::getModel('Model\Category');

		if(!$this->categoryOption){

		$query = "SELECT `{$categoryModel->getPrimaryKey()}`, `categoryName`
				FROM `{$categoryModel->getTableName()}`; ";
		$this->categoryOption = $categoryModel->getAdapter()->fetchPairs($query);

		}
		// echo "<pre>";
		// print_r($this->getCategory()->getData());
		//foreach ($this->getCategory()->getData() as &$categoryName){		
			$pathIds = explode("=", $category->pathId);
			foreach ($pathIds as $key => &$id) {
			 	if(array_key_exists($id, $this->categoryOption)){
			 		$id = $this->categoryOption[$id];
			 	}
			}
			$categoryName = implode("=>",$pathIds);
		//}
		return $categoryName;		
	}

}

?>