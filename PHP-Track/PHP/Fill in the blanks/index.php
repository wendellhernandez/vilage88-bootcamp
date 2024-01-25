<?php
    $list = array(4, "Michael", 3, "Karen", 2, "Rogie");

    function convert_to_blanks($array){
        for($i=0; $i<count($array); $i++){
            if(is_numeric($array[$i])){
                for($j=0; $j<$array[$i]; $j++){
                    echo '_ ';
                }
            }else{
                echo substr($array[$i], 0, 1);

                for($j=1; $j<strlen($array[$i]); $j++){
                    echo '_ ';
                }
            }
            echo '<br>';
        }
    }

    convert_to_blanks($list);
?>