<?php

$food = array('healthy'=>
						array('salad','Vegetables','pasta'),
			   'Unhealthy'=>
						array('Ice-cream','pizza'));

foreach($food as $element =>$inner_array){

	echo '<strong>'.$element.'</strong><br>';

	foreach($inner_array as $items){

		echo $items.'<br>';
	}
}

?>