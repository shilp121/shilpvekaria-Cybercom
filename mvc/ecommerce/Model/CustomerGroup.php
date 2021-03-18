<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class CustomerGroup extends \Model\Core\Table
{
	const STATUS_DEFAULT = null;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    

    public function __construct()           
    {
        $this->setTableName("customer_group");
        $this->setPrimaryKey("groupId");
    }
    
    public function getStatusOption()
    {
        return [

            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_DEFAULT => '---'

        ];
    }

    
}


?>