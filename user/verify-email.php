<?php

session_start();
if (isset($_GET["token"])) {
    include 'config.php';
    $sql = "UPDATE user SET status='1' WHERE user_id='{$_GET["user_id"]}'";
    mysqli_query($conn, $sql);
    
    $showUserId = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM user WHERE user_id='{$_GET["user_id"]}'"));
    $_SESSION["users_id"] = $showUserId['id'];
    header("Location: profile.php");
} else {
    header("Location: index.php");
}

?>