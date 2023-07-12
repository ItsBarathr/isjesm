<?php

include "../../config/db_config.php";

session_start();

error_reporting(0);

if (!isset($_SESSION["admin_id"])) {
  header("Location: ../index.html");
}

if (isset($_POST["upload"])) {

  $terget_file = "../../doc/pdf/" . basename($_FILES['upload']['name']);

  $title = $_POST['title'];
  $upload_file =  $_FILES['upload']['name'];
  $info = $_POST['info'];
  $page = $_POST['page'];
  $volume = $_POST['volume'];
  $issue = $_POST['issue'];
  $date = $_POST['date'];

  $upload_file_ext = explode('.', $upload_file);
  $upload_ext_check = strtolower(end($upload_file_ext));

  $file_ext = array('docx', 'doc', 'pdf');


  if (!in_array($upload_ext_check, $file_ext)) {
    echo "<script>alert('Sorry, file extension only allow pdf,document format only, check it out!!! ');</script>";
  } else {
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $terget_file)) {
      $sql = "INSERT INTO upload_pdf(title, upload, info, page, volume, issue, date) VALUE ('$title', '$upload_file', '$info', '$page', '$volume', '$issue', '$date')";
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
  <title>Admin article management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/nav.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <a class="nav-link" id="link" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="pages/upload.php">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="admin.php">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../editortable.php">Editer upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../editer_list.php">Editer list</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../../pages/index.php">Issues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../../user/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br>
  <div class="align-1">
    <div class="container">
      <div class="row">
        <div class="col-sm-8"><br><br>
          <!---navigation bar ends-->
          <div class="">
            <form action="" method="post" enctype="multipart/form-data" class=" text-primary  col-sm">
              <div class="form-group">
                <label for="usr"> Title</label>
                <input type="text" class="form-control" id="usr" name="title">
              </div><br>
              <div class="form-group">
                <label class="form-label" for="customFile">Upload</label>
                <input type="file" name="upload" class="form-control " id="customFile" />
              </div><br>
              <div class="form-group">
                <label for="comment">Info</label>
                <textarea class="form-control" name="info" rows="5" id="comment"></textarea>
              </div><br>
              <div class="form-group">
                <label for="page"> Page No</label>
                <input type="text" class="form-control" name="page" id="pg" name="page">
              </div><br>
              <div class="form-group">
                <label for="vol"> Volume No</label>
                <input type="text" class="form-control" id="vol" name="volume">
              </div><br>
              <div class="form-group">
                <label for="issue"> Issue No</label>
                <input type="text" class="form-control" id="issue" name="issue">
              </div><br>
              <div class="form-group">
                <label for="Date of Birth">Date</label>
                <input type="date" class="form-control" name="date">
              </div>
              <br>
              <input type="submit" name="upload" value="Upload" class="btn btn-primary">
            </form>
          </div>
        </div>

</body>

</html>