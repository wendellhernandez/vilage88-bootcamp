<?php
    require_once 'new-connection.php';
    session_start();

    //User Inputs
    $review_id = $_POST['review_id'];
    $user_id = $_SESSION['id'];
    $content = $_POST['content'];
    $content = escape_this_string($content);

    $sql = "INSERT INTO replies(review_id, user_id, content) VALUES('$review_id', '{$_SESSION['id']}', '$content')";
    
    run_mysql_query($sql);

    header('Location: ../');
    die();
?>