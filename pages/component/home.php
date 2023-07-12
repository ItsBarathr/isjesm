<?php

include "../../config/db_config.php";

error_reporting(0);


$sql = "SELECT * FROM upload_pdf";
$result = mysqli_query($conn, $sql);


$curr_year = date("Y");
$curr_mon = date("m");


?>

<style>
  * {
    text-decoration: none;
  }
</style>

<h5 class="d-inline">
  For Authors
</h5>
<hr>
<div class="content">
  <h6><a class="text-light" style="text-decoration: none;" href="pages/journal.html">Instructions for authors</a></h6>
  <h6><a class="text-light" style="text-decoration: none;" href="pages/manuscript.php">Submit Manuscript</a></h6>
  <h6><a class="text-light" style="text-decoration: none;" href="pages/aim&scope.php">Aim & Scope</a></h6>
  <h6><a class="text-light" style="text-decoration: none;" href="pages/processcharge.php">Process charge</a></h6>
  <h6><a class="text-light" style="text-decoration: none;" href="doc/template/Manuscript Publication Format_IJESMR.docx">Manuscript template</a></h6>
  <h6><a class="text-light" style="text-decoration: none;" href="doc/template/Copyright agreement Form.docx">Copyright agreement</a></h6><br>
</div>
<h5 class="d-inline">
  Volume
</h5>
<hr>
<div class="content-2">
  <?php
  while ($row1 = mysqli_fetch_assoc($result)) {
    $vol = $row1['volume'];
    $issue = $row1['issue'];

    if ($vol >= $curr_year) {

      // while ($issue == $curr_mon) {
      echo "<a href='pages/article.php?volume=" . $vol . " && issue=" . $issue . "'>Volume 1, Issue 9, September 2022</a>";
      //}
      echo "<br>";
    }
  }
  ?>
  <hr>
  
  <div class="card p-4 m-4 text-center">
    <h5 class="text-dark">
      Upload Article for this month
    </h5>
    <div>
      <a href="pages/manuscript.php" class="btn btn-primary text-light">Upload</a>
    </div>
  </div>
  
  
  <br><br>