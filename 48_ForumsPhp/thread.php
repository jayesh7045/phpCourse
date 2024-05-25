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
    <?php
   
    require "Partials/_nav.php";
    $id = $_GET['id'];
    $titlesql = "select * from forums where category_id = " . $id . "";
    $titleresult = mysqli_query($conn, $titlesql);
    $fetchData = mysqli_fetch_assoc($titleresult);
    $title = $fetchData["category_name"];
    $description = $fetchData['category_description'];
    $fetchThraedSql = "select * from threads where concept_id = " . $id . "";
    $ThreadsResult = mysqli_query($conn, $fetchThraedSql);

    echo '<div class="container mt-5 pl-5 pr-5">
        
        <div class="jumbotron">
            <h1 class="display-4">' . $title . '</h1>
            <p class="lead">Description:
                ' . $description . '</p>
            <hr class="my-4">
            <p>Getting Started with ' . $title . ': Best resources and tips for beginners.</p>
            <p class="lead font-bold">
                Posted by: Jayesh
            </p>
        </div>

        <div class="my-5">
           ';


    while ($datafetched = mysqli_fetch_assoc($ThreadsResult)) {
        echo '
            <div class="media mt-5">
                            <img class="mr-3" style ="width: 40px;" src="https://e7.pngegg.com/pngimages/753/432/png-clipart-user-profile-2018-in-sight-user-conference-expo-business-default-business-angle-service-thumbnail.png" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0">' . $datafetched['thread_title'] . '</h5>
                                ' . $datafetched['thread_desc'] . '
                            </div>
                        </div>';
    }
    echo ' 
        </div>
    </div>';
    ?>
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