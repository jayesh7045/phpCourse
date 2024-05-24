<?php
    
    $servername = "localhost";
    $dbname = "jayesh";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $name  = "MysqlSecret";
    $id = 100;
    $sql = "insert into jay1 values($id, '$name')";
    if($conn)
    {
        echo "Database connected successfully";
        echo "<br>";
    }
    else{
        die("Failed Connection to DB !!!!!");
    }
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "Data inserted into the Database";
        echo "<br>";
    }
    else{
        echo "Data insertion Failed to DB";
    }


?>