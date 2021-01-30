<?php

session_start();


//echo $_SESSION['name'];
/*
if(isset($_SESSION['name'])){
	echo 'Welcome '.$_SESSION['name'];
}else{
	echo 'Please logged in';
}
*/
echo 'Welcome'.$_SESSION['name'].'Your are'.$_SESSION['age'].'old';
?>