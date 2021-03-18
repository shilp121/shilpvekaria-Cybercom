<?php
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Admin\Session');


class Message extends \Model\Admin\Session
{

	function __construct()
	{
		parent::__construct();
		$this->setNamespace('Admin');
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

	public function clearFailure()
	{
		unset($this->failure);
		return $this;
	}

	public function clearSuccess()
	{
		unset($this->success);
		return $this;
	}
}




?>