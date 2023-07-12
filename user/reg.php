<?php

include "../config/db_config.php";

session_start();

error_reporting(0);

require 'PHPMailerAutoload.php';


$msg = "";

if (isset($_POST["signup"])) {
  $username = $_POST["user_name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $con_password = $_POST["con_password"];
  $id = rand(0000, 9999);
  $user_id = $username . $id;
  $user_role = "Author";

  $check_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_name='$username' AND email='$email' AND password='$password'"));

  $check_user_name = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_name='$username'"));

  if ($check_user_name > 0) {
    $msg = "User name is already exists!!! <br>";
  } elseif ($check_user > 0) {
    $msg = "Account is already exists!!! <br>";
  } elseif ($password != $con_password) {
    $msg = "Password not match it. <br>";
  } else {

    $insert = mysqli_query($conn, "INSERT INTO user(user_name, user_id, user_role, email, password, status) VALUE ('$username', '$user_id', '$user_role', '$email', '$password', '0')");

    if ($insert) {

      $mail = new PHPMailer;

      //$mail->SMTPDebug = 4;                               // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'support@isjesm.com';                 // SMTP username
      $mail->Password = 'Isjesm2022@';                           // SMTP password
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // TCP port to connect to

      $mail->setFrom($my_email, 'ISJESM');
      $mail->addAddress($email, $username);     // Add a recipient
      //$mail->addAddress('ellen@example.com');               // Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      $mail->addAttachment('../doc/template/Manuscript Publication Format_IJESMR.docx');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Email verification';
      $mail->Body    = " <p><strong>Dear {$username},</strong></p>
      <p>Thanks for registration! Verify your email to access our website. Click below link to verify your email.</p>
      <p><a href='{$base_url}verify-email.php?user_id={$user_id}'>Verify Email</a></p>";
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if (!$mail->send()) {
        echo "<script>alert('Mail not sent. Please try again.');</script>";
      } else {
        echo "<script>alert('Mail is sending...');</script>";
        echo "<script>alert('We have sent a verification link will be sent within 5 minute to your email.Check it out in important menu your mail  - {$email}.');</script>";
      }
    } else {
      echo "<script>alert('Your account registered unsuccessfully, try one more time');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/home.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
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
            <a class="nav-link text-light " href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="../pages/journal.php">About journal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="../pages/author.php">Guidelines</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="../pages/edit.php">Editorial Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="../pages/index.php">Issues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light " href="../pages/contact.php">Contact</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- nav end -->
  <br><br><br>

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

        <div class="container">

          <div class="card p-3 m-6 col-sm-5 mx-auto d-block" style="width: 80%;">
            <div class="container mt-3">
              <p class="text-center text-danger"><?php echo $msg; ?></p>
              <div class="text-center">
                <h2 class="heading">Registration Form</h2>
              </div>
              <form action="" method="post">
                <div class="mb-3 mt-3">
                  <label for="email">User name<span style="color:red;">*</span></label>
                  <input type="text" class="form-control" name="user_name" placeholder="User name" required>
                </div>
                <div class="mb-3 mt-3">
                  <label for="email">Email <span style="color:red;">*</span></label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                  <label for="pwd">Password <span style="color:red;">*</span></label>
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="mb-3">
                  <label for="pwd"> Confirm password <span style="color:red;">*</span></label>
                  <input type="password" class="form-control" placeholder="Confirm password" name="con_password" required>
                </div>
                <p>I have account <a href="index.php">Sign in</a></p>
                <div class="text-center">
                  <input type="submit" value="Sign up" name="signup" class="btn btn-success">
                </div>
              </form>
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
              <a href="mailto:support@isjesm.com?Subject=Request for reviwer" class="text-white text-decoration-none">Change User role</a>
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