<?php
    require_once 'new-connection.php';
    session_start();

    //User Inputs
    $uploader = $_POST['uploader'];
    $file = $_FILES['file'];
    $file_name = $file['name'];
    
    //Error Handler
    $errors = array();

    //ERROR HANDLERS
    //Check if fields are empty
    if(empty($file_name)){
        $errors[] = 'Please choose a file.';
    }else{
        //if uploader is empty. default to anonymous
        if(empty($uploader)){
            $uploader = 'Anonymous';
        }

        // check if user uploaded a file
        if($file['error'] !== 0){
            $errors[] = 'File upload error';
        }
    }

    //CHECK IF NO ERRORS
    if(!$errors){
        //upload file to local folder
        $sql = "INSERT INTO library(uploader, file) VALUES('$uploader', '$file_name')";

        run_mysql_query($sql);

        $sql = "SELECT file FROM library ORDER BY id DESC LIMIT 1";
        $result = fetch_record($sql);
        $_SESSION['latest_file'] = $result['file'];

        //upload image to local folder
        $file_destination = '../uploads/' . $file_name;
        move_uploaded_file($file['tmp_name'] , $file_destination);

        header('Location: ../library.php');
        die();
    }

    $_SESSION['errors'] = $errors;
    header('Location: ../');
    die();
?>