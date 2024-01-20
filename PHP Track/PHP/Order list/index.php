<?php

$array = array('Spaghetti', 'Pizza', 'Iced tea');

function print_orders($array){
    echo '<ol>';
    
    foreach($array as $arr){
        echo "<li>$arr</li>";
    }

    echo '</ol>';
}

print_orders($array);

?>