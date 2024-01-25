<?php
    $title = 'B,I,N,G,O';
    $title_explode = explode(',' , $title);

    echo '<table>
            <tr>';

    foreach($title_explode as $title){
        echo "<th>$title</th>";
    }

    echo '  </tr>';

    for($i=2; $i<=6; $i++){
        if($i%2 === 0){
            echo '  <tr style="color: blue;">';
        }else{
            echo '  <tr style="color: red;">';
        }
        for($j=1; $j<=5; $j++){
            $product = $i * $j;
            echo "<td>$product</td>";
        }
        echo '  </tr>';
    }

    echo '</table>';
?>