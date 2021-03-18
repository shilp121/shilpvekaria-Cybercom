<?php
namespace Block\Core\Layout;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Model\Admin\Message');

class Message extends \Block\Core\Template
{

	function __construct()
	{
		$this->setTemplate('view/core/layout/message.php');
	}

	public function getMessage()
	{
		return \Mage::getModel('Model\Admin\Message');
	}
	
}


?>