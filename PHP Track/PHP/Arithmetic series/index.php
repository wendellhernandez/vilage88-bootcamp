<?php
    $numbers = array(2, 5, 8, 11, 14);
    $sum = 0;

    foreach($numbers as $num){
        echo $num . ' ';
        $sum += $num;
    }

    echo 'The sum is: ' . $sum;
?>