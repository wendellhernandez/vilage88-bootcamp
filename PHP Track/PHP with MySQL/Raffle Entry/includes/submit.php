<?php
    require_once 'connection.php';
    session_start();
    date_default_timezone_set('Asia/Manila');

    //User Inputs
    $contact_number = $_POST['contact_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $profile_image = $_FILES['profile_image'];
    $profile_image_name = $profile_image['name'];
    $current_date = date("Y-m-d h-i-sA");
    
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
    if(empty($contact_number) || empty($first_name) || empty($last_name)){
        $errors[] = 'Please fill in all fields.';
    }else{
        //check if contact number contains numbers only
        if(!is_numeric($contact_number)){
            $errors[] = 'Contact number can only contain numbers';
        }

        //check contact number length
        if(strlen($contact_number) !== 11){
            $errors[] = 'Contact number must contain 11 numbers';
        }

        //check if contact starts with 09
        $contact_number_split = str_split($contact_number);
        if($contact_number_split[0] != 0 && $contact_number_split[1] != 9){
            $errors[] = 'Contact number must start with 09';
        }

        //Check if first name has numbers
        if(does_string_container_numbers($first_name)){
            $errors[] = 'First Name cannot contain numbers';
        }

        //Check if last name has numbers
        if(does_string_container_numbers($last_name)){
            $errors[] = 'Last Name cannot contain numbers';
        }

        // check if user uploaded a screenshot
        if(empty($profile_image_name) || $profile_image['error'] !== 0){
            $errors[] = 'Picture not uploaded';
        }
    }

    //CHECK IF NO ERRORS
    if(!$errors){
        $errors[] = 'Thank you for your patience! Please wait for a response from our IT team.';

        //upload image to local folder
        $file_ext_temp = explode('.', $profile_image_name);
        $file_ext = strtolower(end($file_ext_temp));
        $file_name_new = $file_ext_temp[0] . uniqid('' , true) . '.' . $file_ext;
        $file_destination = '../uploads/' . $file_name_new;
        move_uploaded_file($profile_image['tmp_name'] , $file_destination);

        $sql = "INSERT INTO users(contact_number, first_name, last_name, profile_image) values('$contact_number', '$first_name', '$last_name', '$file_name_new')";

        $connection->query($sql);

        $sql = "SELECT contact_number FROM users ORDER BY id DESC LIMIT 1";

        $result = $connection->query($sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['latest_contact'] = $row['contact_number'];

        header('Location: ../success.php');
        die();
    }

    $_SESSION['errors'] = $errors;
    header('Location: ../index.php');
    die();
?>