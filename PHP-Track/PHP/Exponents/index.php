<?php

$digits = array(8,11, 4);

function exponential($digits , $exp){
    $result = array();

    foreach($digits as $dig){
        $result[] = $dig ** $exp;
    }

    return $result;
}

$result = exponential($digits , 4);
var_dump($result); 

?>