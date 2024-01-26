<?php
    require_once 'new-connection.php';
    $id = $_POST['id'];
    $file = $_POST['file'];

    $sql = "DELETE FROM library WHERE id='$id'";
    run_mysql_query($sql);

    unlink("../uploads/$file");

    header('Location: ../library.php');
    die();
?>