<?php
    echo "You have been logged out";
    
    session_start();
    session_unset();
    session_destroy();

?>