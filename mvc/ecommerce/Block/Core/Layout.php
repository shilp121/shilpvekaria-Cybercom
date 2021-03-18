<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\Core\Template');

class Layout extends Template
{
	
	function __construct()
	{
        //$this->setController(new Controller_Category());
        parent::__construct();
		$this->setTemplate('view/core/layout/threeColumn.php');
		$this->prepareChildren();
	}

	public function prepareChildren()
	{
		$this->addchild($this->createBlock('Block\Core\Layout\Content'),'content');
		$this->addchild($this->createBlock('Block\Core\Layout\Right'),'right');
		$this->addchild($this->createBlock('Block\Core\Layout\Left'),'left');		
	}

	public function getContent()
	{
		return $this->getChild('content');
	}

	public function getLeft()
	{
		return $this->getChild('left');

	}

	public function getRight()
	{
		return $this->getChild('right');
	}



	
}

?>