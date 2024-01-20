<?php

$binary = array( 1, 1, 0, 1, 1, 0, 1);

function get_count($array){
    $zeroes = 0;
    $ones = 0;

    foreach($array as $arr){
        if($arr === 1){
            $ones++;
        }else if($arr === 0){
            $zeroes++;
        }
    }

    $output['zeroes'] = $zeroes;
    $output['ones'] = $ones;

    return $output;
}


 
$output = get_count($binary); 
var_dump($output); 

?>