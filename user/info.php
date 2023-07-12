<?php

include "../config/db_config.php";

session_start();

error_reporting(0);

if (!isset($_SESSION["users_id"])) {
    header("Location: index.php");
}

$id = $_SESSION["users_id"];

if (isset($_POST["save"])) {

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $state = $_POST["state"];
    $pin_code = $_POST["pin_code"];
    $country = $_POST["country"];
    $organisation = $_POST["organisation"];
    $department = $_POST["department"];
    $location = $_POST["location"];
    $dest = $_POST["dest"];

    $check_user = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");

    if (mysqli_num_rows($check_user) > 0) {
        $update = mysqli_query($conn, "UPDATE user set first_name='$first_name', last_name='$last_name', state='$state', pin_code='$pin_code', country='$country', organisation='$organisation', department='$department', location='$location', dest='$dest' WHERE id='$id'");

        if ($update) {
            echo "<script>alert('Your profile is saved');</script>";
        } else {
            echo "<script>alert('Your profile is not saved.Try again!!!');</script>";
        }
    }
}


$fatch =  mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");

if (mysqli_num_rows($fatch) > 0) {
    $row1 = mysqli_fetch_assoc($fatch);

    $first_name = $row1['first_name'];
    $last_name = $row1['last_name'];
    $state = $row1['state'];
    $pin_code = $row1['pin_code'];
    $country = $row1['country'];
    $organisation = $row1['organisation'];
    $department = $row1['department'];
    $location = $row1['location'];
    $dest = $row1['dest'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Author info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/home.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

</head>

<body>
    <!-- nav start -->
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../pages/journal.php">About journal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../pages/author.php">Guidelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="info.php">Author info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../pages/index.php">Issues</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- nav end -->
    <br>

    <!--logo end  -->
    <div class="align-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <?php include "../pages/component/login.php"; ?>
                </div>
            </div>
            <div class="col-sm-8">
                <br>
                <div class="">
                    <h2 class="heading"> Personal Information</h2>
                    <form action="" method="post">
                        <div class="mb-3 mt-3">
                            <label> First name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" value="<?php echo $first_name; ?>" placeholder="First name" name="first_name">
                        </div>
                        <div class="mb-3">
                            <label> Last name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" value="<?php echo $last_name; ?>" placeholder="Last name" name="last_name">
                        </div>
                        <div class="mb-3">
                            <label> State <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" value="<?php echo $state; ?>" placeholder="State" name="state">
                        </div>
                        <div class="mb-3">
                            <label> Pincode <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" autocomplete="off" value="<?php echo $pin_code; ?>" placeholder="Pin code" name="pin_code">
                        </div>
                        <div class="mb-3">
                            <label> Country <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" value="<?php echo $country; ?>" placeholder="Country" name="country">
                        </div>
                        <div class="mb-3">
                            <label>Organisation/Afflication <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" value="<?php echo $organisation; ?>" placeholder="Organisation/Afflication" name="organisation">
                        </div>
                        <div class="mb-3">
                            <label>Department <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" value="<?php echo $department; ?>" placeholder="Department" name="department">
                        </div>
                        <div class="mb-3">
                            <label>Location/Place <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" value="<?php echo $location; ?>" placeholder="Location/Place" name="location">
                        </div>
                        <div class="mb-3">
                            <label>Designation <span class="text-danger">*</span></label>
                            <select class="form-control" name="dest" value="<?php echo $dest; ?>">
                                <option class="form-control">Select your designation</option>
                                <option class="form-control">Professor</option>
                                <option class="form-control">Associative Professor</option>
                                <option class="form-control">Assistant Professor</option>
                                <option class="form-control">Student</option>
                            </select>
                        </div>
                        <input type="submit" value="Save" name="save" class="btn btn-success">
                        <br><br>
                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>
    </div>

    <br><br><br><br><br><br>
    <!-- footer -->
    <div class="bg-secondary text-white text-center">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                    <h5 class="text-uppercase"></h5>

                    <ul class="list-unstyled mb-0 text-decoration-none">
                        <li>
                            <a href="../doc/template/Manuscript Publication Format_IJESMR.docx" class="text-white text-decoration-none">Template</a>
                        </li>
                        <li>
                            <a href="../pages/manuscript.php" class="text-white text-decoration-none">Submit article</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                    <h5 class="text-uppercase"></h5>

                    <ul class="list-unstyled mb-0 text-decoration-none">
                        <li>
                            <a href="index.php" class="text-white text-decoration-none">Sign in</a>
                        </li>

                        <li>
                            <a href="../pages/index.php" class="text-white text-decoration-none">Issues</a>
                        </li>
                    </ul>
                </div>



                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                    <h5 class="text-uppercase mb-0"></h5>

                    
                    <ul class="list-unstyled">
                        <li>
                            <a href="mailto:support@isjesm.com?Subject=Request for reviwer"class="text-white text-decoration-none">Change User role</a>
                        </li>
                        <li>
                            <a href="../pages/edit.php" class="text-white text-decoration-none">Editorial</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text-white text-decoration-none" href="https://feeyoh.com/">Feeyoh.com</a>
        </div>
    </div>


</body>

</html>