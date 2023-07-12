<?php

include "../config/db_config.php";

error_reporting(0);




$sql = "SELECT * FROM upload_pdf";
$result = mysqli_query($conn, $sql);


$curr_year = date("Y");
$curr_mon = date("m");



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Issues</title>
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
            <a class="nav-link text-light " href="journal.php">About journal</a>
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

          <br><br>
          <h3 class="heading">ISSUES</h3>

          <?php

          echo "<div >";
          echo "<button class='accordion'>2022</button>";
          echo "<div class='panel'>";
          echo "<br>";

          while ($row1 = mysqli_fetch_assoc($result)) {
            $vol = $row1['volume'];
            $issue = $row1['issue'];

            if ($vol >= $curr_year) {

              // while ($issue == $curr_mon) {
              echo "<a href='article.php?volume=" . $vol . " && issue=" . $issue . "'>Volume 1, Issue 9, September 2022</a>";
              //}
              echo "<br>";
            }
          }
          echo "</div>";
          echo "<br>";

          ?>

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
                            <a href="mailto:support@isjesm.com?Subject=Request for reviwer"class="text-white text-decoration-none">Change User role</a>
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