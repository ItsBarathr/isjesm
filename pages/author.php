<?php


include "../config/db_config.php";

error_reporting(0);



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Author Guidelines</title>
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
  <br><br>




  <div class="align-1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
          <?php include "component/index.php"; ?>
        </div>
      </div>
      <div class="col-sm-8">

        <br><br>
        <h2 class="sub">Author Guidelines</h2>
        <br>
        <div class="text-dark">ISJESM is a monthly journal. All of the selected papers are made available online,
          together with
          information on the
          issue in which they were published. <br>The author's name, email address, phone number, and abstract should
          all be included in the manuscript. We
          will not
          process the manuscript unless the author information is provided. Please submit the Manuscript as a
          Microsoft Word document in the following format.
          <br><br>
          <h3>ISJESM Paper Format (Paper Template)</h3>
          <p class="text-dark">
            <ol class="text-dark">1.When an article is submitted to ISJESM, it is understood that it is not being
            considered for publication
            in other
            journals. <br><br> 2.When a manuscript is accepted, the authors are notified that they must submit an
            ISJESM Copyright Form
            (click here
            to download) and grant ISJESM copyright to the paper. If the author wants to use copyrighted content, he
            or
            she must
            first obtain permission. <br> <br> 3.All papers have been peer-reviewed and acknowledged. They will not be
            returned once they have been
            approved. If
            any of the authors desires a copy, they can either download it from the ISJESM website or contact the
            editor
            through
            email. <br><br> 4.Strictly speaking, the paper must be submitted in the format indicated. If you have
            trouble downloading
            the
            prescribed format, you can create your own. However, the final paper must be submitted in the format
            specified. <br><br> 5.A paper will be reviewed within a week.
            <br><br> 6.Don't forget to check out our Frequently Asked Questions area before sending us your
            manuscript.
            <br><br>7.The manuscript must be written in Times New Roman 12 font with one space. <br><br> 8.The
            following sections should be included in the text: abstract, key words, introduction, material and
            methods, and conclusion. Results and conclusions, Acknowledgements, and References are all included in the
            report.
            <br><br> 9.Manuscripts must be submitted exclusively by email. <br><br> 10.The Editorial Board maintains
            the right to edit or condense the research piece if necessary. <br><br> 11.The authors,either the Editor nor
            the Publisher,are responsible for the content. <br>
            <br> 12.References must be typed in following order: Surname Name (Year), Journal Name, Vol. Issue, Page
            No.(or Name
            of book, Publisher, Edition, Page No). <br><br> 13.Policy of Plagiarism.
            <br><br>
            14.Papers submitted to the ISJESM journal will be assessed for plagiarism using the plagiarism detection
            programmes
            CrossCheck/iThenticate/Turnitin. Aside from that, we use Copyscape to check for plagiarism. The ISJESM
            journal will
            reject papers without reviewing them if they contain plagiarism or self-plagiarism. <br><br>
            </ol>
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