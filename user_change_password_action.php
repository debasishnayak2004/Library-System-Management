<?php
session_start();
include("connection.php");
$newPass = $_POST["new_password"];
$oldPass = $_POST["old_password"];
$email = $_SESSION["user_email"];
$sql = "select * from `user` where email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row["password"] == $oldPass){
    $sql1 = "update `user` set password = '$newPass' where email = '$email'";
    mysqli_query($conn, $sql1);
    $_SESSION["user_pass"] = "user_pass";
    header("location: user_dashboard.php");
}else{
    $_SESSION["pass_error"] = "pass_error";
    header("location: user_Change_password.php");
}
?>