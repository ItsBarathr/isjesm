<?php

include 'config.php';

session_start();

if (isset($_SESSION["user_id"])) {
  header("Location: dashboard.php");
}

if (isset($_POST["resetPassword"])) {
  $password = mysqli_real_escape_string($conn, md5($_POST["new_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["cnew_password"]));
  if ($password === $cpassword) {
    $sql = "UPDATE users SET password='$password' WHERE token='{$_GET["token"]}'";
    mysqli_query($conn, $sql);
    header("Location: index.php");
  } else {
      echo "<script>alert('Password not matched.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/icon.png">
  <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="img/icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
  <link rel="canonical" href="https://refer4rich.com" />
  <meta name="description" content="Refer4Rich - A life time earning site gets through your platform, fully customized and trusted one.Being liable its an entertaining and earning platform. ">
  <meta property="og:title" content="Refer4Rich - The best refer and game play online earning site." />
  <meta property="og:description" content="Refer4Rich - A life time earning site gets through your platform, fully customized and trusted one.Being liable its an entertaining and earning platform." />
  <meta property="og:image" content="https://refer4rich.com/img/icon.png" />
  <meta property="og:url" content="https://refer4rich.com" />
  <meta property="og:type" content="website">
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="stylesheet" href="style.css" />
  <title>Refer4rich||Reset password</title>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M3SP56LBEV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-M3SP56LBEV');
</script>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">Reset Password</h2>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="New Password" name="new_password" value="<?php echo $_POST['new_password']; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm New Password" name="cnew_password" value="<?php echo $_POST['cnew_password']; ?>" required />
          </div>
          <input type="submit" value="Reset Password" name="resetPassword" class="btn solid" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Reset Password ?</h3>
          <p>
            Now you can reset the password.
          </p>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="app.js"></script>
</body>

</html>