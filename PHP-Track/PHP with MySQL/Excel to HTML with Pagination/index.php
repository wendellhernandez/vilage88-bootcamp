<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village88 Library</title>
    <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <p><a href="library.php"><i class="fa-solid fa-book"></i> </a>Village88 Library</p>
<?php
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $err){ 
?>
        <div><?= $err ?></div>
<?php   }
        unset($_SESSION['errors']);
    }
?>
        
        <form action="includes/upload_process.php" method="post" enctype="multipart/form-data" class="upload_form">
            <label for="uploader">Uploader</label>
            <input type="text" name="uploader" id="uploader" placeholder="Enter you name here">

            <label for="file">Upload Files</label>
            <input type="file" name="file">

            <input type="submit" value="Upload">
        </form>
    </main>
</body>
</html>