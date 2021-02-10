<?php
class bankAccount{
	public $balance = 0;
	public function Dispalybalance(){
		return $this->balance;
	}
	public function withdraw($amount){
		if($this->balance<5){
			echo 'low Balance';
		}else{
			$this->balance = $this->balance-$amount;
			return $this->balance;
		}
		
	}
}


$alex  = new bankAccount;
$alex->withdraw(5);
echo 'Balance : '.$alex->Dispalybalance();
?>