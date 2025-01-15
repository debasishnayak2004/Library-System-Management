<?php
include("connection.php");
if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
 $sql = "select * from `user` where email = '$email' && password = '$password'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 session_start();
 if(mysqli_num_rows($result) > 0 && $row["roll"] == 1){
  $_SESSION["admin_login"] = "admin_login";
    header("location: admin_dashboard.php");
    $_SESSION["name"] = $row["name"];
    $_SESSION["email"] = $email;
 }
 if(mysqli_num_rows($result) > 0 && $row["roll"] == 0){
   header("location: user_dashboard.php");
   $_SESSION["user_id"] = $row["id"];
   $_SESSION["user_name"] = $row["name"];
   $_SESSION["user_email"] = $email;
 }
 else{
  $_SESSION["email_error"] = "error";
 }
 if(isset($_SESSION["email_error"]) && $_SESSION["email_error"] == "error"){
  echo "<script> alert(' Invalid Email Id');   </script>";
  $_SESSION["email_error"] = "";
}
}
?>