<?php

include "config/db_config.php";

error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>ISJESM</title>

    <style>
        .navbar-nav {
            text-align: center;
        }

        #link {
            font-size: 16px;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            border-radius: 10px;
            padding-left: 20px;
            padding-right: 20px;

        }

        .align ul {
            margin-left: 15%;
            margin-right: 15%;
        }

        .align ul li {
            padding-left: 20px;
            padding-right: 20px;
        }

        #link:hover {

            color: white;
            border-radius: 10px;
        }


        .head {
            text-align: center;
            color: #3399ff;
            font-size: 28px;
        }

        .head span {
            font-size: 18px;
            text-align: right;
        }


        .d-inline {
            background-color: #006699;
            color: white;
            padding: 5px;
            padding-right: 15px;
            padding-left: 15px;
            font-size: 16px;
            border-radius: 4px;
        }

        .content {
            margin-right: 10%;
            margin-left: 10%;
        }

        .cont h6 {
            text-align: center;
            background-color: #3399ff;
            color: #ffffff;
            padding: 5px;
            padding-right: 15px;
            padding-left: 15px;
            font-size: 16px;
            border-radius: 16px;
        }

        .cont a {
            text-decoration: none;
            color: white;
        }

        .cont a:hover {
            text-decoration: none;
            color: white;
        }

        .align-1 {
            margin-top: 2%;
        }

        .cont h6:hover {
            background-color: #006699;
            color: white;
        }

        .content-2 a {
            color: #3399ff;
            margin-right: 10%;
            margin-left: 10%;
        }

        .content-2 a:hover {
            color: #006699;
        }

        #accordionFlushExample {
            font-size: 16px;
        }

        .accordion-item h2 {
            font-size: 16px;
        }

        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        .content h6 {
            text-align: center;
            background-color: #3399ff;
            color: #ffffff;
            padding: 5px;
            padding-right: 15px;
            padding-left: 15px;
            font-size: 16px;
            border-radius: 16px;
        }

        .content h6:hover {
            background-color: #006699;
            color: white;
        }
    </style>



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
                        <a class="nav-link text-light" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="pages/journal.php">About journal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="pages/author.php">Guidelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="pages/edit.php">Editorial Board</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="pages/index.php">Issues</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="pages/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="user/index.php">Register/Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--logo -->
    <br><br><br><br>
    <div class="logo" style="text-align:center;margin-top: 1%;">
        <img src="img/logo.jpeg" style="height:100px;width:auto">
    </div>
    <div class="head">
        <br>
        <p><b>International Scientific Journal of Engineering Sciences and Management</b></p>
        <p><i> “ Fill your paper with the breathings of your heart ”</i> <br><span> -William Wordsworth</span></p>
        <div class="button">
            <a class="btn btn-primary" href="user/index.php">Touch</a>
        </div>
    </div>


    <br><br>
    <div style="height: 2px; width: 100%; background-color: #111;"></div>

    <!--logo end  -->
    <div class="align-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <?php include "pages/component/home.php";?>
                </div>
            </div>
            <div class="col-sm-8">
                <p class="para"><b>International Scientific Journal of Engineering Sciences and Management</b> follows
                    an open access publishing approach, in which the full text of all
                    peer-reviewed publications is freely available online without the need for a subscription or
                    registration.<br>To facilitate a quick turnaround in the peer review process, <b>ISJESM</b> uses a
                    paperless, electronic submission and evaluation system. Traditional and creative methods are used to
                    ensure fairness and transparency in the review process, such as allowing accepted paper reviewers to
                    reveal their identities and
                    write a brief comment with the article.<br>
                    The authors who wish to publish paper in IJRESM, are advised to read the publication process and
                    submit
                    paper for publication.<br>
                </p>

                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="col">Subject</th>
                            <td> All Academic Disciplines</td>
                        </tr>
                        <tr>
                            <th scope="row">Frequency</th>
                            <td>Monthly</td>
                        </tr>
                        <tr>
                            <th scope="row">Starting year</th>
                            <td>2022</td>
                        </tr>
                        <tr>
                            <th scope="row">Publication Format </th>
                            <td>Online</td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Decision on submitted manuscript</th>
                            <td>24 hours</td><br><br>
                        </tr>
                        <tr>
                            <th scope="row">Publication time</th>
                            <td>7 days</td>
                        </tr>
                        <tr>
                            <th scope="row">Publications Format </th>
                            <td>Online</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <button class="accordion"><b>How to Prepare a Paper from a Project/Research or Thesis?</b></button>
                <div class="panel">
                    <p>The basic structure of the paper should include, <br>

                    <ul>
                        <li> Title</li>
                        <li>Abstract</li>
                        <li>Keywords</li>
                        <li>Introduction</li>
                        <li>Literature survey</li>
                        <li>Methodology/Main work</li>
                        <li>Results and Discussion</li>
                        <li>Conclusion</li>
                        <li>References</li>
                        <li>After completing the project, you should write the methodology/main work.
                            Next, prepare the Results and Discussion section. In which you should analyze or elaborate
                            on the outcome
                            of the project.</li>
                        <li> Next, write the conclusion section, which will be generally written in the past tense.</li>
                        <li> Next, prepare the Introduction section. This should include a brief overview of the project
                            topic in
                            general. (For example: If your project analyzes the COVID spread prediction using Machine
                            Learning. The
                            introduction may be, How and where COVID has begun. Lockdown, Health issues, Economy, and so
                            on… This is a
                            general discussion on the topic). Note: This is just an idea. Introduction can be written in
                            different
                            ways.</li>
                        <li>As an undergraduate, the amount of literature survey done by the student is minimum. Hence,
                            if you have
                            done any study on the previous works related to your project work, you can include the
                            literature survey
                            section followed by the problem statement. </li>
                        <li>The next step is to prepare the abstract. The abstract is the brief version of your work.
                        </li>
                        <li>Then, select a meaningful title. For example, COVID spread prediction using Machine
                            Learning. A meaningful
                            title can be “A Study on COVID spread prediction using Machine Learning.” <br></li>
                        <li>References are the research articles you have studied, website links, textbooks you have
                            referred, etc.</li>
                        <li>The extended version of your paper will be your thesis.</li>
                        <li>The shorter version of your thesis will be your paper. (With the sections mentioned above).
                        </li>
                    </ul>
                    </p>

                </div>

                <button class="accordion"><b>How to publish project paper?</b></button>
                <div class="panel">
                    <ul>
                        <li> If you have completed your project/research work. The next step is to prepare a paper for
                            publication. Read
                            this article to know how to prepare a paper for publication. </li>

                        <li> After your paper is ready, then read the publication process of the paper publication
                            website (Read the
                            paper publication process) </li>

                        <li> Submit your paper and follow the steps of the publication process above, to publish paper.
                        </li>
                    </ul>
                </div>

                <button class="accordion"><b>How to publish a research paper?</b></button>
                <div class="panel">
                    <p>To publish a research paper, you should select a research paper publication site. Read the
                        publication
                        process of the journal and submit the paper. After submission, the paper will be reviewed. If
                        the paper is
                        accepted, your paper will be published. Sometimes it may be asked revise, then the author should
                        revise
                        and resubmit the paper.</p>
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
                            <a href="doc/template/Manuscript Publication Format_IJESMR.docx"
                                class="text-white text-decoration-none">Template</a>
                        </li>
                        <li>
                            <a href="pages/manuscript.php" class="text-white text-decoration-none">Submit article</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                    <h5 class="text-uppercase"></h5>

                    <ul class="list-unstyled mb-0 text-decoration-none">
                        <li>
                            <a href="user/index.php" class="text-white text-decoration-none">Sign in</a>
                        </li>

                        <li>
                            <a href="pages/index.php" class="text-white text-decoration-none">Issues</a>
                        </li>
                    </ul>
                </div>



                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                    <h5 class="text-uppercase mb-0"></h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="mailto:support@isjesm.com?Subject=Request for reviwer"
                                class="text-white text-decoration-none">Change User role</a>
                        </li>
                        <li>
                            <a href="pages/edit.php" class="text-white text-decoration-none">Editorial</a>
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
            acc[i].addEventListener("click", function () {
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