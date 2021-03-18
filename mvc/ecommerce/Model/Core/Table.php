<?php
namespace Model\Core;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Category\Collection');


class Table
{
	protected $tableName = Null;
	protected $primarykey = Null;
	protected $data = [];
	protected $adapter = Null;
       
	public function setTableName($tableName){
		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName(){
		if(!$this->tableName){
			$this-setTableName();
		}
		return $this->tableName;
	}

	public function setPrimaryKey($primaryKey){
		$this->primarykey = $primaryKey; 
		return $this;
	}

	public function getPrimarykey(){

		if(!$this->primarykey){
			$this->setPrimaryKey();
		}
		return $this->primarykey;
	}

	public function setAdapter(){
		$this->adapter = \Mage::getModel("Model\Core\Adapter");
		return $this;
	}

	public function getAdapter(){
		if(!$this->adapter){
			$this->setAdapter();
		}
		return $this->adapter;
	}

	public function __set($name,$value){
		$this->data[$name] = $value;
		return $this;
	}

	public function __get($name)
	{
		if(!array_key_exists($name, $this->data)){
			return null;
		}
		return $this->data[$name];
	}


	function setData(array $data){
			
		$this->data = array_merge($this->data, $data);
		return $this;
	}

	function getData(){

		return $this->data;
	}
	
    
    public function save()
    {

     if(!array_key_exists($this->getPrimaryKey(),$this->getData())){

            $fields = implode(",", array_keys($this->getData()));
            $values = "'" . implode("','", array_values($this->getData())) . "'";
            $query = "INSERT INTO `{$this->getTableName()}` ({$fields}) VALUES({$values})";

            $id= $this->getAdapter()->insert($query);
            $this->load($id);
            return $this;
        }

        $sets = "";
        foreach ($this->getData() as $k => $v) {
        $sets = $sets . $k . "='" . $v . "',";
        }
        $sets = rtrim($sets, ",");
        $query = "UPDATE `{$this->getTableName()}` SET {$sets} WHERE `{$this->getPrimaryKey()}`='{$this->getData()[$this->getPrimaryKey()]}'";
        $this->getAdapter()->update($query);   
        $id = $this->getPrimarykey();
        $this->load($id);
        return $this;

    }
    public function load($value){
        $value = (int)$value;
        $query = $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`='{$value}'";
        $categoryData = $this->fetchRow($query);
        return $this;
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
        $collecttionClassName = get_class($this) . '\Collection';
        $collection = \Mage::getModel($collecttionClassName);
        $collection->setData($rowArray);
        unset($rows);
        return $collection;
    }

    public function fetchRow($query = null)
    {
        $row = $this->getAdapter()->fetchRow($query);

        if(!$row){
            return false;
        }
        $this->setData($row); 
        return $this;       
    }

    public function deleteData($Id = null){
        if(!$Id){

            if(!array_key_exists($this->getPrimaryKey(),$this->getData())){
                return false;
            }

            $Id = $this->getData()[$this->getPrimaryKey()];
            
        }
        $query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '{$Id}'";
        return $this->getAdapter()->delete($query);

    }
}

?>