<?php
    require_once 'includes/new-connection.php';
    session_start();

    $sql = "SELECT *, date_format(created_at, '%Y-%m-%d %h:%i:%s%p') AS date_uploaded FROM library ORDER BY id DESC";

    $files = fetch_all($sql);

    $message = 'Village88 Library.';

    if(isset($_SESSION['latest_file'])){
        $message = "Success! {$_SESSION['latest_file']} has been added to the library. ";

        unset($_SESSION['latest_file']);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Raffle Entry Data</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <a href="./"><i class="fa-solid fa-house-chimney-window"></i></a> 
            <?= $message ?>
        </header>
        <main class="entry_container">
            <p class="table_head">Uploader</p>
            <p class="table_head">File</p>
            <p class="table_head">Date Uploaded</p>
            <p class="table_head table_delete">Action</p>

<?php
        foreach($files as $file){ 
?>
            <p><?= $file['uploader'] ?></p>
            <a href="./record.php?file_name=<?= $file['file'] ?>&page=1"><?= $file['file'] ?></a>
            <p><?= $file['date_uploaded'] ?></p>
            <form action="includes/delete.php" method="post" class="table_delete">
                <input type="hidden" name="id" value="<?= $file['id'] ?>">
                <input type="hidden" name="file" value="<?= $file['file'] ?>">
                <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
            </form>
<?php   }
?>
            
        </main>
    </body>
</html>