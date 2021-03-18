<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Block\Admin\Category\Grid');
\Mage::loadFileByClassName('Model\Category');
\Mage::loadFileByClassName('Model\Core\Message');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Model\Core\Url');

class Category extends \Controller\Core\Admin
{
    
    public function gridAction()
    {
        try{

            $gridBlock = \Mage::getBlock('Block\Admin\Category\Grid');
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
            $category = \Mage::getModel('Model\Category');
            if(!$this->getRequest()->isPost()){
                throw new Exception('Invalid ID');
            }
            if($id = (int)$this->getRequest()->getGet('id')){
                $category = $category->load($id);
                if(!$category){
                    throw new Exception('Category Not Found');  
                }
                $category->updatedDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Updated Successfully");
            }else{
                $category->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Inserted Successfully");       
            }

            $categoryPathId = $category->pathId;
            $categoryData = $this->getRequest()->getPost('category');
            $category->setData($categoryData);
            $category->save();
            
            $category->updatePathId();

            //Manage Childrens
            $category->updateChildrenPathIds($categoryPathId);

        }catch(Execption $e){
                $this->getMessage()->setFailure($e->getMessage());
            }
        $this->redirect('grid',null,null,true);

    }

    public function editAction()
    {
        try{

            $editBlock = \Mage::getBlock('Block\Admin\Category\Edit');  
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/twocolumn.php');      
            $content = $layout->getChild('content');
            $content->addChild($editBlock);
            $leftTab = $layout->getChild('left');
            $leftTab->addChild(\Mage::getBlock('Block\Admin\Category\Edit\Tabs'));
            echo $layout->toHtml();

        }catch(Execption $e){
            $e->getMessage();
        }
        
    }
 
    public function deleteAction()
    {
        try{
            $categoryId = $this->getRequest()->getGet('id');
            if(!$categoryId){
                throw new Exception("Invalid Id");
            }
            $category = \Mage::getModel('Model\Category');
            $category->load($categoryId);

            $pathId = $category->pathId;
            $parentId = $category->parentId;
            $category->updateChildrenPathIds($pathId, $parentId);

            if($category->deleteData()){
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
            $categoryId = $this->getRequest()->getGet('id');
            $status = $this->getRequest()->getGet('status');
            $updatedDate = date("Y-m-d H:i:s");

            if(!$categoryId){
                throw new Exception("Invalid Id");
            }
            $category = \Mage::getModel('Model\Category');
            $category->load($categoryId);
            $category->status = $status;
            $category->updatedDate = $updatedDate;
            $recordId = $category->save();
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