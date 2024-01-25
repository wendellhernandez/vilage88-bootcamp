<?php
    $numbers = array(13, 143, 88, 65, 120);
    $sum = 0;

    foreach($numbers as $num){
        $sum += $num;
    }

    echo 'The mean is: ' . $sum/count($numbers);
?>