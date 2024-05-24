<?php
    
    $variable1 = 123;

    $a = 10;
    function newFunction()
    {
        global $variable1;

        // echo $a;  This line will give me error because the variable value a is not accessible inside the function. Its not scoped inside the function.
 
        $variable1 = 0;  // global variable is changed.
        echo "variable1 is " . $variable1; 
    }

    echo "variable1 : ". $variable1;
    echo "<br>";
    echo "variable1 : ". $variable1;
    echo "<br>";
    newFunction();
    echo "<br>";
    echo $GLOBALS['variable1'];
    ?>
