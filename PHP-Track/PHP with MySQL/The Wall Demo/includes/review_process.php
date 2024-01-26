<?php
    require_once 'new-connection.php';
    session_start();

    //User Inputs
    $user_id = $_SESSION['id'];
    $content = $_POST['content'];
    $content = escape_this_string($content);

    $sql = "INSERT INTO reviews(user_id, content) VALUES('$user_id', '$content')";
    
    run_mysql_query($sql);

    header('Location: ../');
    die();
?>