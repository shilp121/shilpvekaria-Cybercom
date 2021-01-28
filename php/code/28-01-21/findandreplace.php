<?php 

$offset = 0;
if(isset($_POST['user_input']) && isset($_POST['Search']) &&isset($_POST['Replace'])){

	$user_input =$_POST['user_input'];
	$Search = $_POST['Search'];
	$Replace = $_POST['Replace'];
	$search_length = strlen($Search);

	if(!empty($user_input) && !empty($Search) && !empty($Replace)){

	   while($strpos = strpos($user_input, $Search, $offset)){
	   	//echo $strpos;
	   	//echo $offset = $strpos + $search_length;
	   	$offset = $strpos + $search_length;
	   	$user_input = substr_replace($user_input, $Replace, $strpos, $search_length);
	   }
	   echo $user_input;


	}else{
		echo 'Please Fill all the Fields';
	}
}

?>


<form action="findandreplace.php" method="POST">
	<textarea name = "user_input" rows="6" cols= "20"> </textarea><br><br>
	Search for: <br>
	<input type="text" name="Search"><br>
	Replace with: <br>
	<input type="text" name="Replace"><br>
	<input type="submit" name="submit">


</form>