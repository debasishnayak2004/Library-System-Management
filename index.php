
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Library Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
  session_start();
if(isset($_SESSION["error"]) && $_SESSION["error"] == "error"){
  echo "<script> alert('This Email Id Already Exists');   </script>";
  $_SESSION["error"] = "";
}
?>
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
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-6 form-container">
                <h1 class="text-center">Registration</h1>
                <form action="registration_action.php" method="POST">
                    <div class="mb-2">
                        <label for="studentName" class="form-label">Full Name :</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="mb-2">
                        <label for="studentEmail" class="form-label">Email Address :</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>

                    

                    <div class="mb-2">
                        <label for="phoneNumber" class="form-label">Phone Number :</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                              <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                              <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                              <label class="form-check-label" for="other">Other</label>
                            </div>
                          </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Confirm Password :</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter confirm password" required>
                    </div>

                    <!-- <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="termsCheck" required>
                        <label class="form-check-label" for="termsCheck">I agree to the terms and conditions.</label>
                    </div> -->

                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
                <div class="text-center pt-2">
                    <p>I have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
