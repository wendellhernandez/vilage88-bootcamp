<?php
    require_once 'connection.php';
    session_start();

    //User Inputs
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $pwd = $_POST['pwd'];
    $confirmpwd = $_POST['confirmpwd'];
    //Error Handler Variable
    $errors = array();

    //ERROR HANDLERS
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
    
    //Check if fields are empty
    if(empty($first_name) || empty($last_name) || empty($phone_number) || empty($pwd) || empty($confirmpwd)){
        $errors[] = 'Please fill in all fields.';
    }else{
        //Check if first name has numbers
        if(does_string_container_numbers($first_name)){
            $errors[] = 'First Name must only contain letters';
        }

        //Check if last name has numbers
        if(does_string_container_numbers($last_name)){
            $errors[] = 'Last Name must only contain letters';
        }

        //Check if first name has more than 1 characters
        if(strlen($first_name < 2)){
            $errors[] = 'First Name must be a minimun of 2 characters long';
        }

        //Check if last name has more than 1 characters
        if(strlen($last_name) < 2){
            $errors[] = 'Last Name must be a minimun of 2 characters long';
        }

        //check if Phone Number contains numbers only
        if(!is_numeric($phone_number)){
            $errors[] = 'Phone Number can only contain numbers';
        }

        //check Phone Number length
        if(strlen($phone_number) !== 11){
            $errors[] = 'Phone Number must contain 11 numbers';
        }

        //check if contact starts with 09
        $phone_number_split = str_split($phone_number);
        if($phone_number_split[0] != 0 && $phone_number_split[1] != 9){
            $errors[] = 'Phone Number invalid. Must start with 09';
        }

        //Check if phone number is registered
        $sql = "SELECT * FROM users WHERE phone_number = '$phone_number'";
        $result = $connection->query($sql);
        
        if(mysqli_num_rows($result) > 0){
            $errors[] = 'Phone number is already registered';
        }

        //check if password is at least 8 characters long
        if(strlen($pwd) < 8){
            $errors[] = 'Password must be at least 8 characters long';
        }

        //check if passwords match
        if($pwd !== $confirmpwd){
            $errors[] = 'Password does not match';
        }
    }

    //CHECK IF NO ERRORS
    if(!$errors){
        $pwd = md5($pwd);

        $sql = "INSERT INTO users(first_name, last_name, phone_number, pwd) values('$first_name', '$last_name', '$phone_number' , '$pwd')";

        $connection->query($sql);

        $sql = "SELECT id FROM users WHERE phone_number = '$phone_number'";

        $result = $connection->query($sql);
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $row['id'];

        header('Location: ../');
        die();
    }

    $_SESSION['errors'] = $errors;
    header('Location: ../signup.php');
    die();
?>