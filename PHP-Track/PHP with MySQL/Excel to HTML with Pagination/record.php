<?php
    ini_set('auto_detect_line_endings', true);

    $page = $_GET['page'];
    $file_name = $_GET['file_name'];
    $file = fopen("uploads/$file_name" , "r");
    $row = 0;
    $csv_array = array();
    $item_per_page = 50;

    while (($csv_row = fgetcsv($file)) !== FALSE) {
        $csv_array[] = $csv_row;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $file_name ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1><a href="./"><i class="fa-solid fa-house-chimney-window"></i></a> <?= $file_name ?></h1>
        <h2>Page <?= $page ?></h2>
        <table>
            <tr>
<?php
        foreach($csv_array[0] as $csvdata){
?>
                <td class="tablerow_bg_0">
                    <?= $csvdata . "<br>" ?>
                </td>
<?php   }
?>
            </tr>
<?php
    for($i=($page-1)*$item_per_page; $i<$page*$item_per_page; $i++){
        $row++;
?>
            <tr>
<?php   if(!empty($csv_array[$i+1])){
        foreach($csv_array[$i+1] as $csvdata){
            
?>
                <td class="tablerow_bg_<?= $row % 2 ?>">
                    <?= $csvdata . "<br>" ?>
                </td>
<?php       
        }}
?>
            </tr>
<?php }
?>
        </table>
        <div class="pagination">
<?php
    for($i=0; $i<(count($csv_array)/$item_per_page); $i++){
?>
            <a href="./record.php?file_name=<?= $file_name ?>&page=<?= $i+1 ?>"><?= $i+1 ?></a>
<?php }
?>
        </div>
    </body>
</html>

<?php fclose($file); ?>



