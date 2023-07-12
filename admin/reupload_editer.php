<?php

include "../config/db_config.php";

session_start();

error_reporting(0);

if (!isset($_SESSION["editer_id"])) {
  header("Location: ../index.php");
}

if (isset($_POST["upload"])) {

  $terget_file = "upload/reupload/".basename($_FILES['reupload']['name']);

  $email = $_POST['email'];
  $title = $_POST['title'];
  $comment = $_POST['comment'];
  $upload_file =  $_FILES['reupload']['name'];

  $upload_file_ext = explode('.', $upload_file);
  $upload_ext_check = strtolower(end($upload_file_ext));

  $file_ext = array('docx', 'doc', 'pdf');


  if (!in_array($upload_ext_check, $file_ext)) {
    echo "<script>alert('Sorry, file extension only allow pdf,document format only, check it out!!! ');</script>";
  }
  else {
    if (move_uploaded_file($_FILES['reupload']['tmp_name'], $terget_file)) {
      $sql = "INSERT INTO upload_editer(email, title, comment, reupload) VALUE ('$email', '$title', '$comment', '$upload_file')";
      $result = mysqli_query($conn, $sql);
      echo "<script>alert('Your article uploaded successfull');</script>";
    } else {
      echo "<script>alert('Sorry, Your article uploaded unsuccessfull,check it out!!!');</script>";
    }
  }


} else {
  // echo "<script>alert('blog uploaded unsuccessfull,check it out!!!');</script>";
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>reviewed docs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="css/nav.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link" href="reupload_editer.php">Deshboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link" href="../pages/edit.php">Editorial Board</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link" href="../pages/index.php">Issues</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link" href="../user/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<div class="container mt-3">
  <h2>ReUpoload Form</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label>E-mail</label>
      <input type="email" class="form-control"  placeholder="Enter Email" name="email" required>
    </div>
    <div class="mb-3 mt-3">
      <label>Title</label>
      <input type="text" class="form-control"  placeholder="Enter the title" name="title" required>
    </div>
    <div class="mb-3 mt-3">
      <label>Comment`s</label>
      <textarea name="comment" class="form-control" cols="30" rows="10" required placeholder="Write..."></textarea>
    </div>
    <div class="mb-3">
        <label>Upload</label>
        <input type="file" class="form-control" name="reupload" required>
      </div>
    <input type="submit" value="Upload" name="upload" class="btn btn-primary">
  </form>
</div>

</body>
</html>
