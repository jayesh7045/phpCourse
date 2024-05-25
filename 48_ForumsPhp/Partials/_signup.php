<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Signup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action = "http://localhost/cwh/48_Forumsphp/index.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" name="username"
                                    aria-describedby="usernamehelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" id="cpassword">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from fsign where username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >= 1) {
            echo '<script>window.location.href = "?success=false"</script>';
            exit();
        } else {
            $sql1 = "insert into fsign(username, password) values('$username', '$password')";
            $res1 = mysqli_query($conn, $sql1);
            if ($res1) {
                
                echo '<script>window.location.href = "?success=true"</script>';
                exit();
            }
            else
            {
                echo '<script>window.location.href = "?success=false"</script>';
            }
        }
        unset($password);
        unset($username);
    }
}
?>