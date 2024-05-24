<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
</head>

<body>
    <?php
    $insert = false;
    $deleted = false;
    $updated = false;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jayesh";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
        $sql = "DELETE FROM `todolist` WHERE `id` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $deleted = true;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['snoEdit'])) {
            $titleEdit = $_POST['title_edit'];
            $descriptionEdit = $_POST['description_edit'];
            $snoEdit = $_POST['snoEdit'];
            $sql = "update todolist set title = '$titleEdit', description = '$descriptionEdit' where id = $snoEdit";
            $res = mysqli_query($conn, $sql);
            $updated = true;
        } else {
            $title = $_POST['title'];
            $descr = $_POST['description'];
            if (!empty($title) && !empty($descr)) {
                $title = mysqli_real_escape_string($conn, $title);
                $descr = mysqli_real_escape_string($conn, $descr);
                $sql = "INSERT INTO todolist (title, description) VALUES ('$title', '$descr')";
                if (mysqli_query($conn, $sql)) {
                    $title = "";
                    $descr = "";
                    header("Location: " . $_SERVER['PHP_SELF']);
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Title and description are required.</div>';
            }
        }
    }
    ?>
    <?php
    if ($updated) {
        echo '<div class="alert mt-3 alert-warning alert-dismissible fade show" style = "margin-left: 5px;" role="alert">
        <strong>Data updated successfully !</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($deleted) {
        echo '<div class="alert mt-3 alert-warning alert-dismissible fade show" role="alert">
            <strong>Data deleted Successfully !</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>
    <div style = "padding : 10px;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-5">

    </div>
    <div class="container">
        <div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit this Todo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="container">
                                <form action="/cwh/32_Todolist/index.php" method="POST">
                                    <div class="mb-3">
                                        <label for="title_edit" class="form-label">Edit Title</label>
                                        <input type="text" class="form-control" id="title_edit" name="title_edit"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Edit Description</label>
                                        <input type="text" class="form-control" id="description_edit"
                                            name="description_edit">
                                        <input type="hidden" name="snoEdit" id="snoEdit">
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
        </div>
    </div>

    <?php

    ?>
    <div class="container mt-5 ">

        <form action="/cwh/32_Todolist/index.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" class="form-control" id="title" aria-describedby="emailHelp">
                <div id="email" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Desc</label>
                <input type="text" name="description" class="form-control" id="description">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>



    <div class="container ">
        <table class="table" id="mytable">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function deleteItem($id)
                {
                    echo "Hello Bhiya";
                }
                $sql = "SELECT * FROM todolist";
                $result = mysqli_query($conn, $sql);
                $sno = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "
                    <tr>
                        <td>" . $sno . "</td>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td scope='col'>
                        <button type='button' id='" . $row["id"] . "' class='btn btn-primary edit' style='padding-right: 5px; padding-left: 5px; width : 50px;'>Edit</button>
                        <button type='button' id='p" . $row["id"] . "' class='ml-3 btn btn-primary deleteitems' style='margin-left: 5px;'>Delete</button>
                        </td>                    
                    </tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#mytable').DataTable();
        });
    </script>
    <script>
        editdoc = document.getElementsByClassName('edit');
        deleteDoc = document.getElementsByClassName('deleteitems');
        Array.from(deleteDoc).forEach(element => {
            element.addEventListener('click', (e) => {
                sno = e.target.id.substr(1,);
                console.log(sno);
                if (window.confirm("Delete Item from the list !")) {
                    window.location = `/cwh/32_Todolist/index.php?delete=${sno}`;
                }
                else {
                    return false;
                }
            })
        })
        Array.from(editdoc).forEach(element => {
            element.addEventListener('click', (e) => {
                console.log(e.target.parentNode);
                description_edit.value = e.target.parentNode.parentNode.getElementsByTagName('td')[2].innerText;
                title_edit.value = e.target.parentNode.parentNode.getElementsByTagName('td')[1].innerText;
                $('#exampleModal').modal('toggle');
                snoEdit.value = e.target.id;
                console.log(e.target.id);
            });
        });
    </script>

</body>

</html>