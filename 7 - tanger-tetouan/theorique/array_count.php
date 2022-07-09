<?php 

// array
$array = [
    'pays'=>'Maroc',
    'ville'=>'Rabat',
    'b_cc'=>'...',
    'population'=>40000000,
    'a_test'=>'...'
];
ksort($array);
var_dump($array);