<style>
    .bg_1{
        background-color: #444;
    }
</style>

<table>

<?php
    ini_set('auto_detect_line_endings', true);

    $file = fopen('data.csv' , 'r');
    $row = 0;

    while (($csv = fgetcsv($file)) !== FALSE) {
        $row++;
?>

    <tr>

<?php
        foreach($csv as $csvdata){
?>

            <td class="bg_<?= $row % 10 ?>"><?= $csvdata . "<br>" ?></td>

<?php
        }
?>

    </tr>

<?php
    }
?>

</table>

<?php fclose($file); ?>