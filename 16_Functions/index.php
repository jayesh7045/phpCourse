<?php

    echo "Function tutorials";
    function myfunction()
    {
        echo "This is my function";
    }
    function iterate($arr)
    {
        $i = 0;
        for(; $i < count($arr); $i++)
        {
            echo $arr[$i];
        }
    }
    $arr = array(1, 5, 3, 6);
    myfunction();
    iterate($arr);
?>