<?php

include "../config/db_config.php";

session_start();

error_reporting(0);

if (!isset($_SESSION["admin_id"])) {
  header("Location: ../index.html");
}


if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $delete = "DELETE FROM upload_pdf WHERE id='$id'";
  $result = mysqli_query($conn, $delete);
}



$sql = "SELECT * FROM upload_pdf";
$result = mysqli_query($conn, $sql);

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
</head>

<body>

  <nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse align" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" id="link" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="pages/upload.php">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="pages/admin.php">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="pages/reupload.php">Reupload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../../pages/index.php">Issues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../pages/contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>





  <div class="align-1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
        <?php include "../pages/component/index.php"; ?> 
        </div>
        </div>
        <div class="col-sm-8">
          <div class="container">
            <div class="table-responsive">
              <table class="table ">
                <thead class="active">
                  <tr class="text-light">
                    <th>S.NO</th>
                    <th>Article</th>
                    <th>EDIT MENU</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>";
                    echo "<p>".$row['title']."</p>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='upload/files/".$row['upload_file']."' class='btn btn-primary'><i class='fa fa-download text-light' aria-hidden='true'></i></a>";
                    echo "<a href='index.php?id=".$row['id']."' class='btn btn-danger'><i class='fa fa-trash text-light' aria-hidden='true'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                  }
                  ?>
                  
                </tbody>
              </table>


            </div>
          </div>
        </div>
      </div>












</body>

</html>
