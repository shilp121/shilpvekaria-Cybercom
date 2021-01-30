<?php
$filename = 'name.txt';
$handle = fopen($filename,'r');

$datain = fread($handle, filesize($filename));
$names_array = explode(', ', $datain);

echo $datain;
//echo $names_array[0];

fclose($handle);



?>	
