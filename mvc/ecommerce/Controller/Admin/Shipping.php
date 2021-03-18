<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Block\Admin\Shipping\Grid');
\Mage::loadFileByClassName('Model\Shipping');
\Mage::loadFileByClassName('Model\Core\Message');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Model\Core\Url');

class Shipping extends \Controller\Core\Admin
{
   
    public function gridAction()
    {
        try{

            $gridBlock = \Mage::getBlock('Block\Admin\Shipping\Grid');
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

            $shipping = \Mage::getModel('Model\Shipping');
            if(!$this->getRequest()->isPost()){
                throw new Exception('Invalid ID');
            }

            if($id = (int)$this->getRequest()->getGet('id')){
                $shipping = $shipping->load($id);

                if(!$shipping){
                    throw new Exception('shipping Not Found');  
                }
                $shipping->updatedDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Updated Successfully");
            }else{
                $shipping->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Inserted Successfully");       
            }
            $shippingData = $this->getRequest()->getPost('shipping');
            $shipping->setData($shippingData);          
            $shipping->save();  

        }catch(Execption $e){
                $this->getMessage()->setFailure($e->getMessage());
            }
        $this->redirect('grid',null,null,true);

    }

    public function editAction()
    {
        try{

            $editBlock = \Mage::getBlock('Block\Admin\Shipping\Edit');  
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/twocolumn.php');      
            $content = $layout->getChild('content');
            $content->addChild($editBlock);

            $leftTab = $layout->getChild('left');
            $leftTab->addChild(\Mage::getBlock('Block\Admin\Shipping\Edit\Tabs'));
            
            echo $layout->toHtml();
        }catch(Execption $e){
            $e->getMessage();
        }
        
    }
 
    public function deleteAction()
    {
        try{
            $shippingId = $this->getRequest()->getGet('id');
            if(!$shippingId){
                throw new Exception("Invalid Id");
            }
            $shipping = \Mage::getModel('Model\Shipping');
            $shipping->load($shippingId);
            if($shipping->deleteData()){
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