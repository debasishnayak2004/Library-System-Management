<?php
include("connection.php");
session_start();
if(!isset($_SESSION["user_email"])){
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Library Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url(https://plus.unsplash.com/premium_photo-1703701579660-8481915a7991?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D) no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(5px);
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 0px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container pt-5" style="height: 100vh;">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 form-container  mt-5">
                <h1 class="text-center py-3">Change Password</h1>
                <form action="user_change_password_action.php" method="POST">
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Old Password :</label>
                        <input type="text" name="old_password" class="form-control" id="old_password" placeholder="Enter Old Password"  required>
                    </div>

                    <div class="mb-3">
                        <label for="studentEmail" class="form-label">New Password :</label>
                        <input type="text" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 my-3">Change Now</button>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php
if(isset($_SESSION["pass_error"]) && $_SESSION["pass_error"] == "pass_error"){
  echo "<script> alert('Please Enter Correct Password');   </script>";
  $_SESSION["pass_error"] = "";
}
?>
</body>
</html>
