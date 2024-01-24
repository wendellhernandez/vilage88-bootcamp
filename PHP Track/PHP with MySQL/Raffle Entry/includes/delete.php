<?php
    require_once 'connection.php';
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id='$id'";
    $connection->query($sql);

    header('Location: ../success.php');
    die();
?>