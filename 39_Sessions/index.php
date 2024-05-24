<?php
    // What is a session ? 
    // Data like username, password is stored in the session data and is used when the user arrives to our website again
    // used to manage the info across pages

    // verify the user login
    session_start();
    $_SESSION['username'] = "Harry";
    $_SESSION['favcat'] = 'Books hai bhaiya';
    echo "We have saved your session";

    // Go to getSession.php file 
    
?>