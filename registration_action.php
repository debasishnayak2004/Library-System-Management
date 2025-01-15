<?php
include("connection.php");
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["password"]) && isset($_POST["gender"])){
 if($_POST["password"] == $_POST["confirm_password"]){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $sql1 = "select email from `user` where email = '$email'";
    $res = mysqli_query($conn, $sql1);
    session_start();
    if(mysqli_num_rows($res) > 0){
        $_SESSION["error"] = "error";
        header("location: index.php");    
    }else{
        $sql = "insert into `user` (name, email, phone, gender, password) values ('$name', '$email', '$phone', '$gender', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $_SESSION["register"] = "register";
            header("location: login.php");
        } 
    }
 }
}

?>