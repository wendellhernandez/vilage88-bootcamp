<?php
    require_once 'connection.php';
    session_start();

    //User Inputs
    $user_id = $_SESSION['id'];
    $content = $_POST['content'];

    $sql = "INSERT INTO reviews(user_id, content) values('$user_id', '$content')";
    $connection->query($sql);

    header('Location: ../');
    die();
?>