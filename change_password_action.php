<?php
session_start();
include("connection.php");
$newPass = $_POST["new_password"];
$oldPass = $_POST["old_password"];
$email = $_SESSION["email"];
$sql = "select * from `user` where email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row["password"] == $oldPass){
    $sql1 = "update `user` set password = '$newPass' where email = '$email'";
    mysqli_query($conn, $sql1);
    header("location: admin_dashboard.php");
    $_SESSION["admin_pass"] = "password";
}else{
    $_SESSION["pass_error"] = "error";
    header("location: change_password.php");
    
}
?>