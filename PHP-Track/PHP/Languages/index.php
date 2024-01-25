<?php
    $languages = array('PHP', 'JS', 'Ruby');

    echo '<select name="language">';
    for($i=0; $i<count($languages); $i++){
        echo "<option value='$languages[$i]'>$languages[$i]</option>";
    }
    echo '</select>';

    echo '<select name="language">';
    foreach($languages as $lang){
        echo "<option value='$lang'>$lang</option>";
    }
    echo '</select>';

    array_push($languages , 'HTML', 'CSS');

    echo '<select name="language">';
    foreach($languages as $lang){
        echo "<option value='$lang'>$lang</option>";
    }
    echo '</select>';
?>

    
