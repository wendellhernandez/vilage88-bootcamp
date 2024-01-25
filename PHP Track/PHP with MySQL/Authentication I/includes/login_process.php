<?php
    require_once 'connection.php';
    session_start();

    //User Inputs
    $phone_number = $_POST['phone_number'];
    $pwd = $_POST['pwd'];
    //Error Handler Variable
    $errors = array();

    //ERROR HANDLERS
    //Check if fields are empty
    if(empty($phone_number) || empty($pwd)){
        $errors[] = 'Please fill in all fields.';
    }else{
        //Check if phone number is registered
        $sql = "SELECT * FROM users WHERE phone_number = '$phone_number'";
        $result = $connection->query($sql);
        $row = mysqli_fetch_assoc($result);
        
        if(mysqli_num_rows($result) < 1){
            $errors[] = 'Phone number is not yet registered';
        }else{
            if($row['pwd'] !== md5($pwd)){
                $errors[] = 'Password does not match';
            }
        }
    }

    //CHECK IF NO ERRORS
    if(!$errors){
        $sql = "SELECT id FROM users WHERE phone_number = '$phone_number'";
        $result = $connection->query($sql);
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $row['id'];

        header('Location: ../');
        die();
    }

    $_SESSION['errors'] = $errors;
    header('Location: ../login.php');
    die();
?>