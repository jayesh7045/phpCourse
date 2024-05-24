<?php 
    echo "Welcome to the database connection model";
    $servername = "localhost";
    $password = "";
    $username = "root";

    // create a connection to database

    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        echo "Unsuccessfull";
        die("sorry we failed to connect, access denied for user");
    }
    echo "<br>Connection was successful";

?>