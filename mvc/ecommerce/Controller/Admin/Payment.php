<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Block\Admin\Payment\Grid');
\Mage::loadFileByClassName('Model\Payment');
\Mage::loadFileByClassName('Model\Core\Message');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::loadFileByClassName('Model\Core\Url');

class Payment extends \Controller\Core\Admin
{
   
    public function gridAction()
    {
        try{

            $gridBlock = \Mage::getBlock('Block\Admin\Payment\Grid');
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

            $payment = \Mage::getModel('Model\Payment');
            if(!$this->getRequest()->isPost()){
                throw new Exception('Invalid ID');
            }
            if($id = (int)$this->getRequest()->getGet('id')){
                $payment = $payment->load($id);

                if(!$payment){
                    throw new Exception('payment Not Found');  
                }
                $payment->updatedDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Updated Successfully");
            }else{
                $payment->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Record Inserted Successfully");       
            }
            $paymentData = $this->getRequest()->getPost('payment');
            $payment->setData($paymentData);          
            $payment->save();  
           
        }catch(Execption $e){
                $this->getMessage()->setFailure($e->getMessage());
            }
        $this->redirect('grid',null,null,true);
    }

    public function editAction()
    {
        try{

            $editBlock = \Mage::getBlock('Block\Admin\Payment\Edit');  
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/twocolumn.php');      
            $content = $layout->getChild('content');
            $content->addChild($editBlock);

            $leftTab = $layout->getChild('left');
            $leftTab->addChild(\Mage::getBlock('Block\Admin\Payment\Edit\Tabs'));

            if($this->getRequest()->getGet('Paymentgrid')){
                $edit = \Mage::getBlock('Block\Admin\Payment\Edit');
            }
            echo $layout->toHtml();
        }catch(Execption $e){
            $e->getMessage();
        }
        
    }
 
    public function deleteAction()
    {
        try{
            $paymentId = $this->getRequest()->getGet('id');
            if(!$paymentId){
                throw new Exception("Invalid Id");
            }
            $payment = \Mage::getModel('Model\Payment');
            $payment->load($paymentId);
            if($payment->deleteData()){
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