<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

class Addresses extends \Model\Core\Table
{
	
	public function __construct()           
    {
        $this->setTableName("addresses");
        $this->setPrimaryKey("id");
    }

    
}
?>