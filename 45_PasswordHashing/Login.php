<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login form</title>
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
        $exists = false;
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];


            $sql = "select * from formdata where username = '$username'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) >= 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (password_verify($password, $row['password'])) {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['loggedin'] = true;
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully Logged in !</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        $exists = true;
                        header("location:Welcome.php");
                    } 
                }

            } 
            if(!$exists) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>User do not exists!</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
        }
    }

    ?>

    <div class="container mt-5">
        <form action="/cwh/45_PasswordHashing/Login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Email address</label>
                <input type="text" maxlength="19" class="form-control" id="username" name="username"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
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