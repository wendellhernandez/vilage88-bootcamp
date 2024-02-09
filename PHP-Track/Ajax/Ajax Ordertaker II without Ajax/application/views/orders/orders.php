<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajax Ordertaker 1</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
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
            <?= form_open("/orders/update/{$orders[$i-1]["id"]}") ?>
                <textarea name="order" rows="2"><?= $orders[$i-1]["order"] ?></textarea>
                <input type="submit" value="update">
            <?= form_close() ?>
            <?= form_open("/orders/delete/{$orders[$i-1]["id"]}" , "class='form_delete'") ?>
                <button type="submit"><i class="fa-solid fa-trash"></i></button>
            <?= form_close() ?>
        </div>
<?php
    }
?>
        <?= form_open("/orders/create" , "id='form_create'") ?>
            <input type="text" name="order" placeholder="Type customer's order here">
            <input type="submit" value="Submit">
        <?= form_close() ?>
    </body>
</html>