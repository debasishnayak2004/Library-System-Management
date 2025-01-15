<?php
include("connection.php");
session_start();
if(!isset($_SESSION["user_email"])){
  header("location: login.php");
}
$email = $_SESSION["user_email"];
$sql = "select * from `user` where email =  '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
    <div class="container py-5" style="height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-6 form-container">
                <h1 class="text-center py-3">Profile Update</h1>
                <form action="user_profile_update_action.php" method="POST">
                <input type="hidden" name="id" class="form-control" id="id"  value="<?php echo $row["id"];  ?>">
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Full Name :</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your full name" value="<?php echo $row["name"];  ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="studentEmail" class="form-label">Email Address :</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $row["email"];  ?>" placeholder="Enter your email" required>
                    </div>

                    

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number :</label>
                        <input type="tel" class="form-control" name="phone" id="phone" value="<?php echo $row["phone"];  ?>" placeholder="Enter your phone number" >
                    </div>

                    <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo ($row['gender'] == 'male') ? 'checked' : '';  ?> required>
                              <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">                                                
                              <input class="form-check-input" type="radio" name="gender" id="female"  value="female" <?php echo ($row['gender'] == 'female') ? 'checked' : '';  ?> required>
                              <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="other" value="other" <?php echo ($row['gender'] == 'other') ? 'checked' : '';  ?> required>
                              <label class="form-check-label" for="other">Other</label>
                            </div>
                          </div>

                    <!-- <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="termsCheck" required>
                        <label class="form-check-label" for="termsCheck">I agree to the terms and conditions.</label>
                    </div> -->

                    <button type="submit" class="btn btn-primary w-100 my-3">Update</button>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
