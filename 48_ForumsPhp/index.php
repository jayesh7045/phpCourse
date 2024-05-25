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

    require "Partials/_nav.php";
    if (isset($_GET['success']) and $_GET['success'] == 'true') {
        echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Registration Successful !</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    else if(isset($_GET['success'])){ 
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Registration Failed !</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if(isset($_GET['login']) and $_GET['login'] == 'true')
    {
       
        echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Login Successful !</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    else if(isset($_GET['login']))
    {
      
        echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Login Failed !</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    $sql = "SELECT * FROM forums";
    $result = mysqli_query($conn, $sql);

    ?>
    <div class="container mb-5">
        <h3 class="text-center mb-5 mt-5">iForums - Browse Categories!</h3>
        <div class="row">
            <?php
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <div class="col-md-4 mb-4">
                        <div >
                        <div class="card" style="height: 630px; width:350px;">
                            <div class="d-flex justify-content-center" style = "height:300px">
                            <img 
                                src=' . $row['image'] . ' class = "container mt-5 justify-content-center"
                                style = "height: 250px; width : 250px"  alt="...">
                            </div>
                            <div class="mt-5">
                            <div class="card-body">
                            <a href="/cwh/48_Forumsphp/threads.php?id=' . $row['category_id'] . '"><h5 class="card-title">' . $row['category_name'] . '</h5></a>
                                <p class="card-text">' . $row['category_description'] . '.</p>
                                <a href="/cwh/48_Forumsphp/threads.php?id=' . $row['category_id'] . '" class="btn btn-primary">Go somewhere</a>
                            </div></div>
                        </div></div>
                    </div>
                ';
                $count++;
            }
            ?>
        </div>
    </div>
    <?php require "Partials/_Footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
</body>

</html>