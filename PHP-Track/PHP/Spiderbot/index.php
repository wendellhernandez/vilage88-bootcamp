<?php
    require("simple_html_dom.php");

    if(!empty($_GET['search'])){
        $search = $_GET['search'];
        $search = str_replace(' ', '+', $search);
    }else{
        $search = 'software+engineer';
    }

    $html = file_get_html("https://www.bing.com/search?q=$search");

    $links = array();
    $titles = array();

    foreach($html->find('a') as $element){
        if(substr($element->href, 0, 5) == 'https'){
            $links[] = $element->href;
        }
    }

    foreach($html->find('h2') as $element){
        $titles[] = $element;
    }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Spider Bot</title>
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <form action="index.php" method="get">
                <label>
                    Bing Bong: 
                    <input type="text" name="search">
                </label>
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

<?php
    for($i=0; $i<5; $i++){
?>
            <p class="result_title">Result: <?= $i+1 ?></p>
            <p><?= $links[$i*2] ?></p>
            <?= $titles[$i] ?>
<?php }
?>
        </main>
    </body>
</html>