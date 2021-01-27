<?php

@mysqli_connect('localhost', 'root', '') or die('Could ot connect to database!'); //If not, thrn it redirect in the die

echo('connected!'); //If everything is perfect then this message will be showen

?>