<?php


include "../config/db_config.php";

error_reporting(0);



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Editorial Board</title>
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
        <br><br>
        <h3 class="text-center sub">EDITORIAL BOARD</h3><br>
        <div>
          Become an editorial member of <t class="fw-bold">ISJESM</t>. Mail your resume to <a href="mailto:support@isjesm.com">support@isjesm.com</a>
        </div>

        <br><br>
        <table class="table">
          <tbody>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Editer details</th>
            </tr>
            <tr>
              <td class="text-dark">1</td>
              <td class="text-dark"> <b>Dr.J.SAM ALARIC</b> <br> Professor, <br> Department of Electrical and Computer Engineering, <br>
                Wollega University, <br> Ethiopia.</td>
            </tr>
            <tr>
              <td class="text-dark">2</td>
              <td class="text-dark"> <b>Dr. SIVAKUMAR MUTHUSAMY</b> <br>
                Lecturer/Electrical Engineering, <br>
                Engineering Department, <br>
                University of Technology and Applied Sciences-Nizwa, <br>
                Sultanate of Oman.</td>
            </tr>
            <tr>
              <td class="text-dark">3</td>
              <td class="text-dark"><b>Dr. Haiter Lenin Allasi</b> <br>
                Professor,<br>
                Department of Mechanical Engineering,<br>
                WOLLO University,<br>
                Kombolcha Institute of Technology,<br>
                Kombolcha, Ethiopia 208.</td>
            </tr>
            <tr>
              <td class="text-dark">4</td>
              <td class="text-dark"> <b>Dr.K. MARTIN SAGAYAM</b><br>
                Professor, <br>
                Department of Electronics and Communication Engineering, <br>
                Karunya Institute of Technology and Sciences, <br>
                Coimbatore 641114,<br>
                Tamil Nadu, India.</td>
            </tr>
            <tr>
              <td class="text-dark">5</td>
              <td class="text-dark"> <b>Dr.S.ANTHONIRAJ</b><br>
                Professor, <br>
                Department of Computer Science and Engineering, <br>
                Jain University, <br>
                Bangalore, India.</td>
            </tr>
            <tr>
              <td class="text-dark">6</td>
              <td class="text-dark"> <b>Dr.S.KUMARGANESH</b><br>
                Professor,<br>
                Department of Electronics and Communication Engineering, <br>
                Knowledge Institute of Technology, <br>
                Salem, Tamilnadu, India</td>
            </tr>
            <tr>
              <td class="text-dark">7</td>
              <td class="text-dark"> <b>Dr.T.SENTHIL KUMAR</b><br>
                Professor, <br>
                Department of Computer Science and Engineering<br>
                Vellore Institute of Technology,<br>
                Vellore <br>
                Tamilnadu, India
              </td>
            </tr>
            <tr>
              <td class="text-dark">8</td>
              <td class="text-dark"> <b>Dr.A.Vinoth Jebaraj</b><br>
                Professor, <br>
                Department of Design and Automation, <br>
                Vellore Institute of Technology, <br>
                Vellore, <br>
                Tamilnadu, India
              </td>
            </tr>
            <tr>
              <td class="text-dark">9</td>
              <td class="text-dark"> <b>Dr.M.Karthikeyan</b><br>
                Professor, <br>
                School of Civil Engineering, <br>
                Vignan University, <br> Guntur
                Andhra Pradesh <br>

              </td>
            </tr>
          </tbody>
        </table>


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