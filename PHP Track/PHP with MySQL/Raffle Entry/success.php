<?php
    require_once 'includes/connection.php';
    session_start();

    $sql = "SELECT id, contact_number, concat(first_name, ' ', last_name) AS full_name, date_format(created_at, '%Y-%m-%d %h:%i:%s%p') AS date_created FROM users ORDER BY id DESC";

    $result = $connection->query($sql);

    $message = 'Here is the list of contestants.';

    if(isset($_SESSION['latest_contact'])){
        $message = "Success! {$_SESSION['latest_contact']} is now added to the raffle draw. ";

        unset($_SESSION['latest_contact']);
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
        <a href="index.php"><i class="fa-solid fa-house-chimney-window"></i></a> 
        <?= $message ?>
    </header>
    <main class="entry_container">
        <p class="table_head">Contact Number</p>
        <p class="table_head">Full Name</p>
        <p class="table_head">Date Inserted</p>
        <p class="table_head table_delete">Action</p>

<?php
    while($row = mysqli_fetch_assoc($result)){ ?>
        <p><?= $row['contact_number'] ?></p>
        <p><?= $row['full_name'] ?></p>
        <p><?= $row['date_created'] ?></p>
        <form action="includes/delete.php" method="post" class="table_delete">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
        </form>
<?php }
?>
        
    </main>
</body>
</html>