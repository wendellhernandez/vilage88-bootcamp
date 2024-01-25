<?php
    require_once 'connection.php';
    session_start();

    //User Inputs
    $review_id = $_POST['review_id'];
    $user_id = $_SESSION['id'];
    $content = $_POST['content'];

    $sql = "INSERT INTO replies(review_id, user_id, content) values('$review_id', '{$_SESSION['id']}', '$content')";
    $connection->query($sql);

    header('Location: ../');
    die();
?>