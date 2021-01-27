<?php 
//Introduction To array
*$food = array('pizza','pasta','chineese');

$food[4] = 'Fruit';

print_r($food);

echo '<br>'.$food[1];
*/


//Associative arrays

/* $food = array('pizza'=>1000,'pasta'=>300,'chineese'=>50);

//print_r($food);
echo $food['pizza'];
*/


//Multi-Dimensional arrays

$food = array('healthy'=>
						array('salad','Vegetables','pasta'),
			   'Unhealthy'=>
						array('Ice-cream','pizza'));

echo $food['healthy'][0];

?>



