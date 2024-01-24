<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', ''); //may need to set DB_PASS as 'root'
    define('DB_DATABASE', 'bulletin_board_db'); //make sure to set your database
    //connect to database host
    
    //make sure connection is good or die
    try {
		  $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    } catch (mysqli_sql_exception $e) {
		  die('Cannot cannot to database: ' . $e->getMessage());
    }
?>