<?php
    require_once 'new-connection.php';
    session_start();

    //User Inputs
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    //Error Handler Variable
    $errors = array();

    //ERROR HANDLERS
    //Check if fields are empty
    if(empty($email) || empty($pwd)){
        $errors[] = 'Please fill in all fields.';
    }else{
        //Check if email is registered
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $row = fetch_record($sql);
        
        if(count($row) < 1){
            $errors[] = 'Email is not yet registered';
        }else{
            if($row['pwd'] !== md5($pwd)){
                $errors[] = 'Password does not match';
            }
        }
    }

    //CHECK IF NO ERRORS
    if(!$errors){
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $row = fetch_record($sql);

        $_SESSION['id'] = $row['id'];

        header('Location: ../');
        die();
    }

    $_SESSION['errors'] = $errors;
    header('Location: ../login.php');
    die();
?>