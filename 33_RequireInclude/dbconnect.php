<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jayesh";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if($conn)
    {
        echo "connection is successfull".var_dump($conn);
        echo "<br>";
    }
?>