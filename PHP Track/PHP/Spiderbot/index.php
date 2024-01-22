<style>
    *{
        margin: 0;
    }

    body{
        background-color: #333;
    }

    p{
        color: yellow;
        text-decoration: underline;
        font-size: 1rem;
        cursor: pointer;
        margin-top: 40px;
    }

    h2 a{
        color: white;
        font-size: 2rem;
        text-decoration: none;
        cursor: default;
    }
</style>

<?php
    $titles = array();
    $links = array();
    $result_counter = 5; //9 is the max
    $search = 'software+engineer';

    $page_contents = file_get_contents('https://www.bing.com/search?q=' . $search);

    //extract all results
    $all_results = explode('<ol id="b_results" class="">' , $page_contents); //get 1 array before <ol> 1 array after <ol>
    $all_results = explode('</ol>' , $all_results[1]); //get everything inside ol

    //$all_results[0] is everything inside ol
    //each result
    $result = explode('<li class="b_algo' , $all_results[0]); // separate li into arrays
    array_shift($result); //remove unwanted array

    for($i=0; $i<$result_counter; $i++){ 
        $results = explode('<cite>' , $result[$i]);
        array_shift($results);
        $results = explode('</cite>' , $results[0]);
        $links[] = $results[0];
        $title = explode('</a></h2>' , $results[1]);
        $titles[] = $title[0];
?>

<p><?= $links[$i] ?></p>
<h2><?= $titles[$i] ?></h2>

<?php
    }
?>