<?php
include("connection.php");
$id = $_GET["id"];
$sql = "delete  from `user` where id = $id";
$result = mysqli_query($conn, $sql);
session_start();
if($result){
    $_SESSION["student_delete"] = "student_delete";
    header("location: manage_stdunts_crud.php");
}
?>