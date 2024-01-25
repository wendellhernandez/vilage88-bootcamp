<?php
    session_start();
    $seven_rand_numbers = rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
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
        <h1>Thank you <span><?= $_SESSION['name'] ?></span>!</h1>
        <p>
            We're giving away free coupons as a token of our appreciation
<?php if($_SESSION['coupon_left'] > 0){ ?>
            for the first <span><?= $_SESSION['coupon_left'] ?></span> customer(s)
        </p>
        <div class="discount_container">
            <p><?= rand(50,80) ?>% Discount</p>
            <div><?= $seven_rand_numbers ?></div>
<?php }else{ ?>
        </p>
        <div class="discount_container">
            <p>Sorry!</p>
            <div>Unavailable</div>
<?php } ?>
            <form action="claim.inc.php" method="post">
                <input type="submit" name="reset_button" value="Reset Count" id="reset_button">
                <input type="submit" name="claim_button" value="Claim Again"  id="claim_button">
            </form>
        </div>
    </main>
</body>
</html>