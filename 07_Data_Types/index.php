<?php
    // Data types in php
    // String, Integer, NULL, Boolean, Float, Object, Array

    $name = "Jayesh";
    $flag = false;
    echo "My name is $name and flag is "; echo var_dump($flag);
    echo "<br>";
    echo "This is done for having a new line in the code";
    // Whenever the value of a false boolean variable is printed at that time, a empty string is printed
    // But we want that the value false must be printed then we can make the use of function var_dump($flag)
    // This function var_dump will print the datatype along with the value of the variable
    


    // Arrays in PHP
    $myarr = array("Jayesh", "Wadhwani", "Harish");
    echo "<br>";    
    echo $myarr[0];

    echo "<br>";
    echo var_dump($myarr);
?>
