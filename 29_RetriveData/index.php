<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $dbname = "jayesh";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn) {
        echo "Connected Successfully";
        echo "<br>";
    } else {
        echo "Unsuccessfull connection to DB !!";
    }
    $sql = 'select * from jay1';
    $result = mysqli_query($conn, $sql);
    $total_no_of_rows = mysqli_num_rows($result);

    echo "<br>";
    echo "The total not of rows in jay1 table is ";
    echo "<br>";
    echo $total_no_of_rows;
    echo "<br>";


    // while($total_no_of_rows > 0)
    // {
    //     $row = mysqli_fetch_assoc($result);
    //     echo "<br>";
    //     echo var_dump($row);
    //     echo "<br>";
    //     echo " ".$row["id"]." ".$row["name"];
    //     echo "<br>";
    //     $total_no_of_rows-=1;
    // }
    

    // $total_no_of_rows = mysqli_num_rows($result);
    // while($total_no_of_rows > 0)
    // {
    //     $row = mysqli_fetch_array($result);
    //     echo "<br>";
    //     echo $row;
    //     echo "<br>";
    //     echo " ".$row["id"]." ".$row["name"];
    //     echo "<br>";
    //     $total_no_of_rows-=1;
    // }
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>";
        echo " " . $row["id"] . " " . $row["name"];
        echo "<br>";
    }
    ?>
</body>

</html>