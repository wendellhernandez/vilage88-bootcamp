<?php
    session_start();
    date_default_timezone_set('Asia/Manila');

    function is_reset(){
        if(isset($_POST['reset_button'])){
            $_SESSION['money'] = 500;
            unset($_SESSION['game_data']);
    
            header('Location: index.php');
            die();
        }
    }

    function reward_money(){
        $reward = $_POST['reward'];
        $penalty = $_POST['penalty'];
        $risk_type = $_POST['risk_type'];

        if(rand(1,100) > 50){
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
    }

    is_reset();
    reward_money();

    header('Location: index.php');
    die();
?>