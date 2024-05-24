<?php
    echo "Jayesh Wadhwani";
    $fptr = fopen("temp.txt", 'w');
    fwrite($fptr, "Jayesh Wadhwani");
    fclose($fptr);


    // Appending to the file
    $fptr2 = fopen("file.txt", "a");
    fwrite($fptr2,"Hard work always wins!");

    // When we perform write operation on a file
    // 1) If the file exists then the contents of the file are removed. File ptr will be moved to the start of the file.
    // 2) whatever we will write will be the new content of the file.


    // Whenever we perform the append operation on the file
    // 1) The contents of the file are not erased but the file pointer is moved to the end of the file
    // 2) Whatever we will write will be appended to the end of the file.
    
    
?>  