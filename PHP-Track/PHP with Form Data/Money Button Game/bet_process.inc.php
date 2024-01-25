<?php
    session_start();
    date_default_timezone_set('Asia/Manila');

    if(isset($_POST['reset_button'])){
        $_SESSION['money'] = 500;
        unset($_SESSION['game_data']);

        header('Location: ./');
        die();
    }

    $reward = rand($_POST['reward']/3, $_POST['reward']);
    $penalty = rand($_POST['penalty']/3, $_POST['penalty']);
    $risk_type = $_POST['risk_type'];
    $risk = $_POST['risk'];

    if(rand(1,100) > $risk){
        $_SESSION['money'] += $reward;
        $round_data['value'] = 'You gained ' . $reward;
        $round_data['status'] = 'win';
    }else{
        $_SESSION['money'] -= $penalty;
        $round_data['value'] = 'You lost ' . $penalty;
        $round_data['status'] = 'lose';
    }

    $round_data['risk_type'] = $risk_type;
    $round_data['date'] = date("m/d/Y h:i:sa");
    $round_data['money'] = $_SESSION['money'];

    $_SESSION['game_data'][] = $round_data;

    header('Location: ./');
    die();
?>