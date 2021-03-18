<?php
//require_once './controller/core/Admin.php';
namespace Model\Core;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Request
{		
	public function getPost($key = null, $optional = null)
	{
		if(!$key){
			return $_POST;
		}
		if (!array_key_exists($key,$_POST)) {
			return $optional;
		}
		return $_POST[$key];
	}
	public function getGet($key = null, $optional = null)
	{
		if(!$key){
			return $_GET;
		}
		if (!array_key_exists($key,$_GET)) {
			return $optional;
		}
		return $_GET[$key];
	}

	public function isPost()
	{
		if($_SERVER['REQUEST_METHOD']!='POST'){
			return false;
		}
		return true;
	}
	public function getActionName()
	{
		return $this->getGet('a','Mage');
	}
	public function getControllerName()
	{
		return $this->getGet('c','Mage');	
	}
}


?>