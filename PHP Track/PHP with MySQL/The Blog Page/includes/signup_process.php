<?php
    require_once 'connection.php';
    session_start();

    //User Inputs
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $confirmpwd = $_POST['confirmpwd'];
    //Error Handler Variable
    $errors = array();

    //ERROR HANDLERS
    function does_string_contain_numbers($string){
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
    if(empty($first_name) || empty($last_name) || empty($email) || empty($pwd) || empty($confirmpwd)){
        $errors[] = 'Please fill in all fields.';
    }else{
        //Check if first name has numbers
        if(does_string_contain_numbers($first_name)){
            $errors[] = 'First Name must only contain letters';
        }

        //Check if last name has numbers
        if(does_string_contain_numbers($last_name)){
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

        //check if email is invalid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Email is invalid';
        }

        //Check if Email is registered
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $connection->query($sql);
        
        if(mysqli_num_rows($result) > 0){
            $errors[] = 'Email is already registered';
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

        $sql = "INSERT INTO users(first_name, last_name, email, pwd) values('$first_name', '$last_name', '$email' , '$pwd')";
        $connection->query($sql);

        $sql = "SELECT id FROM users WHERE email = '$email'";
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