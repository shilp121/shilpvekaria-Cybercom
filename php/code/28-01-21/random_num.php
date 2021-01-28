<?php 
//$rand = rand();

//$max = getrandmax();

//echo $rand.'/'.$max; 

if(isset($_POST['roll']) && !empty($_POST['roll'])){
	$rand = rand(1,6);

	echo $rand;
}

?>


<form action = 'random_num.php' method = 'POST'>
	
	<input type="submit" name="roll" value="Roll dice">

</form>