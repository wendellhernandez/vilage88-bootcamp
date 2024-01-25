<?php
    require_once 'includes/new-connection.php';
    session_start();

    if(isset($_SESSION['id'])){
        $sql = "SELECT *, date_format(created_at, '%m/%d/%Y %h:%i:%s%p') AS date_created FROM users WHERE id = '{$_SESSION['id']}'";

        $row = fetch_record($sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Account | Authentication 1</title>
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
                <ul class="login_signup">
<?php
    if(isset($_SESSION['id'])){
?>
                    <li><a href="includes/logout_process.php">Logout</a></li>
<?php }else{
?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
<?php }
?>
                    
                </ul>
                <div>
                    <a href="index.php"><img src="assets/logo.png" alt="social"></a>
                    <form action="#" method="get">
                        <input type="text" name="search" placeholder="Search for messages">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <a href="#"><i class="fa-solid fa-envelope"></i><span>2</span></a>
                </div>
            </nav>
        </header>

        <main class="account_container">
            <img src="assets/logo.png">
<?php
    if(isset($_SESSION['id'])){
?>
            <span id="fullname"><?= $row['first_name'] . ' ' . $row['last_name'] ?></span>
            <a href="reset_password.php"><i class="fa-solid fa-pen-to-square"></i> Reset Password</a>

            <p>Registration Date: </p>
            <span><?= $row['date_created'] ?></span>
<?php }
?>
            
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