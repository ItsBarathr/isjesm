<?php

include "../config/db_config.php";

session_start();

error_reporting(0);

if (!isset($_SESSION["users_id"])) {
    header("Location: index.php");
}

$id = $_SESSION["users_id"];

$fatch =  mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");

if (mysqli_num_rows($fatch) > 0) {
    $row1 = mysqli_fetch_assoc($fatch);

    $email = $row1['email'];
}



$count = mysqli_num_rows(mysqli_query($conn, "SELECT count(topic) FROM upload_script WHERE email='$email'"));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile || ISJESM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/home.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

    <style>
        * {
            text-decoration: none !important;
            padding: 0;
            margin: 0;
        }

        #data tr td {
            padding: 5px 10px;
        }


        .dropdown-menu li {
            padding: 5px 10px;
        }

        .dropdown-menu {
            border: none !important;
        }

        .content h2 {
            color: #3399ff;
        }

        .content {
            margin-left: 5%;
        }


        .content p {
            font-size: 16px;
            color: #3399ff !important;
            padding-bottom: 5px;
            font-weight: 500;
        }

        .text {
            padding-left: 10px;
        }

        .content p span {
            font-size: 30px;
            padding-right: 2px;
            font-weight: 500;
        }

        .table table {
            margin-left: 5%;
            margin-right: 5%;
            width: 90%;
        }

        .table h2 {
            margin-left: 5%;
            color: #3399ff;
        }

        table tr {
            color: #006699;
        }

        table tr th {
            padding: 5px;
        }

        table {
            border: 1px solid #3399ff;
        }

        #page {
            background-color: #3399ff;
            color: white;
            padding: 10px;
            border-radius: 6px;
        }

        #page:hover {
            background-color: #006699;
            color: white;
        }

        .top {
            padding: 5px;
        }

        .btn-1 {
            padding: 0;
            margin: 0;
            border: none;
            outline: none;
            width: 100%;
        }
    </style>

</head>

<body>
    <!-- nav start -->
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
                        <a class="nav-link text-light" href="../pages/journal.php">About journal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../pages/author.php">Guidelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="info.php">Author info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../pages/index.php">Issues</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../pages/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- nav end -->
    <br>
    <!--logo end  -->
    <div class="align-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <?php include "../pages/component/login.php"; ?>
                </div>
            </div>
            <div class="col-sm-8">
                <br><br><br>

                <div class="">
                    <div class="contant">
                        <h2 id="published" class="text-primary">Published</h2>
                        <div class="text">
                            <h5 class="text-primary"><span><?php echo $count; ?> </span>Articles</h5>
                            <a href="../pages/manuscript.php" class="btn btn-primary"><i class="fa-solid fa-file-arrow-up"></i> Upload</a>
                        </div>
                    </div>
                    <br>
                    <div class="table" id="data">
                        <h2>Articles</h2>
                        <table>
                            <thead style="background-color: #006699; color: #fff;">
                                <tr style="color: #fff;">
                                    <th>Topic</th>
                                    <th>Title</th>
                                    <th>Paper</th>
                            </thead>
                            </tr>

                            <?php

                            $fatch_article =  mysqli_query($conn, "SELECT * FROM upload_script WHERE email='$email'");

                            if (mysqli_num_rows($fatch_article) > 0) {
                                $row_list = mysqli_fetch_assoc($fatch_article);

                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $row_list['topic'] . "</td>";
                                echo "<td>" . $row_list['title'] . "</td>";
                                echo "<td>" . $row_list['paper'] . "</td>";
                                echo "</tr>";
                                echo "</tbody>";
                            }
                            ?>

                        </table>
                        <br>

                    </div>



                    <script>
                        $(document).ready(function() {
                            $('#data').after('<div id="nav"></div>');
                            var rowsShown = 10;
                            var rowsTotal = $('#data tbody tr').length;
                            var numPages = rowsTotal / rowsShown;
                            for (i = 0; i < numPages; i++) {
                                var pageNum = i + 1;
                                $('#nav').append('<span class="top"><a href="#" id="page" rel="' + i + '">' + pageNum + '</a></span>');
                            }
                            $('#data tbody tr').hide();
                            $('#data tbody tr').slice(0, rowsShown).show();
                            $('#nav a:first').addClass('active');
                            $('#nav a').bind('click', function() {

                                $('#nav a').removeClass('active');
                                $(this).addClass('active');
                                var currPage = $(this).attr('rel');
                                var startItem = currPage * rowsShown;
                                var endItem = startItem + rowsShown;
                                $('#data tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
                                css('display', 'table-row').animate({
                                    opacity: 1
                                }, 300);
                                $('#pageNum').css('background-color', 'blue');
                            });
                        });
                    </script>



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
                            <a href="../pages/manuscript.php" class="text-white text-decoration-none">Submit article</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                    <h5 class="text-uppercase"></h5>
                    <ul class="list-unstyled mb-0 text-decoration-none">
                        <li>
                            <a href="index.php" class="text-white text-decoration-none">Sign in</a>
                        </li>

                        <li>
                            <a href="../pages/index.php" class="text-white text-decoration-none">Issues</a>
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
                            <a href="../pages/edit.php" class="text-white text-decoration-none">Editorial</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text-white text-decoration-none" href="https://feeyoh.com/">Feeyoh.com</a>
        </div>
    </div>


</body>

</html>