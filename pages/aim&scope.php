<?php


include "../config/db_config.php";

error_reporting(0);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Aim & Scope || ISJESM</title>
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

 <!---navigation bar ends-->
       
        <br>
        <br>
        <div class="container">
        <div style="text-align:center;">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
          <h2 class="logo">Processing Charges </h2>
          <div class=" container col text-dark mx-auto py-3 text-dark " style="text-align: justify">
         <p ><h3>Aim & Scope</h3> 
We publish original research articles, reviews and short communication in all areas of Science, Engineering and Management are most welcome in for publication in the International Scientific Journal of Engineering Sciences and Management.
<h3>Multidisciplinary Journal covers all Subjects:</h3>
Physical Sciences and Engineering: Energy, Earth and Planetary Science, Mathematics, Computer Science, Physics and Astronomy, Engineering, Material Science, Statistics, Chemistry, Chemical Engineering and Management

<h3>Social Science and Humanities: </h3>
Arts and Humanities, Management, Tourism, Business Management, Hotel Management, Accounting, Decision Science, Political Science, Education, Economics, Law, Finance, Psychology, English Literature, Hindi Literature, Sanakrit Literature and History, etc.

<h3>Health Science: </h3>
Medicine and Dentistry, Nursing and Health Professions, Pharmacology and Toxicology, Pharmaceutical Science, Veterinary Science, Veterinary Medicine.

<h3>Life Sciences: </h3>
Ecology, Agricultural, Entomology, Biological Sciences, Genetics, Arachnology, Immunology and Microbiology, Neuroscience , Biotechnology, Limnology, Marine Biology, Biochemistry, Molecular Biology, Environmental Science, Conservation, Biodiversity and Ichthyology, Malacology.

<h2>TYPES OF RESEARCH PAPER</h2>
<h3>Original Articles:</h3>
These should describe new and carefully confirmed findings, and experimental methods should be given in sufficient detail for others to verify the work. The length of an original article is the minimum required to describe and interpret the work clearly.
Short Communications:
Short communication also contains abstract. The list of references must be there. The presentation of Short Communications should contain headings such as Introduction, Materials and Methods, Results and Discussion, etc.
<h3>Reviews Articles:</h3>
Submissions of review articles and perspectives covering topics of current interest are welcome and encouraged it is recommended to submit manuscripts in MS Word format through the email as an attachment 
Manuscript format should be in MS word only. Charts, Tables and Diagrams should be in MS Excel or MS Word and images in JPG format using maximum possible 100 dpi resolution. All the matter should be typed in Times New Roman Font size – 12 point with single spacing.
</p>
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