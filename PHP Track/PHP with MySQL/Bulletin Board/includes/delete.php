<?php
    require_once 'new_connection.php';
    $id = $_POST['id'];

    $sql = "DELETE FROM announcements WHERE id='$id'";
    $connection->query($sql);

    header('Location: ../main.php');
    die();
?>