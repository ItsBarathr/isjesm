<?php


include "../../config/db_config.php";

session_start();

error_reporting();

if (!isset($_SESSION["admin_id"])) {
  header("Location: ../index.php");
}


if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $delete = "DELETE FROM upload_script WHERE id='$id'";
  $result = mysqli_query($conn, $delete);
}



if (isset($_POST['send'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $comment = $_POST['comment'];


  $check_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email='$email'"));
  if ($check_user > 0) {


    $mail = new PHPMailer;

    //$mail->SMTPDebug = 4;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'refer4rich@refer4rich.com';                 // SMTP username
    $mail->Password = 'Allpathmaker29';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom($my_email, 'ISJESM');
    $mail->addAddress($email, $username);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('../doc/template/Manuscript Publication Format_IJESMR.docx');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Article Comments || Isjesm';
    $mail->Body    = " <p><strong>Dear {$username},</strong></p>
    <p>{$comment}</p>
    <div class='text-center'>
    <a href='../../pages/resubmit.php?pages=resubmit' class='btn btn-primary'>Reupload here</a>
    </div>";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
      echo "<script>alert('Mail not sent. Please try again.');</script>";
    } else {
      echo "<script>alert('Mail is send {$email}');</script>";
    }
  } else {
    echo "<script>alert('Check mail id is not in the database!!!');</script>";
  }
}











$sql = "SELECT * FROM upload_script";
$result = mysqli_query($conn, $sql);




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Article upload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/nav.css" rel="stylesheet">
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
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" id="link" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="upload.php">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="admin.php">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../editortable.php">Editer upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../editer_list.php">Editer list</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../../pages/index.php">Issues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="link" href="../../user/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="align-1">
    <div class="container-fluid">
      <br><br>
      <div class="container">
        <div class="table-responsive text-center">
          <table class="table">
            <thead class="bg-primary text-light">
              <tr class="text-light">
                <th class="text-light">S.NO</th>
                <th class="text-light">User id</th>
                <th class="text-light">Username</th>
                <th class="text-light">Email</th>
                <th class="text-light">Title</th>
                <th class="text-light">Article paper</th>
                <th class="text-light">Article cv</th>
                <th class="text-light">Article statement</th>
                <th class="text-light">Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='text-dark'>" . $row['id'] . "</td>";
                echo "<td class='text-dark'>" . $row['user_id'] . "</td>";
                echo "<td class='text-dark'>" . $row['user_name'] . "</td>";
                echo "<td class='text-dark'>" . $row['email'] . "</td>";
                echo "<td class='text-dark'>" . $row['title'] . "</td>";
                echo "<td><a href='../upload/files/" . $row['paper'] . "'>Download</a></td>";
                echo "<td><a href='../upload/cv/" . $row['cv'] . "'>Download</a></td>";
                echo "<td><a href='../upload/statement/" . $row['statement'] . "'>Download</a></td>";
                echo " 
                    <td>
                      
                      <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#myModal'><i class='fa fa-comment text-light'></button>
                      <a href='admin.php?id=" . $row['id'] . "' class='btn btn-danger'><i class='fa fa-trash text-light'></i></a>
                    </td>";
                echo "</tr>";
              }
              ?>
              <tr>
            </tbody>
          </table>
          <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title text-dark">COMMENTS</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body  ">
                  <div class="container">
                    <form action="" method="post">
                      <div class="form-group">
                        <label for="usr" class="text-dark">Email</label>
                        <input type="email" class="form-control" id="mail" name="email" placeholder="Enter the user email" required>
                      </div>

                      <div class="form-group">
                        <label for="usr" class="text-dark">User name</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                      </div>

                      <div class="form-group">
                        <label for="comment" class="text-dark">Comment</label>
                        <textarea class="form-control" placeholder="Write something..." rows="5" id="comment" required name="comment"></textarea>
                      </div>
                      <br>
                      <input type="submit" value="Send" name="send" class="btn btn-primary">
                    </form>
                  </div>
                </div>
                <!--modal close-->
              </div>
            </div>
</body>

</html>