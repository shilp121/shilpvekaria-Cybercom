<?php
function divide($sum1, $sum2){
	if($sum2 == 0){
		throw new Exception('Cannot divide by Zero');
	}else{
		return $sum1/$sum2;
	}
}

echo divide(5,0);

?>