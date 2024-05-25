<!doctype html>
<html lang="en">
<?php
require "Partials/_nav.php";
$id = $_GET['id'];

$sql = "select * from threads where thread_id = " . $id . "";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$title = $row['thread_title'];
$desc = $row['thread_desc'];


$sql2 = "select * from comments where thread_id = " . $id . "";
$result2 = mysqli_query($conn, $sql2);


?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['desc'])) {
        $desc = $_POST['desc'];
        $sql2 = "insert into comments(thread_id, comment_desc) values($id, '$desc')";
        $result3 = mysqli_query($conn, $sql2);
        if ($result3) {
            echo "Data inserted successfully";
            echo "<script>window.location.href = 'comments.php?id=$id'</script>";
        }
    } 
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4"><?= htmlspecialchars($title) ?></h1>
            <p class="lead">Description: <?= htmlspecialchars($desc) ?></p>
            <hr class="my-4">
            <p>Explore the solution for : <?= htmlspecialchars($title) ?>: Best resources and tips for beginners.
            </p>

        </div>

        <div style="min-height: 200px;" class="mb-5">
            <div class="mb-3">
                <h2>Post a Comment</h2>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Type your comment here</label>
                    <textarea id="desc" name="desc" class="form-control" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                </div>
                <input type="submit" value="submit" class="btn btn-primary">
                <h2>Disscussions</h2>
            </form>


            <?php
            while ($row2 = mysqli_fetch_assoc($result2)) {

                $userid = $row2['user_id'];
                $sqluser = "select * from fsign where sid = $userid";

                $userresult = mysqli_query($conn, $sqluser);
                $userrow = mysqli_fetch_assoc($userresult);

                if ($userrow) {


                    echo '<div class="media my-5">
                <img class="mr-3" width = "50px" src="https://as2.ftcdn.net/v2/jpg/03/46/68/13/1000_F_346681316_eAGxVbCiqZOyaFmWx1fTY19SwvMcwhnR.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mt-0">' . $userrow['username'] . ' at ' . $userrow['comment_time'] . ' :</h5>
                        ' . $row2['comment_desc'] . '
                    </div>      
              </div>';
                }
            }



            ?>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js"
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
<?php
require "Partials/_Footer.php";
?>