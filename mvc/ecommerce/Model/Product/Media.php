<?php
namespace Model\Product;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Media extends \Model\Core\Table
{

	public function __construct()			
	{
		$this->setTableName("productmedia");
		$this->setPrimaryKey("imageId");
	}


	
}


?>