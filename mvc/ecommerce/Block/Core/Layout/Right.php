<?php
namespace Block\Core\Layout;

\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Right extends \Block\Core\Template
{
	
	function __construct()
	{
		$this->setTemplate('view/core/layout/Right.php');

	}
}


?>