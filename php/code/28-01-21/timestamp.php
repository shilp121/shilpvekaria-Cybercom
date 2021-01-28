<?php 

$time = time();
$actual_time = date('H:i:s', $time);
$actual_time = date('D M Y @ H:i:s', $time);

echo 'The current time is :'.$actual_time;
//echo time();
$time_modified = date('D M Y @ H:i:s', $time-60);
$time_modified = date('D M Y @ H:i:s', strtotime('+1 week 4 hours 5 seconds'));

echo '<br>'.'The current time is '.$actual_time.'and modified time is'.$time_modified;
?>