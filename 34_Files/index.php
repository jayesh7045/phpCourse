<?php
    $a = readfile("file.txt"); // This will read and print the data on the page
    echo $a; // This will print the number of charecters that are read by the system
    readfile("file.html");
    // We can also read the images using the readfile function but the content of the file will be some blob/random chars on the page
    
?>