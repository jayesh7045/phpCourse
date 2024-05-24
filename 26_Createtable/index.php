<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jayesh";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if($conn)
    {
        echo "Database connected successfully";
        echo "<br> congrats!!!";
    }
    else
    {
        die("Database connection Failed !!");
    }
    $query = "create table jay1(id int primary key, name varchar(255) not null)";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        echo "<br>";
        echo "Table is created";

    }
?>