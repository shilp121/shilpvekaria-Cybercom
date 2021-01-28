<?php

require 'ipblock.php';

//echo $ip_address;

foreach($ip_blocked as $ip){

	if($ip == $ip_blocked){
		die('Your IP address'.$ip_address.'has been blocked');
	}
}


 ?>

 <h1>MY PAGE</h1>