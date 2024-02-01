<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Authentication II</title>
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <main>
            <div>
                <p>Sign Up</p>
<?php
    if(!empty($errors)){
?>
                <?= $errors ?>
<?php
    }
?>
                <form action="/users/create" method="post">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" value="<?= !empty($first_name) ? $first_name : ""; ?>">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" value="<?= !empty($last_name) ? $last_name : ""; ?>">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" name="contact_number" id="contact_number" value="<?= !empty($contact_number) ? $contact_number : ""; ?>">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <label for="repeat_password">Repeat Password:</label>
                    <input type="password" name="repeat_password" id="repeat_password">
                    <input type="submit" value="Register">
                </form>
            </div>

            <div class="login_form">
                <p>Log In</p>
<?php
    if(!empty($login_errors)){
?>
                <?= $login_errors ?>
<?php
    }
?>
                <form action="/users/login" method="post">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" name="contact_number" id="contact_number">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Log In" class="login_submit">
                </form>
            </div>
        </main>
    </body>
</html>