<?php
    header('Content-type: text/css');
    $rand_p = rand(15,40);
    $rand_em = rand(15,40);
?>

body{
    background: #333;
    color: white;
    text-align: center;
}

p{
    font-size: <?= $rand_p ?>px;
}

em{
    font-size: <?= $rand_em ?>px;
    display: block;
    margin-bottom: 20px;
}

img{
    height: 210px;
}