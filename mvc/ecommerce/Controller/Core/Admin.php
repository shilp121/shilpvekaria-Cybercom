<?php
namespace Controller\Core;
\Mage::loadFileByClassName('Model\Core\Request');
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Model\Admin\Message');


class Admin 
{
    protected $request = Null;
    protected $layout = Null;
    protected $message = Null;
    public function __construct(){

        $this->setRequest();
       $this->setLayout();
       $this->setMessage();
    }
    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if(!$this->layout){
            $layout = \Mage::getBlock('Block\Core\Layout');
        }
        $this->layout = $layout;
        return $this;
    }

    public function getLayout()
    {
        return $this->layout;
    }
    public function setRequest(){

        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }

    public function getRequest()
    {
        if(!$this->request){
            $this->setRequest();
        }
        return $this->request;
    }

    public function redirect($actionName = null, $controllerName = null, $params = [], $resetParams = false)
    {
        
        header("location:" . $this->getUrl($actionName, $controllerName, $params, $resetParams));
        exit();
    }
    public function getUrl($actionName = null, $controllerName = null, $params = [], $resetParams = false)
    {
        $final = $this->getRequest()->getGet();
        // $final = $_GET;
        // print_r($final);die();

        if ($resetParams) {
            $final = [];
        }
       
        if (empty(trim($actionName))) {
            $actionName = $this->getRequest()->getActionName();
        }
        if (empty(trim($controllerName))) {
            $controllerName =$this->getRequest()->getControllerName();
        }

        $final['c'] = $controllerName;
        $final['a'] = $actionName;
       
        if (is_array($params)) {
            $final = array_merge($final, $params);
        }
        $queryString = http_build_query($final);
        return "http://localhost/cybercomproject/ecommerce/Mage.php?{$queryString}";

    }

    public function setMessage()        
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
?>