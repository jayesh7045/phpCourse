<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require "Partials/_nav.php" ?>
    <?php
    session_start();
    if (!isset($_SESSION['loggedin']) and $_SESSION['loggedin'] != true) {
        header('location:Login.php');
        exit;
    } else {
        echo 'Welcome ' . $_SESSION["username"] . '';
    }

    ?>

</body>

</html>