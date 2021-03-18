<?php
namespace Model\Core;

\Mage::loadFileByClassName('Model\Core\Session');


class Message extends \Model\Core\Session
{

	function __construct()
	{
		parent::__construct();
		$this->setNamespace('core');
	}

	public function setSuccess($message)
		{
			$this->success = $message;
			return $this;
		}	

	public function getSuccess()
	{
		if(!$this->success){
			return null;
		}
		return $this->success;
	}

	public function setFailure($message)
	{
		$this->failure = $message;
		return $this;
	}	

	public function getFailure()
	{
		return $this->failure;
	}

	public function clearSuccess()
	{
		unset($this->success);
		return $this;
	}
}




?>