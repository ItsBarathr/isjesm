<?php

include "../config/db_config.php";

session_start();

error_reporting(0);

if (!isset($_SESSION["admin_id"])) {
  header("Location: ../index.php");
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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/nav.css" rel="stylesheet">
  <title>Editer uploaded || isjesm</title>
  <!-- cdn links start -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>


  <!-- cdn link ends -->

  <style>
    * {
      text-decoration: none !important;
    }

    .sidenav-collapse {
      color: #3399ff;
      padding: 10px;
    }

    .sidenavbar {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #3399ff;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
      text-align: center;
    }

    .side-items {
      padding: 10px 20px;
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
      transition: 0.3s;
      margin-top: 1%;
    }

    .side-items {
      margin-left: 25%;
      margin-right: 25%;
    }

    .sidenavbar h1 {
      font-size: 28px;
      color: white;
      margin-left: 30%;
      margin-right: 30%;
    }

    .side-items:hover {
      color: #3399ff;
      background-color: white;
      border-radius: 6px;
    }

    .sidenavbar .close {
      position: absolute;
      top: 5px;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
      text-decoration: none;
      background-color: white !important;
      color: #3399ff !important;
      padding: 0 10px;
      border-radius: 6px;
    }

    .sidenavbar .close:hover {
      background-color: white;
      align-items: center;
      color: #3399ff;

    }

    @media screen and (max-height: 450px) {
      .sidenavbar {
        padding-top: 15px;
      }


      .sidenavbar a {
        font-size: 18px;
      }
    }


    @media screen and (max-width:940px) {

      .side-items {
        margin-left: 10%;
        margin-right: 10%;
      }
    }


    #data tr td {
      padding: 5px 10px;
    }


    .table table {
      margin-left: 5%;
      margin-right: 5%;
      width: 90%;
    }

    .table h1 {
      margin-left: 5%;
      color: #3399ff;
    }

    table tr {
      color: white;
      background-color: #006699 !important;
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












  <script>
    $(document).ready(function() {
      $('#data').after('<div id="nav"></div>');
      var rowsShown = 15;
      var rowsTotal = $('#data tbody tr').length;
      var numPages = rowsTotal / rowsShown;
      for (i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#nav').append('<span class="top"><a href="#" id="page"    rel="' + i + '">' + pageNum + '</a></span>');
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

  <!-- nav ends -->


  <div class="text-center">
    <h3>Editer upload</h3>
  </div>


  <div class="table" id="data">
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th> comment`s</th>
          <th>Email</th>
          <th>Download</th>
      </thead>
      </tr>
      <tbody>
        <?php

        $fatch_editer =  mysqli_query($conn, "SELECT * FROM upload_editer");

        while ($editer_list = mysqli_fetch_assoc($fatch_editer)) {
            

          echo "<tbody>";
          echo "<tr>";
          echo "<td  class='text-light'>" . $editer_list['title'] . "</td>";
          echo "<td  class='text-light'>" . $editer_list['comment'] . "</td>";
          echo "<td><a class='text-light' href='mailto:" . $editer_list['email'] . "?subject=ISJESM '>Mail</a></td>";
          echo "<td><a class='text-light' href='upload/reupload/".$editer_list['reupload']."'>Download</a></td>";
          echo "</tr>";
          echo "</tbody>";
        }
        ?>
      </tbody>
    </table>
    <br>

</body>

</html>