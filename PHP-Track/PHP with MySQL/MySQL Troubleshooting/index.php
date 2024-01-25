<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS' , '');
    define('DBNAME' , 'sakila');

    $connection = new mysqli(HOST, USER, PASS, DBNAME);

    if($connection->connect_errno){
        die('Failed to connect to mysql: (' . $connection->connect_errno . ') ' . $connection->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Troubleshooting</title>
</head>
<body>
    
</body>
</html>