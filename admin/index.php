<?php

include "../config/db_config.php";

session_start();

error_reporting(0);

if (!isset($_SESSION["admin_id"])) {
    header("Location: ../index.php");
}


if (isset($_POST['check'])) {

    $email = $_POST['email'];
    $uname = $_POST['uname'];


    $fatch_user =  mysqli_query($conn, "SELECT * FROM user where email='$email' and user_name='$uname'");

    if (mysqli_num_rows($fatch_user) > 0) {
        $row_list_user = mysqli_fetch_assoc($fatch_user);

        $email1 = $row_list_user['email'];
        $u_name = $row_list_user['user_name'];
        $role = $row_list_user['user_role'];
    }
    // echo "<script>alert('1');</script>";
}

if (isset($_POST['update'])) {

    $email2 = $_POST['email'];
    $uname2 = $_POST['uname'];
    $role2 = $_POST['role'];


    $check_user = mysqli_query($conn, "SELECT * FROM user WHERE email='$email2'");

    if (mysqli_num_rows($check_user) > 0) {
        $update = mysqli_query($conn, "UPDATE user set user_role='$role2' WHERE email='$email2'");

        if ($update) {
            echo "<script>alert(" . $email2 . "'user role is changed.');</script>";
        } else {
            echo "<script>alert(" . $email2 . "'user role isn`t changed,try again!!!');</script>";
        }
    }
    // echo "<script>alert('1');</script>";
}




// if (isset($_GET['id'])) {
//     $id = $_GET['id'];

//     $delete = "DELETE FROM upload_pdf WHERE id='$id'";
//     $result = mysqli_query($conn, $delete);
// }



// $sql = "SELECT * FROM upload_pdf";
// $result = mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin article management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/nav.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <a class="nav-link" id="link" href="pages/upload.php">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link" href="pages/admin.php">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link" href="editortable.php">Editer upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link" href="editer_list.php">Editer list</a>
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

    



    <div class="container">
        <div class="text-center text-dark">
            <h4>
                <h2>0</h2>Total article
            </h4>
        </div>
        <div class="container">
            <div class="table" id="data1">
                <h2>Reviewer info</h2>
                <table>
                    <thead style="background-color: #006699; color: #fff;">
                        <tr style="color: #fff;">
                            <th class="text-light">Username</th>
                            <th class="text-light">User role</th>
                            <th class="text-light">Email</th>
                            <th class="text-light">Department</th>
                            <th class="text-light">Pincode</th>
                            <th class="text-light">Designation</th>
                    </thead>
                    </tr>

                    <?php

                    $fatch_reviwer =  mysqli_query($conn, "SELECT * FROM user where user_role='Reviewer'");

                    while ($reviwer_list = mysqli_fetch_assoc($fatch_reviwer)) {
                        

                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td  class='text-dark'>" . $reviwer_list['user_name'] . "</td>";
                        echo "<td  class='text-dark'>" . $reviwer_list['user_role'] . "</td>";
                        echo "<td><a href='mailto:" . $reviwer_list['email'] . "?subject=ISJESM '>Mail</a></td>";
                        echo "<td  class='text-dark'>" . $reviwer_list['department'] . "</td>";
                        echo "<td  class='text-dark'>" . $reviwer_list['pin_code'] . "</td>";
                        echo "<td  class='text-dark'>" . $reviwer_list['dest'] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                    }
                    ?>

                </table>
                <br>

            </div>



            <script>
                $(document).ready(function() {
                    $('#data1').after('<div id="nav"></div>');
                    var rowsShown = 10;
                    var rowsTotal = $('#data1 tbody tr').length;
                    var numPages = rowsTotal / rowsShown;
                    for (i = 0; i < numPages; i++) {
                        var pageNum = i + 1;
                        $('#nav').append('<span class="top"><a href="#" id="page" rel="' + i + '">' + pageNum + '</a></span>');
                    }
                    $('#data1 tbody tr').hide();
                    $('#data1 tbody tr').slice(0, rowsShown).show();
                    $('#nav a:first').addClass('active');
                    $('#nav a').bind('click', function() {

                        $('#nav a').removeClass('active');
                        $(this).addClass('active');
                        var currPage = $(this).attr('rel');
                        var startItem = currPage * rowsShown;
                        var endItem = startItem + rowsShown;
                        $('#data1 tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
                        css('display', 'table-row').animate({
                            opacity: 1
                        }, 300);
                        $('#pageNum').css('background-color', 'blue');
                    });
                });
            </script>






        </div>




        <div class="align-1">
            <div class="container-fluid">

                <div class="col-sm-5     mx-auto d-block">
                    <div class="card p-4">
                        <div class="text-center">
                            <h3 class="text-dark">Edit user role</h3>
                        </div>
                        <div class="form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter user email" value="<?php echo $email1; ?>" required>
                                </div><br>
                                <div class="form-group">
                                    <input type="text" name="uname" class="form-control" placeholder="Enter user name" value="<?php echo $u_name; ?>" required>
                                </div><br>
                                <div class="form-group">
                                    <input type="text" name="role" class="form-control" placeholder="Enter user role" value="<?php echo $role; ?>">
                                </div><br>
                                <input type="submit" value="Check" class="btn btn-primary" name="check">
                                <input type="submit" value="Update" class="btn btn-success" name="update">
                            </form>
                        </div>
                    </div>
                </div>
                <br><br><br>







                <div class="container">
                    <div class="table" id="data">
                        <h2>User info</h2>
                        <table>
                            <thead style="background-color: #006699; color: #fff;">
                                <tr style="color: #fff;">
                                    <th class="text-light">S.no</th>
                                    <th class="text-light">Username</th>
                                    <th class="text-light">User id</th>
                                    <th class="text-light">User role</th>
                                    <th class="text-light">Email</th>
                                    <th class="text-light">firstname</th>
                                    <th class="text-light">Department</th>
                                    <th class="text-light">Organisation</th>
                                    <th class="text-light">Country</th>
                                    <th class="text-light">Pincode</th>
                                    <th class="text-light">Designation</th>
                            </thead>
                            </tr>

                            <?php

                            $fatch_article =  mysqli_query($conn, "SELECT * FROM user;");

                            while($row_list = mysqli_fetch_assoc($fatch_article)) {
                                

                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td class='text-dark'>" . $row_list['id'] . "</td>";
                                echo "<td  class='text-dark'>" . $row_list['user_name'] . "</td>";
                                echo "<td  class='text-dark'>" . $row_list['user_id'] . "</td>";
                                echo "<td  class='text-dark'>" . $row_list['user_role'] . "</td>";
                                echo "<td><a href='mailto:" . $row_list['email'] . "?subject=ISJESM '>Mail</a></td>";
                                echo "<td  class='text-dark'>" . $row_list['first_name'] . "</td>";
                                echo "<td  class='text-dark'>" . $row_list['department'] . "</td>";
                                echo "<td  class='text-dark'>" . $row_list['organisation'] . "</td>";
                                echo "<td  class='text-dark'>" . $row_list['country'] . "</td>";
                                echo "<td  class='text-dark'>" . $row_list['pin_code'] . "</td>";
                                echo "<td  class='text-dark'>" . $row_list['dest'] . "</td>";
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
</body>

</html>