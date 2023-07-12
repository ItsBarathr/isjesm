<?php

include "../config/db_config.php";

session_start();

error_reporting(0);


if (isset($_SESSION["admin_id"])) {
    header("Location: ../admin/index.php");
}

if (isset($_SESSION["users_id"])) {
    header("Location: profile.php");
}

if (isset($_SESSION["editer_id"])) {
    header("Location: ../admin/reupload_editer.php");
}


if (isset($_POST["signin"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $check_user = mysqli_query($conn, "SELECT id,user_id FROM user WHERE email='$email' AND password='$password' and status='1'");

    $check_admin = mysqli_query($conn, "SELECT id FROM admin WHERE email='$email' AND password='$password'");
    
    $check_editer = mysqli_query($conn, "SELECT id FROM editer WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($check_user) > 0) {
        $row1 = mysqli_fetch_assoc($check_user);
        $_SESSION["users_id"] = $row1['id'];
        $_SESSION["users_user_id"] = $row1['user_id'];
        $_SESSION["users_email"] = $row1['email'];
        header("Location: profile.php");
    } elseif (mysqli_num_rows($check_admin) > 0) {
        $row1 = mysqli_fetch_assoc($check_admin);
        $_SESSION["admin_id"] = $row1['id'];
        header("Location: ../admin/index.php");
    } elseif (mysqli_num_rows($check_editer) > 0) {
        $row2 = mysqli_fetch_assoc($check_editer);
        $_SESSION["editer_id"] = $row2['id'];
        header("Location: ../admin/reupload_editer.php");
    }else {
        echo "<script>alert('Login details is incorrect. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/home.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a class="nav-link text-light " href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="../pages/journal.php">About journal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="../pages/author.php">Guidelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="../pages/edit.php">Editorial Board</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="../pages/index.php">Issues</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="../pages/contact.php">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- nav end -->
    <br><br><br>

    <!--logo end  -->
    <div class="align-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <?php include "../pages/component/login.php"; ?>
                </div>
            </div>
            <div class="col-sm-8">
                <br><br><br>

                <div class="container">

                    <div class="card p-3 m-6 col-sm-5 mx-auto d-block" style="width: 80%;">
                        <div class="text-center">
                            <h2 class="heading"> Sign in</h2>
                        </div>
                        <form action="" method="post">
                            <div class="mb-3 mt-3">
                                <label for="email">Email/Customer ID</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="pwd">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
                            </div>
                            <div class="text-center">
                                <a href="##" style="text-decoration: none;">Forgot password?</a>
                            </div>
                            <br>
                            <div class="text-center">
                                <input type="submit" name="signin" value="Sign in" class="btn btn-success">
                            </div>
                            <br>
                            <div class="text-center">
                                <p>Don't your have account <a href="reg.php" style="text-decoration: none;">Sign up</a></p>
                            </div>
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
                            <a href="#" class="text-white text-decoration-none">Sign in</a>
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
            Copyright © 2022 <a class="text-white text-decoration-none" href="https://feeyoh.com/">Feeyoh.com</a>
        </div>
    </div>


</body>

</html>