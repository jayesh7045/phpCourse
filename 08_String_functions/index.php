<!-- String in php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php $stringvar = "Crack the company and get the package of 12 LPA <br>";
    echo "This is the first function";
    echo "<br>";
    echo "The length of " . "my string is " . strlen($stringvar);
    echo "<br>";
    echo "The total no of word count is " . str_word_count($stringvar);
    echo "<br>";
    echo strrev($stringvar);
    echo "<br>";
    echo "The 'get' is at the position of ";
    echo strpos($stringvar, "get");
    echo "<br>";
    echo str_replace("12 LPA", "20 LPA", $stringvar);
    echo "<br>";
    echo $stringvar;
    echo "<br>";
    echo str_repeat($stringvar, 10);
    echo "<br>";
    ?>

</body>

</html>