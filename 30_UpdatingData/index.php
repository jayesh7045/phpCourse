<?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // Removed the space to make it an empty string
    $dbname = "jayesh";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($conn) {
        echo "The database connected successfully !!!";
    } else {
        die("Error in connecting to database: " . mysqli_connect_error());
    }


?>

<?php
    $sql = "update jay1 set name = 'pello' where name = 'jello'";
    $result = mysqli_query($conn, $sql);
    echo "<br>";
    echo var_dump($result); // will print true or false;
    $affected_rows = mysqli_affected_rows($conn);
    echo "<br>";
    echo "Total affected rows are";
    echo "<br>";
    echo $affected_rows;
?>