<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Admin extends \Model\Core\Table
{
	const STATUS_DEFAULT = null;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    

    public function __construct()           
    {
        $this->setTableName("admin");
        $this->setPrimaryKey("id");
    }
    
    public function getStatusOption()
    {
        return [

            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_DEFAULT => '---'

        ];
    }
    public function fetchAll($query = Null)
    {       
        if(!$query){
            $query = "SELECT * FROM `{$this->getTableName()}`";
        }

        $row = $this->getAdapter()->fetchAll($query);

        if(!$row){
            return false;
        }
        foreach ($row as $key => $value) {
            $row = new $this;
            $row->setData($value);
            $rowArray[] = $row;
        }
        return $rowArray;
    }

    
}


?>