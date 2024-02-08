<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajax Ordertaker 1</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="/assets/js/script.js"></script>
    </head>
    <body>
        <h1>Order Queue:</h1>
<?php
    for($i=1; $i<=count($orders); $i++){
?>
        <div class="order_container">
        <div class="order_number"><?= $i ?></div>
        <p><?= $orders[$i-1]["order"] ?></p>
        </div>
<?php
    }
?>
        <form action="/orders/create" method="post">
            <input type="text" name="order" placeholder="Type customer's order here">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>