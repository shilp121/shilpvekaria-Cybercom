<?php

$find = array('alex', 'billy', 'shilp');
$replace = array('a**x','b***y', 's***p');


if(isset($_POST['user_input']) && !empty($_POST['user_input'])){

	 $user_input = $_POST['user_input'];
	 //$user_inputlc = strtolower($user_input)
	 //$user_input_new = str_replace($find, $replace, $user_inputlc);
	 $user_input_new = str_ireplace($find, $replace, $user_input);
	 echo $user_input_new;
}

 

 ?>


 <form action="wordcensoring.php" method="POST">
 	<textarea name = "user_input" rows="6" cols="30"><?php echo $user_input; ?></textarea><br><br>
 	<input type="submit" name="Submit">
 </form>