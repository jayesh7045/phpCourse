<?php 

    $arr = array(array(1, 5, "jayesh", 34), array(3, 5, 6,"jshdjsdh"));
    for($i = 0; $i < count($arr); $i++)
    {
        for($j = 0; $j < count($arr[0]); $j++)
        {   
            echo $arr[$i][$j] . " ";
        }
        echo "<br>";
    }

?>