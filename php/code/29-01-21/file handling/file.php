<?php 

$directory = 'file';

if($handle = opendir($directory.'/')){
	echo 'looking inside \''.$directory.'\':<br>';
	
	while($file = readdir($handle)){

		if($file!='.' && $file!='..'){

			//echo $file.'<br>';
			echo '<a href = "'.$directory.'/'.$file. '" >'.$file.'</a><br>';
		}
		
	}
}

?>