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
            <div class="cart_title">
                <h1>Checkout</h1>
                <p>Total: <span>$<?= $total ?></span></p>
            </div>
            <div class="cart_table">
                <div>
                    <span>Product</span>
                    <span>Qty</span>
                    <span>Price</span>
                    <span>Action</span>
                </div>
<?php
    foreach($cart_products as $cart_product){
?>
                <div>
                    <span><?= $cart_product["name"] ?></span>
                    <span><?= $cart_product["quantity"] ?></span>
                    <span><?= $cart_product["price"] ?></span>
                    <?= form_open("/carts/remove/{$cart_product['product_id']}") ?>
                        <button type="submit" name="remove" value="remove"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
<?php
    }
?>
            </div>
        </main>
        <div class="billing">
            <h2>Billing Info</h2>

            <a href="https://www.positronx.io/how-to-integrate-stripe-payment-gateway-in-codeigniter/">https://www.positronx.io/how-to-integrate-stripe-payment-gateway-in-codeigniter/</a>

            <?= form_open("make-stripe-payment") ?>
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                <label for="address">Address</label>
                <input type="text" name="address" id="address">
                <input type="submit" name="billing" value="Submit Order">
            </form>
        </div>
    </body>
</html>