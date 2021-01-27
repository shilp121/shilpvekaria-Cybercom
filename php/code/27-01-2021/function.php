<?php

function MyName(){

echo "alex";
}
echo 'My name is ';
MyName();

function add($num1,$num2){
	$sum = $num1 + $num2;
	echo '<br>'.$sum;
	return $sum;
}
add(1,2);
echo add(1,2);

echo '<br>'.$user_ip = $_SERVER['REMOTE_ADDR'];
 ?>
