<?php
    echo "Lets explore the world of cookies";
    echo "<br>";
    echo "Cookies are small text files that are stored on your computer or mobile device by a website's server and only that server can retrieve them";
    echo "<br>";
    echo "Cookies are created when a user's browser loads a particular website. When you return to this site, or visit other sites that use the cookies";
    echo "<br>";
    setcookie("Category", "Books", time()+86400, "/");
    echo "The cookie named Category is set to Books and will expire in 24 hours";

?>