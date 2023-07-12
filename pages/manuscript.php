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
  $terget_cv = "../admin/upload/cv/" . basename($_FILES['cv']['name']);
  $terget_statement = "../admin/upload/statement/" . basename($_FILES['statement']['name']);



  $fatch =  mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");

  if (mysqli_num_rows($fatch) > 0) {
    $row1 = mysqli_fetch_assoc($fatch);

    $email = $row1['email'];
    $user_id = $row1['user_id'];
  }


  $user_name = $_POST['username'];
  $article_t = $_POST['article-t'];
  $title = $_POST['title'];
  $upload_paper = $_FILES['paper']['name'];
  $upload_cv = $_FILES['cv']['name'];
  $upload_statement = $_FILES['statement']['name'];


  $upload_paper_ext = explode('.', $upload_paper);
  $upload_ext_check = strtolower(end($upload_paper_ext));


  $upload_cv_ext = explode('.', $upload_cv);
  $upload_cv_ext_check = strtolower(end($upload_cv_ext));


  $upload_statement_ext = explode('.', $upload_statement);
  $upload_st_ext_check = strtolower(end($upload_statement_ext));

  $file_ext = array('pdf', 'docx', 'doc');


  if (!in_array($upload_ext_check, $file_ext)) {
    echo "<script>alert('Sorry, artcle file extension only allow docx,doc and pdf format only, check it out!!! ');</script>";
  } elseif (!in_array($upload_cv_ext_check, $file_ext)) {
    echo "<script>alert('Sorry, article file extension only allow docx,doc and pdf format only, check it out!!! ');</script>";
  } elseif (!in_array($upload_st_ext_check, $file_ext)) {
    echo "<script>alert('Sorry, article file extension only allow docx,doc and pdf format only, check it out!!! ');</script>";
  } else {
    if (move_uploaded_file($_FILES['paper']['tmp_name'], $terget_file) && move_uploaded_file($_FILES['cv']['tmp_name'], $terget_cv) && move_uploaded_file($_FILES['statement']['tmp_name'], $terget_statement)) {
      $sql = "INSERT INTO upload_script(email, user_id, user_name topic, title, paper, cv, statement) VALUE ('$email', '$user_id', '$user_name', '$article_t', '$title', '$upload_paper', '$upload_cv', '$upload_statement')";
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
  <title>Isjesm || file upload</title>
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
            <a class="nav-link text-light " href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="journal.php">About journal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="author.php">Guidelines</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="edit.php">Editorial Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="index.php">Issues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="contact.php">Contact</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light " href="../user/index.php">Register/Login</a>
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
              <h2>Submit On Article</h2>
              <form action="" method="post" enctype="multipart/form-data">
                <br>
                <div class="mb-3 mt-3">
                  <label class="form-label" for="email">User name</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Enter your usernamr" name="username" required>
                </div>
                <label for="sel1" class="form-label">Article Type</label>
                <select class="form-select" name="article-t">
                  <option default>Choose one</option>
                  <option>Research Paper</option>
                  <option>Review Paper</option>
                  <option>Short Communication</option>
                  <option>Special Issue</option>
                </select>
                <div class="mb-3 mt-3">
                  <label class="form-label" for="title">Title Of The Article</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Enter Article Title" name="title" required>
                </div>
                <div class="mb-3 mt-3">
                  <label class="form-label">Upload To Paper</label>
                  <input type="file" class="form-control" name="paper" required>
                </div>
                <div class="mb-3 mt-3">
                  <label class="form-label">Upload Cover Letter</label>
                  <input type="file" class="form-control" name="cv" required>
                </div>
                <div class="mb-3 mt-3">
                  <label class="form-label">Copyright Transfer Statement</label>
                  <input type="file" class="form-control" name="statement" required>
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