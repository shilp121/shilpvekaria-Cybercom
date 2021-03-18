<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Block\Admin\Product\Grid');
\Mage::loadFileByClassName('Model\Product');
\Mage::loadFileByClassName('Model\Core\Message');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Model\Core\Url');

class Product extends \Controller\Core\Admin
{
   
    public function gridAction()
    {
        try{

            $gridBlock = \Mage::getBlock('Block\Admin\Product\Grid');
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/threeColumn.php');  
            $content = $layout->getChild('content');
            $content->addchild($gridBlock);
            echo $layout->toHtml();

        }catch(Execption $e){
            $e->getMessage();
        }
    }

    public function saveAction()
    {
        try{

            $product = \Mage::getModel('Model\Product');
            if(!$this->getRequest()->isPost()){
                throw new Exception('Invalid ID');
            }

            if($id = (int)$this->getRequest()->getGet('id')){
                $product = $product->load($id);

                if(!$product){
                    throw new Exception('product Not Found');  
                }
                $product->updatedDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Updated Successfully");
            }else{
                $product->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Inserted Successfully");       
            }
            $productData = $this->getRequest()->getPost('product');
            $product->setData($productData);          
            $product->save();  

        }catch(Execption $e){
                $this->getMessage()->setFailure($e->getMessage());
            }
        $this->redirect('grid',null,null,true);

    }

    public function editAction()
    {
        try{

            $editBlock = \Mage::getBlock('Block\Admin\Product\Edit');  
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/twocolumn.php');      
            $content = $layout->getChild('content');
            $content->addChild($editBlock);
            
            if($this->getRequest()->getGet('id')){
                $leftTab = $layout->getChild('left');
                $leftTab->addChild(\Mage::getBlock('Block\Admin\Product\Edit\Tabs'));    
            }
            echo $layout->toHtml();
        }catch(Execption $e){
            $e->getMessage();
        }
        
    }
 
    public function deleteAction()
    {
        try{
            $productId = $this->getRequest()->getGet('id');
            if(!$productId){
                throw new Exception("Invalid Id");
            }
            $product = \Mage::getModel('Model\Product');
            $product->load($productId);
            if($product->deleteData()){
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable to Delete Record');
            }

        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',null,null,true);
    }

}

?>