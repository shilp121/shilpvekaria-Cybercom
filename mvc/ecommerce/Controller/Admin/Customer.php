<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Block\Admin\Customer\Grid');
\Mage::loadFileByClassName('Model\Customer');
\Mage::loadFileByClassName('Model\Core\Message');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Url');
\Mage::loadFileByClassName('Model\Addresses');

class Customer extends \Controller\Core\Admin
{
   
    public function gridAction()
    {
        try{

            $gridBlock = \Mage::getBlock('Block\Admin\Customer\Grid');
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
        try {
            if ((!$this->getRequest()->getGet('tab')) or $this->getRequest()->getGet('tab') == 'customer') {
                if ($id = $this->getRequest()->getGet('id')) {
                    $customer = \Mage::getModel('Model\Customer')->load($id);
                    if (!$customer) {
                        throw new Exception('Please Enter Valid ID');
                    }
                    $customer->updatedDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Updated Successfully.....');

                } else {
                    $customer->createdDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Inserted Successfully.....');
                }
                $customerData = $this->getRequest()->getPost('customer');
                $customer->setData($customerData);
                $customer->save();

            }else {
                $billing = \Mage::getModel('Model\Addresses');
                $shipping = \Mage::getModel('Model\Addresses');
                if ($id = $this->getRequest()->getGet('id')) {
                    $billingData = "SELECT * FROM `addresses` WHERE  `customerId`= '{$id}' AND `type`= 'Billing';";
                   
                    if (!$billing->fetchRow($billingData)) {
                        $billing->type = 'Billing';
                        $billing->customerId = $id;
                        $billing_data = $this->getRequest()->getPost('billing');
                        $billing->setData($billing_data);
                        $billing->save();
                    } else {
                        $billing_data = $this->getRequest()->getPost('billing');
                        $billing->setData($billing_data);
                        $billing->save();
                    }
                    $shippingData = "SELECT * FROM `addresses` WHERE  `customerId`= '{$id}' AND `type`= 'Shipping';";
                    if (!$shipping->fetchRow($shippingData)) {
                        $shipping->type = 'Shipping';
                        $shipping->customerId = $id;
                        $shipping_data = $this->getRequest()->getPost('shipping');
                        $shipping->setData($shipping_data);
                        $shipping->save();

                    } else {
                        $shipping_data = $this->getRequest()->getPost('shipping');
                        $shipping->setData($shipping_data);
                        $shipping->save();
                    }
                }
            }

        } catch (Exception $e) {
            echo "hello";
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, [], true);
        }

        $this->redirect('grid', null, [], true);
    }

    public function editAction()
    {
        try{

            $editBlock = \Mage::getBlock('Block\Admin\Customer\Edit');  
            $layout = $this->getLayout();
            $layout->setTemplate('view/core/layout/twocolumn.php');      
            $content = $layout->getChild('content');
            $content->addChild($editBlock);

            $leftTab = $layout->getChild('left');
            $leftTab->addChild(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
            echo $layout->toHtml();
        }catch(Execption $e){
            $e->getMessage();
        }
        
    }
 
    public function deleteAction()
    {
        try{
            $customerId = $this->getRequest()->getGet('id');
            if(!$customerId){
                throw new Exception("Invalid Id");
            }
            $customer = \Mage::getModel('Model\Customer');
            $customer->load($customerId);
            if($customer->deleteData()){
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