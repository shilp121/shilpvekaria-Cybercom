<?php

$link = mysqli_connect('localhost','root','','form1');
$db = mysqli_select_db('adatabse');


class ServerException extends Exception{}
class DatabaseException  extends Exception{}

try{
	if(!@$link){
		throw new ServerException('Could not connect to Sever');
	}elseif (!@$db) {
		# code...
		throw new DatabaseException('Could not select Database');
	}
	else{
		echo 'Connected';
	}
}catch(ServerException $se){
	echo 'ERROR'.$se->getMessage();
}catch(DatabaseException $de){
	echo 'ERROR'.$de->getMessage();
}

?>