
<?php
    $servername = "localhost";
    $password = "";
    $username = "root";

    $conn = mysqli_connect($servername, $username, $password);
    $query = "create database dbnew";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        echo "Wow Database created";
        echo "<br>";
    }
    if($conn)
    {
        echo "Database connection successful";
    }
    else
    {
        echo "Database was not created successfully" . mysqli_error($conn);
    }

?>