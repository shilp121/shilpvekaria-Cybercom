<?php
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Admin\Product\Edit\Tabs\groupPrice');

class GroupPrice extends \Controller\Core\Admin
{
	
	public function gridAction()
	{
		$product = 	\Mage::getModel('Model\Product'); 
		try{
			if($productId = $this->getRequest()->getGet('id')){
				$product = $product->load($productId);

				if(!$product){
					throw new Exception("Unable to get ID");
				}	
			}

		}catch (Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}

	}

	public function saveAction()
	{

		$groupData = $this->getRequest()->getPost('groupPrice');
		$productId = $this->getRequest()->getGet('id'); 
		// print_r($productId);die();
		// echo "<pre>";
		// print_r($groupData);//die();
		foreach ($groupData['exist'] as $groupId => $price) {

			$query = "SELECT * FROM product_group_price
			WHERE `productId` = '{$productId}'
			AND `customerGroupId` = '{$groupId}';";

			$groupPrice = \Mage::getModel('Model\Product\Group\Price');
			$groupPrice->fetchRow($query);
			$groupPrice->price = $price;
			$groupPrice->save();

		}

		foreach ($groupData['new'] as $groupId => $price) {
			$groupPrice = \Mage::getModel('Model\Product\Group\Price');
			$groupPrice->customerGroupId = $groupId;
			//print_r($groupPrice->customerGroupId = $groupId);die();
			$groupPrice->productId = $productId;
			$groupPrice->price = $price;
			$groupPrice->save();


		}
		$this->redirect('edit','Product', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'GroupPrice']);  
	}


}






?>