<?php

/*$handle = fopen('name.txt','a');

fwrite($handle, 'Alex'.'/n');
//fwrite($handle,"\n".'raj'."\n");
//fwrite($handle, 'shilp');
fclose($handle);*/

if(isset($_POST['name'])){
	$name = $_POST['name'];
	if(!empty($name)){
		$handle = fopen('name.txt','a');
		fwrite($handle, "\n".$name."\n");
		fclose($handle);
	}
}


?>	



<form action = "file.php" method="POST">
	
	namme:<br>
	<input type="text" name="name"><br>
	<input type ="submit" name = "submit">
</form>