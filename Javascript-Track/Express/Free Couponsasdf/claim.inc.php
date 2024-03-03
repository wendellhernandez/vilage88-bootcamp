<?php
    session_start();

    if(isset($_POST['submit_button'])){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['coupon_left']--;

        header('Location: result.php');
        die();
    }

    if(isset($_POST['reset_button'])){
        $_SESSION['coupon_left'] = 10;

        header('Location: index.php');
        die();
    }

    if(isset($_POST['claim_button'])){
        if($_SESSION['coupon_left'] < 1){
            header('Location: index.php');
            die();
        }

        $_SESSION['coupon_left']--;
        header('Location: result.php');
        die();
    }

    header('Location: index.php');
    die();
?>