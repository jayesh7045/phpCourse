<?php
$fptr = fopen("../34_Files/file.txt", "r");
// echo fgets($fptr);
// echo "<br>";
// echo fgets($fptr);
// echo "<br>";
// echo "Charecter by char reading of a file";
// echo fgetc($fptr);
// echo "<br>";
// echo "Reading the file line by line";
// echo "<br>";
// while ($a = fgets($fptr)) {
//     echo "<br>";
//     echo $a;
// }
// fclose($fptr);


while($a = fgetc($fptr))
{
    if($a == '.')
    {
        break;
    }
    echo '<br>';
    echo $a;
}
?>