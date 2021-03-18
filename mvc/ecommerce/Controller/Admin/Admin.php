<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Block\Admin\Admin\Grid');
\Mage::loadFileByClassName('Model\Admin');
\Mage::loadFileByClassName('Model\Core\Message');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Model\Core\Url');

class Admin extends \Controller\Core\Admin
{
   
    public function gridAction()
    {
        try{

            $gridBlock = \Mage::getBlock('Block\Admin\Admin\Grid');
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/threecolumn.php');  

            $content = $layout->getChild('content');
            $content->addchild($gridBlock);
            
            echo $layout->toHtml();
            //$Block->toHtml();

        }catch(Execption $e){
            $e->getMessage();
        }
    }

    public function saveAction()
    {
        try{

            $admin = \Mage::getModel('Model\Admin');
            if(!$this->getRequest()->isPost()){
                throw new Exception('Invalid ID');
            }

            if($id = (int)$this->getRequest()->getGet('id')){
                $admin = $admin->load($id);

                if(!$admin){
                    throw new Exception('Admin Not Found');  
                }
                $admin->updatedDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Updated Successfully");
            }else{
                $admin->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Inserted Successfully");       
            }
            $adminData = $this->getRequest()->getPost('admin');
            $admin->setData($adminData);          
            $admin->save();  

        }catch(Execption $e){
                $this->getMessage()->setFailure($e->getMessage());
            }
        $this->redirect('grid',null,null,true);

    }

    public function editAction()
    {
        try{

            $editBlock = \Mage::getBlock('Block\Admin\Admin\Edit');  
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/twocolumn.php');      
            $content = $layout->getChild('content');
            $content->addChild($editBlock);
            echo $layout->toHtml();
        }catch(Execption $e){
            $e->getMessage();
        }
        
    }
 
    public function deleteAction()
    {
        try{
            $adminId = $this->getRequest()->getGet('id');
            if(!$adminId){
                throw new Exception("Invalid Id");
            }
            $admin = \Mage::getModel('Model\Admin');
            $admin->load($adminId);
            if($admin->deleteData()){
                $this->getMessage()->setSuccess('Record Deleted Successfully');
            }else{
                $this->getMessage()->setFailure('Unable to Delete Record');
            }

        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',null,null,true);
    }

    public function statusAction()
    {
        try{
            $adminId = $this->getRequest()->getGet('id');
            $status = $this->getRequest()->getGet('status');
            $updatedDate = date("Y-m-d H:i:s");

            if(!$adminId){
                throw new Exception("Invalid Id");
            }

            $admin = \Mage::getModel('Model\Admin');
            $admin->load($adminId);
            $admin->status = $status;
            $admin->updatedDate = $updatedDate;
            $recordId = $admin->save();
            if(!$recordId){
                throw new Exception("Record Not Found");
            }
            $this->redirect('grid',null,null,true);
        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

}


   
?>