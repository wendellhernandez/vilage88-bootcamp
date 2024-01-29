<?php
    if(isset($_POST['reset_button'])){
        $_SESSION['money'] = 500;
        unset($_SESSION['game_data']);

        header('Location: ./');
        die();
    }
?>