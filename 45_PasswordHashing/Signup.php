<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    require "./Partials/_nav.php";
    require "./Partials/_dbconnect.php";
    ?>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['username']) and isset($_POST['password'])) {
            echo "Yes";
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            
            if ($cpassword == $password) {

                $sqlcheck = "select * from formdata where password = '$password' and username = '$username'";
                $resultcheck = mysqli_query($conn, $sqlcheck);
                if (mysqli_num_rows($resultcheck) > 0) {

                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>User Already Exists !</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                } else {
                    echo "$password";
                    echo "$username";
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "insert into formdata(username, password) values('$username', '$hash')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Successfully signed in !</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    }
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Passwords do not match !</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
        }
    }
    ?>
    <div class="container mt-5">
        <form action="/cwh/45_PasswordHashing/Signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">username </label>
                <input type="text" maxlength="19" name="username" class="form-control" id="username">
                <div id="username" class="form-text">We'll never share your username with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Password</label>
                <input type="password" name="cpassword" class="form-control" id="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>