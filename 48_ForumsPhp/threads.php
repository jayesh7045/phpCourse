<?php
require "Partials/_nav.php";

// Ensure 'id' is set and sanitize it
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    die("Error: 'id' parameter is missing.");
}

// Database query to fetch forum details
$titlesql = "SELECT * FROM forums WHERE category_id = $id";
$titleresult = mysqli_query($conn, $titlesql);
if (!$titleresult) {
    die("Error executing query: " . mysqli_error($conn));
}
$fetchData = mysqli_fetch_assoc($titleresult);
$title = $fetchData["category_name"];
$description = $fetchData['category_description'];

// Database query to fetch threads
$fetchThreadSql = "SELECT * FROM threads WHERE concept_id = $id";
$ThreadsResult = mysqli_query($conn, $fetchThreadSql);
if (!$ThreadsResult) {
    die("Error executing query: " . mysqli_error($conn));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && isset($_POST['desc'])) {
        $title_ = mysqli_real_escape_string($conn, $_POST['title']);
        $desc_ = mysqli_real_escape_string($conn, $_POST['desc']);
        $sql = "INSERT INTO threads(concept_id, thread_title, thread_desc) VALUES($id, '$title_', '$desc_')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Thread added successfully!');</script>";
            echo "<script>window.location.href = 'threads.php?id=$id';</script>";
            exit();
        } else {
            die("Error executing query: " . mysqli_error($conn));
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>

    <div class="container mt-5 pl-5 pr-5">
        <div class="jumbotron">
            <h1 class="display-4"><?= htmlspecialchars($title) ?></h1>
            <p class="lead">Description: <?= htmlspecialchars($description) ?></p>
            <hr class="my-4">
            <p>Getting Started with <?= htmlspecialchars($title) ?>: Best resources and tips for beginners.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>

        <div class="my-5">
            <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
                <div>
                    <h3>Be the first to Start the Discussion</h3>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="titlehelp"
                        placeholder="Enter title">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Enter concern</span>
                    </div>
                    <textarea name="desc" class="form-control" aria-label="With textarea"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>

            <?php
            if (mysqli_num_rows($ThreadsResult) == 0) {
                echo '
                <div class="container" style="width: 50px">
                    <div class="mt-3 mb-3">
                        <h3>Be the first to Express!</h3>
                    </div>
                </div>';
                echo '
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-6">No Questions to show</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                    </div>
                </div>';
            } else {
                while ($dataFetched = mysqli_fetch_assoc($ThreadsResult)) {
                    echo '
                    <a href="http://localhost/cwh/48_Forumsphp/comments.php?id='.htmlspecialchars($dataFetched['thread_id']).'">
            <div class="media mt-5">
                <img class="mr-3" style="width: 40px;"
                    src="https://e7.pngegg.com/pngimages/753/432/png-clipart-user-profile-2018-in-sight-user-conference-expo-business-default-business-angle-service-thumbnail.png"
                    alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">' . htmlspecialchars($dataFetched['thread_title']) . '</h5>
                    ' . htmlspecialchars($dataFetched['thread_desc']) . '
                </div>
            </div>
            </a>';
            }
            }
            ?>
        </div>
    </div>

    <?php
    require "Partials/_Footer.php";
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>