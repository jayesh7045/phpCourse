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
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jayesh";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn) {
        echo "Connection is successful !!!";
    } else {
        die("Connection failed, Cannot connect to DB !!!");
    }

    ?>
    <div class="container">
        <form action="/cwh/28_formphp/" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input  name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="email" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = (int)$_POST['email'];
            $password = $_POST['password'];
            $sql = "insert into jay1 values($email, '$password')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                echo "Data inserted Successfully";
            }
            echo '<div class="alert alert-primary" role="alert">
            The name is '.$email . 'and password is ' . $password . '
          </div>';
        }
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>