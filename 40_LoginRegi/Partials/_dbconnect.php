<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jayesh";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if($conn)
    {
        echo "Database connected successfully";
    }
    else
    {
        echo 'mysqli_error()';
    }
?>