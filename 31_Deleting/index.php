<?php

$servername = "localhost";
$dbname = "jayesh";
$password = ""; // Assuming the password is empty
$username = "root";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
    echo "Connected";
}
$sql = "delete from  where name = 'pello";

$result = mysqli_query($conn, $sql);
if ($result) {
    $affected_rows = mysqli_affected_rows($conn);
    echo "<br>";
    echo "affected rows are ";
    echo "<br>";
    echo $affected_rows;
    echo "<br>";
}
else
{
    $err = mysqli_error($conn);
    echo "Error while deletion";
}


?>