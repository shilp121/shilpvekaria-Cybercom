<?php
namespace Model\Admin;
class Session
{
	
	protected $namespace = null;

	function __construct()
	{
		$this->start();
	}

	public function setNameSpace($namespace)
	{
		$this->nameSpace = $namespace;
		return $this;
	}

	public function getNameSpace()
	{
		return $this->namespace;
	}
	public function start()
	{
		if(session_status() == PHP_SESSION_NONE){
			session_start();
		}
		return $this;
	}
	public function destroy()
	{
		session_destroy();
		return $this;
	}
	public function getId()
	{
		return session_id();
	}

	public function regeneratedId()
	{
		return session_regenerate_id();
	}
	
	public function __set($key, $value)
	{

		return $_SESSION['Admin'][$key] = $value;
	}

	public function __get($key)
	{
		if(!array_key_exists($key, $_SESSION['Admin']))
		{
			return null;
		}
		return $_SESSION['Admin'][$key];
	}

	public function __unset($key)
	{
		unset($_SESSION['Admin'][$key]);
		return $this;
	}

	
}





?>