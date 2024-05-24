<?php
    // include 'dbconnect.php';  --> This will directly include the content of the dbconnect.php file 
    // require 'dbconnect.php'   --> This will also include the content of the file

    // Whenever there is an error in the dbconnect.php then we will get error in the case of both the methods
    // whenever there is an error in the file name that we are trying to add here then in case of the include 
    // if the file name is not correct then we wont get any fatal error, only a warning, but in case of the require if the file 
    // name is not correct then we will get the fatal error


    // prefer using require method to add the external file

    require "dbconnect.php";

    $sql = "select * from todolist";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {   
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<br>';
            echo "The id is ".$row['id']." the title is ".$row['title'].'desc : '.$row['description'];
        }
    }
?>