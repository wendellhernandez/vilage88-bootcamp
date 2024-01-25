<?php
    require_once 'new-connection.php';
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id='$id'";
    run_mysql_query($sql);

    header('Location: ../success.php');
    die();
?>