<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <p>Bug Ticket</p>
        
<?php
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $err){ ?>
        <div><?= $err ?></div>
<?php   }
        unset($_SESSION['errors']);
    }
?>
        
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <label for="date_today">Date Today*</label>
            <input type="text" name="date_today" id="date_today" placeholder="dd/mm/yyyy">

            <label for="first_name">First Name*</label>
            <input type="text" name="first_name" id="first_name" placeholder="Enter your first name">

            <label for="last_name">Last Name*</label>
            <input type="text" name="last_name" id="last_name" placeholder="Enter your last name">

            <label for="email">Email*</label>
            <input type="text" name="email" id="email" placeholder="johndoe@gmail.com">

            <label for="issue_title">Issue Title*</label>
            <input type="text" name="issue_title" id="issue_title" placeholder="Enter Subject">

            <label for="issue_details">Issue Details*</label>
            <textarea name="issue_details" id="issue_details"  placeholder="Enter Details"></textarea>

            <label for="screenshot">Screenshot*</label>
            <input type="file" name="screenshot">

            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>