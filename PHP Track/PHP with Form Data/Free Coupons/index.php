<?php
    session_start();

    if(!isset($_SESSION['coupon_left'])){
        $_SESSION['coupon_left'] = 10;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Coupons</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php">Freecoupon.org</a>
    </header>
    <main>
        <h1>Welcome <span>Customer</span>!</h1>
        <p>
            We're giving away free coupons as a token of our appreciation
<?php
    if($_SESSION['coupon_left'] > 0){ ?>
        for the first <span><?= $_SESSION['coupon_left'] ?></span> customer(s)
<?php }
?>
        </p>
        <form action="claim.inc.php" method="post">
            <label for="name">Kindly type your name:</label>
            <input type="text" name="name" id="name" placeholder="Enter your name here">
            <input type="submit" name="submit_button" value="Submit">
        </form>
    </main>
</body>
</html>