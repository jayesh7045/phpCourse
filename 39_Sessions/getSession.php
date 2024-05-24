<?php
session_start();
echo "Hello there welcome to my website";
echo "<br>";
if (isset($_SESSION['username'])) {
    echo "Your username is " . $_SESSION['username'];
} else {
    echo "Please login to continue";
}
echo '<br>';
if (isset($_SESSION['favcat'])) {
    echo 'fav cat is ' . $_SESSION['favcat'];
}

// After this go to the logout.php file
?>