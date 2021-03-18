<?php
namespace Model;


\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');


class Category extends \Model\Core\Table
{
    
    const STATUS_DEFAULT = null;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()           
    {
        $this->setTableName("category");
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
    
    public function updatePathId()
    {

        if(!$this->parentId){
                $pathId =  $this->id;

            }else{ 

                $parent = \Mage::getBlock('Model\Category')->load($this->parentId);
                if(!$parent){
                    throw new Exception("Unable to load parent Id");
                }
                $pathId = $parent->pathId."=".$this->id;
            }
             $this->pathId = $pathId;
            return $this->save();

    }
    public function updateChildrenPathIds($categoryPathId, $parentId = Null)
    {
        $categoryPathId = $categoryPathId."=";
        $query = "SELECT * FROM `category` WHERE pathId LIKE '{$categoryPathId}%' ORDER BY pathId ASC;";
        $categorys = $this->fetchAll($query);
      
        if($categorys){
            foreach ($categorys->getData() as $key=>$row){
                if($parentId){
                    
                    $row->parentId = $parentId;
                }
                $row->updatePathId();
            }
        }

    }


}


?>