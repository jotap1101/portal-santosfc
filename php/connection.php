<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'santosfc_db');

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($conn, 'utf8');

    if(!mysqli_connect_error()){
        // echo "Connected successfully";
    } else {
        echo "Connection failed!" . "<br>" . mysqli_connect_error();
    }
?>