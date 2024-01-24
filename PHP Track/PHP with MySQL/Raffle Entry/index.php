<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raffle Entry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <p>Lucky Draw Raffle Entry</p>
        
<?php
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $err){ ?>
        <div><?= $err ?></div>
<?php   }
        unset($_SESSION['errors']);
    }
?>
        
        <form action="includes/submit.php" method="post" enctype="multipart/form-data" class="raffle_form">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" placeholder="ex: 09555723409">

            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" placeholder="Enter your first name">

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" placeholder="Enter your last name">

            <label for="profile_image">Profile Image</label>
            <input type="file" name="profile_image">

            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>