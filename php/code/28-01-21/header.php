<?php 

$ob_start = ob_start();
?>

<h1>My page</h1>

<?php

$redirect_page = 'http://google.co.in';
$redirect = true;

//header('Location:' .$redirect_page);
if($redirect == true){
	header('Location:' .$redirect_page);
}

ob_end_flush();

 ?>