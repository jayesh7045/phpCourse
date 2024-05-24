<?php
    echo "Hi there";
    $fptr = fopen('../34_Files/file.txt', 'r'); // Here the fptr is a file pointer
    echo "<br>";
    echo "$fptr";
    echo "<br>";
    echo var_dump($fptr); //This will return true if the name of the file is correct/exists else returns false;
    $content = fread($fptr, filesize("../34_Files/file.txt"));
    echo "<br>";
    echo $content;
    fclose($fptr);
?>