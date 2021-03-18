<?php
namespace Model\Core;
\Mage::loadFileByClassName('Model\Core\Request');

class url
{
	protected $request =null;
	function __construct()
	{
		$this->setRequest();
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

    public function baseUrl($subUrl = null)
    {
        $url = "http://localhost/cybercomproject/ecommerce/";
        if($subUrl){
            $url .= $subUrl;

        }
        return $url;
    }
}


?>