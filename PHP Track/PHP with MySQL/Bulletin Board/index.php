<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin Board</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <p>Bulletin Board Entry</p>
        
<?php
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $err){ ?>
        <div><?= $err ?></div>
<?php   }
        unset($_SESSION['errors']);
    }
?>
        
        <form action="includes/process.php" method="post" enctype="multipart/form-data" class="bulletin_form">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" placeholder="Enter Subject">

            <label for="details">Details</label>
            <textarea name="details" id="details" cols="30" rows="10" placeholder="Enter Details"></textarea>

            <input type="submit" value="ADD">
            <a href="main.php">SKIP</a>
        </form>
    </main>
</body>
</html>