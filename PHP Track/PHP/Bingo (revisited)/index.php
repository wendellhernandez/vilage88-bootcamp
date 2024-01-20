<?php
    $size = 5;
?>

<style>
    .color_1{
        background-color: red;
        color: yellow;
    }

    .color_2{
        background-color: yellow;
        color: red;
    }

    td{
        width: 30px;
        height: 30px;
        text-align: center;
    }
</style>

<h1>BINGO</h1>
<table>
<?php
    for($i=0; $i<$size; $i++){
?>
    <tr>
<?php
        for($j=0; $j<$size; $j++){
?>
        <td class="color_<?= ($i+$j)%2 + 1 ?>"><?= ($i+2) * ($j+1) ?></td>
<?php
        }
?>
    </tr>
<?php
    }
?>
</table>