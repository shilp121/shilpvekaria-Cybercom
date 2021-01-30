<?php

$filename = 'echo.txt';
if(file_exists($filename)){
	echo 'File Already Exists.';
}else{
	$handle = fopen($filename,'w');
	fwrite($handle, 'Nothing');
	fclose($handle);
}

//$filename_or = 'image.jpg';
//$filename = rand(1000,9999).md5($filename_or).rand(1000,9999);

//echo $filename;

?>