<?php
class bankAccount{
	//private $balance = 0;
	//protected $balance = 0;
	public $balance = 0;
	public function Dispalybalance(){
		return $this->balance;
	}
	
}


$alex  = new bankAccount;
echo 'Balance : '.$alex->$balance;
?> 	