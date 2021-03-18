<?php
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Media extends \Controller\Core\Admin
{
	public function saveAction()
	{
		$productMedia = \Mage::getModel('Model\Product\Media');
		if(!$_FILES['image']['error']){
			$image = $_FILES['image']['name'];
			$tempName = $_FILES['image']['tmp_name'];
			$path = '../ecommerce/Controller/Admin/Product/Images/Products/';
			move_uploaded_file($tempName,$path.$image);
			$productMedia->productId = $this->getRequest()->getGet('id');
			$productMedia->image = $image;
			$productMedia->save();
			
		 }else{
		 	echo "<pre>";
		 	$default = ['small' => 0, 'thumb' => 0, 'base' => 0, 'gallery' => 0];
		 	print_r($this->getRequest()->getPost('image'));
			foreach($this->getRequest()->getPost('image') as $key=>$value){
				if(is_array($value)){
					
					$productMedia = $productMedia->load($key);
					$productMedia->setData($default);
					$productMedia->setData($value);
					$productMedia->save();
				}else{
					 $productMedia = $productMedia->load($value);
                     $productMedia->$key = $value;
                     $productMedia->save();
				}
			}
		}

	
		$this->redirect('edit', 'Product', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'media']);  
	}

	public function deleteAction()
    {
        $path = '../ecommerce/Controller/Product/Images/Products/';
        $productMedia = \Mage::getModel('Model\Product\Media');
        $mediaIds = $this->getRequest()->getPost('imageIds');
        foreach ($mediaIds as $id => $value) {
            $query = "SELECT `image` FROM `productmedia` WHERE  `imageId`={$id}";
            $image = $productMedia->fetchRow($query);
            unlink($path . $image->image);
            $productMedia->deleteData($id);

        }
        $this->redirect('edit', 'Product', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'media']);

    }

	
	 
    

}





?>