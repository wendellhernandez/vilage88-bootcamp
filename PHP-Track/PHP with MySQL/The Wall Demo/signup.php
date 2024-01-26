<?php
    session_start();

    if(isset($_SESSION['id'])){
        header('Location: ./');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Today! | The Wall Demo</title>
        <link rel="shortcut icon" href="assets/logo/logo_image.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php"><img src="assets/logo.png" alt="social"></a>
            </nav>
        </header>

        <main>
            <div class="signup_form_container">
                <p>Sign Up</p>
<?php
    if(isset($_SESSION['errors'])){
       foreach($_SESSION['errors'] as $err){
?>
                <p class="error"><?= $err ?></p>
<?php  }
        unset($_SESSION['errors']);
    }
?>
                <form action="includes/signup_process.php" method="post">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email">
                    <label for="pwd">Password</label>
                    <input type="password" name="pwd" id="pwd">
                    <label for="confirmpwd">Confirm Password</label>
                    <input type="password" name="confirmpwd" id="confirmpwd">
                    <input type="submit" value="SIGN UP">
                </form>
                <div class="form_inquiry">Have an account? <a href="login.php">Log In</a></div>
            </div>
        </main>

        <footer>
            <span>&copy; 2024 Wendell Hernandez. All Rights Reserved</span>
            <ul>
                <li>Country &amp; Region: </li>
                <li><a href="">Philippines</a></li>
                <li><a href="">Singapore</a></li>
                <li><a href="">Indonesia</a></li>
                <li><a href="">Thailand</a></li>
                <li><a href="">Malaysia</a></li>
            </ul>
        </footer>
    </body>
</html>