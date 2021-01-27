<?php
//str length
$string = 'alex';
$string_length = strlen($string);
echo $string_length;

//str Upper Lower
$string ='This Is a String, and it is an example.';
$string_lower = strtolower($string);
$string_upper = strtoupper($string);

echo '<br>'.$string_lower;
echo '<br>'.$string_upper;



//str positin
$string = 'This is a string, and it is an example.';
$find = 'is';
echo '<br>'.strpos($string,$find,5);

//Str pspell_store_replacement(dictionary_link, misspelled, correct)
$string_new = substr_replace($string,'hii', 10);
echo '<br>'.$string_new;


?>