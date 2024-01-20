<?php
    $cards['King'] = 13;
    $cards['Queen'] = 12;
    $cards['Jack'] = 11;
    $cards['Ace'] = 1;

    echo 'List of keys in the array:
        <ul>';

    foreach($cards as $key => $value){
        echo "<li>$key</li>";
    }

    echo '</ul>';

    foreach($cards as $key => $value){
        echo "The value of $key in Pyramid Solitaire is $value. <br>";
    }
?>