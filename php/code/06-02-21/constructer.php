<?php

 class Person{
 	public $say = 'saysoomethung';
 	public function __construct($said)
 	{
 		 $this->Saysomething($said);
 	}
 	public function Saysomething($said){
 		echo $said;
 	}

}

$shilp = new Person('hello');
?>