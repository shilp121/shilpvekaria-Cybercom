<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Block\Admin\CustomerGroup\Grid');
\Mage::loadFileByClassName('Model\CustomerGroup');
\Mage::loadFileByClassName('Model\Core\Message');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Model\Core\Url');

class CustomerGroup extends \Controller\Core\Admin
{
   
    public function gridAction()
    {
        try{

            $gridBlock = \Mage::getBlock('Block\Admin\CustomerGroup\Grid');           
            $layout = $this->getLayout();
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

            $customerGroup = \Mage::getModel('Model\CustomerGroup');
            if(!$this->getRequest()->isPost()){
                throw new Exception('Invalid ID');
            }
            if($id = (int)$this->getRequest()->getGet('id')){
                $customerGroup = $customerGroup->load($id);
                if(!$customerGroup){
                    throw new Exception('CustomerGroup Not Found');  
                }
                $customerGroup->updatedDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Updated Successfully");
            }else{
                $customerGroup->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Inserted Successfully");       
            }
            $customerGroupData = $this->getRequest()->getPost('customerGroup');
            $customerGroup->setData($customerGroupData); 
            $customerGroup->save();  
           // echo "<pre>";print_r( $customerGroup->save());die();

        }catch(Execption $e){
                $this->getMessage()->setFailure($e->getMessage());
            }
        $this->redirect('grid',null,null,true);

    }
    
    public function editAction()
    {
        try{

            $editBlock = \Mage::getBlock('Block\Admin\CustomerGroup\Edit');  
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/twocolumn.php');      
            $content = $layout->getChild('content');
            $content->addChild($editBlock);

            $leftTab = $layout->getChild('left');
            $leftTab->addChild(\Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs'));

            if($this->getRequest()->getGet('CustomerGroupgrid')){
                $edit = \Mage::getBlock('Block\Admin\CustomerGroup\Edit');
            }
            echo $layout->toHtml();
        }catch(Execption $e){
            $e->getMessage();
        }    
    }
 
    public function deleteAction()
    {
        try{
            $customerGroupId = $this->getRequest()->getGet('id');
            if(!$customerGroupId){
                throw new \Exception("Invalid Id");
            }
            $customerGroup = \Mage::getModel('Model\CustomerGroup');
            $customerGroup->load($customerGroupId);
            if($customerGroup->deleteData()){
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