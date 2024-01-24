<?php
    $titles = array();
    $links = array();
    $result_counter = 5; //9 is the max

    if(!empty($_POST['search'])){
        $search = $_POST['search'];
        $search = str_replace(' ', '+', $search);
    }else{
        $search = 'software+engineer';
    }

    $page_contents = file_get_contents('https://www.bing.com/search?q=' . $search);

    //extract all results
    $all_results = explode('<ol id="b_results" class="">' , $page_contents); //get 1 array before <ol> 1 array after <ol>
    $all_results = explode('</ol>' , $all_results[1]); //get everything inside ol

    //$all_results[0] is everything inside ol
    //each result
    $result = explode('<li class="b_algo' , $all_results[0]); // separate li into arrays
    array_shift($result); //remove unwanted array
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Spider Bot</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <form action="index.php" method="post">
                <label>
                    Bing Bong search: 
                    <input type="text" name="search">
                </label>
                <input type="submit" value="bing bong">
            </form>

<?php
    for($i=0; $i<$result_counter; $i++){ 
        $results = explode('<cite>' , $result[$i]);
        array_shift($results);
        $results = explode('</cite>' , $results[0]);
        $links[] = $results[0];
        $title = explode('</a></h2>' , $results[1]);
        $titles[] = $title[0];
?>
            <p class="result_title">Result: <?= $i+1 ?></p>
            <p><?= $links[$i] ?></p>
            <h2><?= $titles[$i] ?></h2>
<?php } ?>
        </main>
    </body>
</html>


