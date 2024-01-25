<?php
    require_once 'new-connection.php';
    session_start();
    date_default_timezone_set('Asia/Manila');

    //User Inputs
    $subject = $_POST['subject'];
    $details = $_POST['details'];
    $current_date = date("Y-m-d h-i-sA");
    
    //Error Handler
    $errors = array();

    //ERROR HANDLERS
    //Check if fields are empty
    if(empty($subject) || empty($details)){
        $errors[] = 'Please fill in all fields.';
    }else{
        //check subject length
        if(strlen($subject) < 3 || strlen($subject) > 30){
            $errors[] = 'Subject cannot be less than 3 or greater than 30 characters';
        }

        //check details length
        if(strlen($details) < 20 || strlen($details) > 250){
            $errors[] = 'Details cannot be less than 20 or greater than 250 characters';
        }
    }

    //CHECK IF NO ERRORS
    if(!$errors){
        $subject = escape_this_string($subject);
        $details = escape_this_string($details);
        $sql = "INSERT INTO announcements(subject, details) VALUES('$subject', '$details')";

        run_mysql_query($sql);

        header('Location: ../main.php');
        die();
    }

    $_SESSION['errors'] = $errors;
    header('Location: ../index.php');
    die();
?>