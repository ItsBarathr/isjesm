<?php


include "../config/db_config.php";

error_reporting(0);



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact us || ISJESM</title>
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

  <br><br>
  <div class="align-1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
          <?php include "component/index.php"; ?>
        </div>
      </div>
      <div class="col-sm-8">
        <!---navigation bar ends-->
        <br>
        <br>
        <div style="text-align:center;">
          <h2 class="logo">Contact Us</h2>
          <div class="container">
            <div class="col-sm p-3 m-3 align-item-center">
              <div class="card text-center col-sm shadow-lg p-3 mb-5 dg-white rounded">
                <form action="" method="post">
                  <div class="form-group">
                    <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                  </div> <br>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                  </div> <br>
                  <div class="form-group">
                    <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                  </div> <br>
                  <input type="submit" value="Send" class="btn btn-success" name="send">
                </form>
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



  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
  </script>





</body>

</html>