<?php
    require_once 'includes/new-connection.php';
    session_start();

    $sql = "SELECT id, subject, details, date_format(created_at, '%m/%d/%Y %h:%i%p') AS date_created FROM announcements ORDER BY created_at DESC";

    $result = fetch_all($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin Board View</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="index.php"><i class="fa-solid fa-house-chimney-window"></i></a> 
        Bulletin Board View Announcements
    </header>
    <main class="view_announcements">
<?php
    foreach($result as $row){ 
?>
        <p><?= $row['date_created'] ?> - <?= $row['subject'] ?></p>
        <form action="includes/delete.php" method="post" class="table_delete">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
        </form>
        <div><?= $row['details'] ?></div>
<?php }
?>
    </main>
</body>
</html>