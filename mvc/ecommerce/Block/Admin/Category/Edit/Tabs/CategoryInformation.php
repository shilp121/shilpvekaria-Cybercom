<?php
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class CategoryInformation extends \Block\Core\Template
{
	
	function __construct()
	{
			$this->setTemplate('view/admin/category/edit/tabs/categoryInformation.php');
	}
}





?>