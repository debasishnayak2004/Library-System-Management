<?php
session_start();
if(isset($_SESSION["user_email"])){
    session_destroy();
    session_unset();
    header("location: login.php");
}
?>