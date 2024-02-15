<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping Spree</title>
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <header>
            <a href="/"><img src="/assets/images/logo.png" alt="logo"></a>
            <a href="/carts"><i class="fa-solid fa-cart-plus"></i> <span><?= count($cart_products) ?></span></a>
        </header>
        <main>
<?php
    foreach($products as $product){
?>
            <div class="product_container">
                <img src="/assets/images/products/<?= $product["name"] ?>.jpg">
                <div class="product_title">
                    <span><?= $product["name"] ?></span>
                    <span>$<?= $product["price"] ?></span>
                </div>
                <?= form_open("/carts/add/{$product['id']}") ?>
                    <input type="number" name="quantity" value="1">
                    <input type="submit" value="Buy" name="buy">
                </form>
            </div>
<?php
    }
?>
        </main>
    </body>
</html>