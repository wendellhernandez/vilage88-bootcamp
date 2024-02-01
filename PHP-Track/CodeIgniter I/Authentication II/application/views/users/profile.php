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
        <header>
            <a href="/users/logout">Logout</a>
        </header>

        <div class="profile_container">
            <h1>Basic Information</h1>
            <p><span>First Name:</span><?= $first_name ?></p>
            <p><span>Last Name:</span><?= $last_name ?></p>
            <p><span>Contact Number:</span><?= $contact_number ?></p>
            <p><span>Last Failed Login:</span><?= empty($last_failed_login) ? "No Failed Login" : $last_failed_login ?></p>
        </div>
    </body>
</html>