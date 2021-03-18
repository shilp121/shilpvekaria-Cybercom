<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class GroupPrice extends \Block\Core\Template
{
	
	function __construct()
	{
			$this->setTemplate('view/admin/product/edit/tabs/groupPrice.php');
	}

	
	public function getCustomerGroups()
	{
		$customerGroups = \Mage::getModel('Model\CustomerGroup');
		
		$query = "SELECT cg.*, pgp.productId,pgp.entityId,pgp.price as groupPrice, 
		if(pgp.price IS NULL , pgp.price , p.price) price
		FROM `{$customerGroups->getTableName()}` cg
		LEFT JOIN `product_group_price` pgp
			ON pgp.customerGroupId = cg.groupId
				AND pgp.productId = '{$this->getUrl()->getRequest()->getGet('id')}'
		LEFT JOIN product p
				ON pgp.productId = p.id
		";

		$customerGroupData = $customerGroups->fetchAll($query);	
		return $customerGroupData;
	}

	
}





?>