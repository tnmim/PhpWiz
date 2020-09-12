<?php
include_once "server.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <link rel="icon" href="http://example.com/favicon.png">

    <title>PhpWizard</title>
</head>
<body>
<!--Modal part to collect preference-->
<div class="container">
    <?php
    $userId = $_SESSION['user_id'];
    $sql = 'SELECT * FROM user WHERE id = "' . $userId . '"';

    $retval = mysqli_query($conn, $sql);

    if (!$retval) {
        die('Could not get data: ' . mysqli_error());
    }

    while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        if ($row['flag'] == 2) { ?>
            <script>
                $( document ).ready(function() {
                    $('#myModal').modal('hide');
                });
            </script>
        <?php }else{
        ?>
            <script>
                $( document ).ready(function() {
                    $('#myModal').modal('show');
                });
            </script>
            <?php
        }
    }
    ?>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Tell us Your Preference</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h5>You only have to do it once</h5>
                    <form action="" method="POST">
                        <select class="form-control" id="preference" list="preference" name="preference">
                            <option value="Programming">Programming</option>
                            <option value="E-commerce">E-commerce</option>
                            <option value="Medicle">Medicle</option>
                            <option value="Blog">Blog</option>
                            <option value="Charity">Charity</option>
                        </select>
                        <input type="submit" class="btn btn-info" id="submit" name="submit">
                    </form>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $userId = $_SESSION['user_id'];
                        $preference = $_POST['preference'];

                        $sql = "UPDATE user SET preference='$preference',flag='2' WHERE id=$userId";
                        $result = mysqli_query($conn, $sql);
                        header('location: index.php');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- End of modal part-->


<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="profile.php">
            <img src="image/av.jpg" class="rounded-circle" alt="logo" style="width:40px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                    <!--logout-->
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <!-- <li class="text-center"> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
  				--><a class="nav-link " href="logout.php">Logout</a>
                    <?php } else
                        header("Location:login.php");
                    ?>
                    <!--logout-->

                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>

</nav>

<div class="container">

    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-left">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as
                        <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
                <li><a href="logout.php">Log Out</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Sign Up</a></li>
            <?php } ?>
        </ul>
    </div>
</div>


<div class="jumbotron-fluid">
    <img src="image/phpwiz.jpg" style="width:100%;">


</div>

<div class="container-fluid">
    <! –– Group: site and recommendation in row ––>

    <div class="row">
        <! –– Group: Catagory ––>

        <div class="col-sm-9" style="border: 2px solid">
            <h1 class="text-center">===Catagory===</h1>
            <br>
            <! –– Group: using cards ––>

            <div class="card-deck">

                <div class="card" style="width:300px">
                    <img class="card-img-top" src="image/folder.jpg" alt="Card image" style="width:50%">
                    <div class="card-body">
                        <h4 class="card-title">Programming</h4>
                        <p class="card-text"></p>
                        <a href="www.google.com" class="btn btn-primary stretched-link">visit</a>
                    </div>
                </div>

                <div class="card" style="width:300px">
                    <img class="card-img-top" src="image/folder.jpg" alt="Card image" style="width:50%">
                    <div class="card-body">
                        <h4 class="card-title">E-commerece</h4>
                        <p class="card-text"></p>
                        <a href="www.google.com" class="btn btn-primary stretched-link">visit</a>
                    </div>
                </div>

                <div class="card" style="width:300px">
                    <img class="card-img-top" src="image/folder.jpg" alt="Card image" style="width:50%">
                    <div class="card-body">
                        <h4 class="card-title">Medical</h4>
                        <p class="card-text"></p>
                        <a href="www.google.com" class="btn btn-primary stretched-link">visit</a>
                    </div>
                </div>


            </div>
            <! –– 1st row ends ––>
            <br>
            <div class="card-deck">

                <div class="card" style="width:300px">
                    <img class="card-img-top" src="image/folder.jpg" alt="Card image" style="width:50%">
                    <div class="card-body">
                        <h4 class="card-title">Blogs</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and
                            engineer</p>
                        <a href="www.google.com" class="btn btn-primary stretched-link">visit</a>
                    </div>
                </div>

                <div class="card" style="width:300px">
                    <img class="card-img-top" src="image/folder.jpg" alt="Card image" style="width:50%">
                    <div class="card-body">
                        <h4 class="card-title">Charity</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and
                            engineer</p>
                        <a href="www.google.com" class="btn btn-primary stretched-link">visit</a>
                    </div>
                </div>

                <div class="card" style="width:300px">
                    <img class="card-img-top" src="image/folder.jpg" alt="Card image" style="width:50%">
                    <div class="card-body">
                        <h4 class="card-title">miscellaneous</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and
                            engineer</p>
                        <a href="www.google.com" class="btn btn-primary stretched-link">visit</a>
                    </div>
                </div>


            </div>


        </div>
        <! –– Group: Catagory Endsssssss ––>

        <! –– Group:recommendation ––>
        <div class="col-sm-3" style="border: 2px solid">
            <h3 class="text-center text-primary">Recomended for you</h3>
            <br>
            <div>
                <li>Project with php</li>
                <li>A karaoke site</li>
            </div>

        </div>
    </div>

</div>
</body>
</html>