


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
$link = mysqli_connect("localhost", "root", "");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
echo "Connect Successfully. Host info: " . mysqli_get_host_info($link); 
<?php

?>*/
$conn_error = 'Could not connect.';  
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$link = mysqli_connect($mysql_host,$mysql_user,$mysql_pass) or die($conn_error);


mysqli_close($link);

?>