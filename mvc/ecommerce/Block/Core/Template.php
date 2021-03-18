<?php
namespace Block\Core;

 \Mage::loadFileByClassName('Model\Core\Url');

class Template
{
	//protected $controller = null;
	public $template = null;	
	protected $children = [];
	protected $url = null;
	//protected $request = null;

	function __construct()
	{
		$this->setUrl();
	}

	public function setTemplate($template)
	{		
		$this->template = $template;
		return $this;
	}

	public function getTemplate()
	{
		return $this->template;
	}

	// public function getUrl($actionName = null, $controllerName = null, $params = [], $resetParams = false){
		
	// 	return $this->getController()->getUrl($actionName, $controllerName, $params, $resetParams);
	// }

	public function setUrl($url = null)
	{
		if(!$url){
			$url = \Mage::getModel('Model\Core\Url');
		}
		$this->url = $url;
		return $this;
 	}

 	public function getUrl()
 	{
 		if(!$this->url){
 			$this->setUrl();
 		}
 		return $this->url;
 	}

	public function toHtml(){

		 ob_start();
		 require_once $this->getTemplate();
		 $content = ob_get_contents();
		 ob_end_clean();
		 return $content;
	}

	public function setChildren(array $children = [])
	{
		$this->children = $children;
		return $this;
	}

	public function getChildren()
	{
		return $this->children;
	}

	public function addChild(\Block\Core\Template $child, $key = null)
	{
		if(!$key){
			$key = get_class($child);
		}
		$this->children[$key] = $child;
		return $this;
	}

	public function getChild($key)
	{
			if(!array_key_exists($key, $this->children)){
				return null;
			}	
			return $this->children[$key];
	}

	public function removeChild()
	{
		if(array_key_exists($key, $this->getChildren)){
			unset($this->children[$key]);
		}
		return $this;
	}

	public function createBlock($className)
	{
		return \Mage::getBlock($className);
	}

	public function baseUrl($subUrl = null)
	{
		return $this->getUrl()->baseUrl($subUrl);
	}
}
?>