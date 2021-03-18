<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Media extends \Block\Core\Template
{
	protected $imageData = null; 
	
	function __construct()
	{
			$this->setTemplate('view/admin/product/edit/tabs/media.php');
	}

	public function setProductMedia()
	{
		$media = \Mage::getModel('Model\Product\Media');
		$table = $media->getPrimaryKey();
		$mediaId = $this->getUrl()->getRequest()->getGet('id');

		$query = "SELECT * FROM `{$media->getTableName()}`
		WHERE `productId` = '{$mediaId}' ";

		$this->imageData = $media->fetchAll($query);
		//print_r($this->imageData);die();
		return $this;
	}
	public function getproductMedia()
	{
		if(!$this->imageData){
			$this->setProductMedia();
		}

		return $this->imageData;
	}
}

?>