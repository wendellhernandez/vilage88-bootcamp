<?php
    session_start();
    date_default_timezone_set('Asia/Manila');

    //User Inputs
    $date_today = $_POST['date_today'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $issue_title = $_POST['issue_title'];
    $issue_details = $_POST['issue_details'];
    $screenshot = $_FILES['screenshot'];

    //Dates
    $current_date = date("d/m/Y");
    $date_explode = explode('/', $date_today);
    
    //Error Handler
    $errors = array();

    function does_string_container_numbers($string){
        $string_explode = str_split($string);

        foreach($string_explode as $letter){
            for($i=0; $i<10; $i++){
                if($letter == $i){
                    return true;
                }
            }
        }

        return false;
    }

    //ERROR HANDLERS

    //Check if fields are empty
    if(empty($date_today) || empty($first_name) || empty($last_name) || empty($email) || empty($issue_title) || empty($issue_details)){
        $errors[] = 'Please fill in all fields. Fields with * are required';
    }else{
        //Check if date is invalid
        //checkdate(month, day, year)
        if(!checkdate($date_explode[1], $date_explode[0], $date_explode[2])){
            $errors[] = 'Invalid Date Format';
        }else{
            //Check if date is not present date
            if($date_today !== $current_date){
                $errors[] = 'Date is not today';
            }
        }

        //Check if this has numbers
        if(does_string_container_numbers($first_name)){
            $errors[] = 'First Name cannot contain numbers';
        }

        //Check if this has numbers
        if(does_string_container_numbers($last_name)){
            $errors[] = 'Last Name cannot contain numbers';
        }

        //validate email
        if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Invalid Email';
        }

        //check length
        if(strlen(strlen($issue_title) > 50)){
            $errors[] = 'Issue title cannot contain more than 50 characters';
        }

        //check length
        if(strlen(strlen($issue_details) > 250)){
            $errors[] = 'Issue details cannot contain more than 250 characters';
        }

        //check if user uploaded a screenshot
        if(empty($screenshot['name']) || $screenshot['error'] !== 0){
            $errors[] = 'Screenshot not uploaded';
        }
    }

    //CHECK IF NO ERRORS
    if(!$errors){
        $errors[] = 'Thank you for your patience! Please wait for a response from our IT team.';

        //upload image to local folder
        $file_ext_temp = explode('.', $screenshot['name']);
        $file_ext = strtolower(end($file_ext_temp));
        $file_name_new = $file_ext_temp[0] . uniqid('' , true) . '.' . $file_ext;
        $file_destination = 'uploads/' . $file_name_new;
        move_uploaded_file($screenshot['tmp_name'] , $file_destination);
    }

    $_SESSION['errors'] = $errors;
    header('Location: index.php');
    die();
?>