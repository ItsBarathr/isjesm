<?php

include "../config/db_config.php";

session_start();

error_reporting(0);

if (!isset($_SESSION["users_id"])) {
  header("Location: ../user/index.php");
}

$id = $_SESSION["users_id"];

if (isset($_POST["upload"])) {

  $terget_file = "../admin/upload/files/" . basename($_FILES['paper']['name']);
  
  $fatch =  mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");

  if (mysqli_num_rows($fatch) > 0) {
    $row1 = mysqli_fetch_assoc($fatch);

    $email = $row1['email'];
    $user_id = $row1['user_id'];
  }
    
  $fatch_script =  mysqli_query($conn, "SELECT * FROM upload_script WHERE email='$email'");

  if (mysqli_num_rows($fatch_script) > 0) {
    $row2 = mysqli_fetch_assoc($fatch_script);

    $username = $row2['user_name'];
    $title_r = $row1['title'];
    $paper = $row1['paper'];
  }


  $user_name = $_POST['username'];
  $title = $_POST['title'];
  $upload_paper = $_FILES['paper']['name'];
  

  $upload_paper_ext = explode('.', $upload_paper);
  $upload_ext_check = strtolower(end($upload_paper_ext));

  $file_ext = array('pdf', 'docx', 'doc');


  if ($user_name == $username && $title == $title_r) {
  if (!in_array($upload_ext_check, $file_ext)) {
    echo "<script>alert('Sorry, artcle file extension only allow docx,doc and pdf format only, check it out!!! ');</script>";
  }else {
    if (unlink("../admin/upload/files/".$paper)) {
      if (move_uploaded_file($_FILES['paper']['tmp_name'], $terget_file)) {
        $sql = "UPDATE upload_script set paper='$upload_paper' WHERE email='$email2'";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Your article uploaded successfull');</script>";
      } else {
        echo "<script>alert('Sorry, Your article uploaded unsuccessfull,check it out!!!');</script>";
      }  
    }
  }
  }

} else {
  // echo "<script>alert('blog uploaded unsuccessfull,check it out!!!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Isjesm || file Reupload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/issues.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse align" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="journal.php">About journal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="author.php">Guidelines</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="edit.php">Editorial Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php">Issues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contact.php">Contact</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="../user/index.php">Register/Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="align-1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
          <?php include "component/index.php"; ?>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="container">



          <div class="form">
            <div class="container mt-3">
              <h2>Resubmit On Article</h2>
              <form action="" method="post" enctype="multipart/form-data">
                <br>
                <div class="mb-3 mt-3">
                  <label class="form-label" for="email">User name</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Enter your username" name="username" required>
                </div>
                <div class="mb-3 mt-3">
                  <label class="form-label" for="title">Title Of The Article</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Enter Article Title" name="title" required>
                </div>
                <div class="mb-3 mt-3">
                  <label class="form-label">Upload To Paper</label>
                  <input type="file" class="form-control" name="paper" required>
                </div>
                <input type="submit" value="Upload" name="upload" class="btn btn-primary">
              </form>
            </div>
          </div>
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
              <a href="manuscript.php" class="text-white text-decoration-none">Submit article</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
          <h5 class="text-uppercase"></h5>

          <ul class="list-unstyled mb-0 text-decoration-none">
            <li>
              <a href="../user/index.php" class="text-white text-decoration-none">Sign in</a>
            </li>

            <li>
              <a href="index.php" class="text-white text-decoration-none">Issues</a>
            </li>
          </ul>
        </div>



        <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
          <h5 class="text-uppercase mb-0"></h5>

          <ul class="list-unstyled">
            <li>
              <a href="mailto:support@isjesm.com?Subject=Request for reviwer" class="text-white text-decoration-none">Change User role</a>
            </li>
            <li>
              <a href="edit.php" class="text-white text-decoration-none">Editorial</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center text-light p-3">
      Copyright © 2022 <a class="text-white text-decoration-none" href="https://feeyoh.com/">Feeyoh.com</a>
    </div>
  </div>


</body>

</html>