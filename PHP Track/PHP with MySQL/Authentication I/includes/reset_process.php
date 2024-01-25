<?php
    require_once 'connection.php';
    session_start();

    //User Inputs
    $phone_number = $_POST['phone_number'];
    //Error Handler Variable
    $errors = array();

    //ERROR HANDLERS
    //Check if fields are empty
    if(empty($phone_number)){
        $errors[] = 'Please fill in all fields.';
    }else{
        $sql = "SELECT * FROM users WHERE id = '{$_SESSION['id']}'";
        $result = $connection->query($sql);
        $row = mysqli_fetch_assoc($result);

        if($row['phone_number'] !== $phone_number){
            $errors[] = 'Wrong Phone Number';
        }
    }

    //CHECK IF NO ERRORS
    if(!$errors){
        $pwd = md5('village88');

        $sql = "UPDATE users SET pwd = '$pwd' WHERE id = '{$_SESSION['id']}'";
        $connection->query($sql);

        header('Location: logout_process.php');
        die();
    }

    $_SESSION['errors'] = $errors;
    header('Location: ../reset_password.php');
    die();
?>