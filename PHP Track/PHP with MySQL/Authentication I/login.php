<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login now to start shopping! | Authentication 1</title>
        <link rel="shortcut icon" href="assets/logo/logo_image.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php"><img src="assets/logo.png" alt="social">
                </a>
            </nav>
        </header>

        <div class="signup_section">
            <main>
                <div class="signup_form_container">
                    <p>Log In</p>
<?php
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $err){
?>
                    <p class="error"><?= $err ?></p>
<?php  }
        unset($_SESSION['errors']);
    }
?>
                    <form action="includes/login_process.php" method="post">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number">
                        <label for="pwd">Password</label>
                        <input type="password" name="pwd" id="pwd">
                        <input type="submit" value="LOG IN">
                    </form>
                    <div class="form_inquiry">New to Social? <a href="signup.php">Sign Up</a></div>
                </div>
            </main>
        </div>

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

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>