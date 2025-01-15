<?php
include("connection.php");
session_start();
if(!isset($_SESSION["email"])){
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Library Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .sidebar {
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      width: 250px;
      background-color: #343a40;
      color: #fff;
      padding-top: 20px;
    }

    .sidebar .nav-link {
      color: #ccc;
    }

    .sidebar .nav-link:hover {
      color: #fff;
    }

    .content {
      margin-left: 250px;
      padding: 10px;
    }
    .info ul{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        padding: 10px;
    }
    .info ul li{
        list-style-type: none;
        
    }
    .collapse:hover{
      background-color: white;
    }
    .collapse:hover a{
      color: black;
    }
    .collapse a{
      text-decoration: none;
      color: yellow;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h3 class="text-center">Library</h3>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo" href="#">Students</a>
        <div id="demo" class="collapse">
          <a class=" pl-4 py-1" href="add_student.php"  >Add Students</a>
        </div>
        <div id="demo" class="collapse py-1">
          <a class=" pl-4" href="manage_stdunts_crud.php" >Manage Students</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo1" href="#">Books</a>
        <div id="demo1" class="collapse">
          <a class=" pl-4 py-1" href="book.php"  >Add Books</a>
        </div>
        <div id="demo1" class="collapse py-1">
          <a class=" pl-4" href="book_crud.php" >Manage Books</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo2" href="#">Catagorys</a>
        <div id="demo2" class="collapse">
          <a class=" pl-4 py-1" href="catagory.php"   >Add Catagory</a>
        </div>
        <div id="demo2" class="collapse py-1">
          <a class=" pl-4" href="catagory_crud.php"  >Manage Catagorys</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo4" href="#">Issued</a>
        <div id="demo4" class="collapse">
          <a class=" pl-4 py-1" href="issued.php"   >Books Issued</a>
        </div>
        <div id="demo4" class="collapse py-1">
        <a class=" pl-4" href="issued_crud.php"  >Manage Issued Books</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" data-target="#demo5" href="#">Not Returned</a>
        <div id="demo5" class="collapse">
          <a class=" pl-4 py-1" href="not_returned.php"   > Add Books Not Returned</a>
        </div>
        <div id="demo5" class="collapse py-1">
        <a class=" pl-4" href="not_returned_crud.php"  >Manage Books Not Returned</a>
        </div>
      </li>
      
    </ul>
  </div>

  <div class="content">
    <div class="container">
        <div class=" info  bg-light navbar-light">
        <ul>
            <li>
              <?php
                if(isset($_SESSION["name"])){
                  echo $_SESSION["name"];
                }
              ?>
            </li>
            <li>
            <?php
                if(isset($_SESSION["email"])){
                  echo $_SESSION["email"];
                }
              ?>
            </li>
            <li>
            <div style="display: flex; flex-wrap: wrap;">
            <div class="dropdown mr-4">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Profile</button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile_update.php">Update Profile</a>
                    <a class="dropdown-item" href="Change_password.php">Change Password</a>
                  </div>
                </div>
            <div>
            <a href="logout.php"><button class="btn btn-success">Logout</button></a>
            </div>
            </div>
            </li>
        </ul>
        </div>
    </div>
  </div>
  <div class="content">
    <div class="container">
      <!-- <h1 class="text-center">Welcome to the Library</h1> -->
      <marquee><h1>Welcome to the Library</h1></marquee>
      <div class="row">
        <div class="col-md-4 pt-4">
            <?php
                $sql = "select * from `user` where roll = 0";
                $result = mysqli_query($conn, $sql);
                $studentsNo = 0;
                while($row = mysqli_fetch_assoc($result)){
                  $studentsNo++;
                }
            ?>
            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="card-header text-center">Registered Students</div>
                <div class="card-body text-center">No of total students: <?php echo $studentsNo; ?></div>
                <div class="card-footer text-center"><a href="stdunts_info.php"><button class="btn btn-primary" type="submit">View All Students</button></a></div>
            </div>
        </div>
        <?php
                $sql = "select * from `book`";
                $result = mysqli_query($conn, $sql);
                $bookNo = 0;
                while($row = mysqli_fetch_assoc($result)){
                  $bookNo++;
                }
            ?>
        <div class="col-md-4 pt-4">
            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="card-header text-center">Total Books</div>
                <div class="card-body text-center">No of total Books: <?php echo $bookNo;  ?></div>
                 <div class="card-footer text-center"><a href="book_info.php"><button class="btn btn-success" type="submit">View All Books</button></a></div>
            </div>
        </div>
        <div class="col-md-4 pt-4">
        <?php
                $sql = "select * from `catagory`";
                $result = mysqli_query($conn, $sql);
                $catagoryNo = 0;
                while($row = mysqli_fetch_assoc($result)){
                  $catagoryNo++;
                }
            ?>
            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="card-header text-center">Books Catagorys</div>
                <div class="card-body text-center">No of Books Catagorys: <?php echo $catagoryNo;  ?></div>
                <div class="card-footer text-center"><a href="catagory_info.php"><button class="btn btn-warning" type="submit">View All Catagorys</button></a></div>
            </div>
        </div>
        <?php
                $sql = "select * from `issued`";
                $result = mysqli_query($conn, $sql);
                $issuedNo = 0;
                while($row = mysqli_fetch_assoc($result)){
                  $issuedNo++;
                }
            ?>
        <div class="col-md-4 pt-4">
            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="card-header text-center">Books Issued</div>
                <div class="card-body text-center">No of Issued Books: <?php echo $issuedNo;  ?></div>
                <div class="card-footer text-center"><a href="issued_info.php"><button class="btn btn-info" type="submit">View All Issued Books</button></a></div>
            </div>
        </div>
        <div class="col-md-4 pt-4">
        <?php
                $sql = "select * from `returned` where status = 'Not Returned'";
                $result = mysqli_query($conn, $sql);
                $returnedNo = 0;
                while($row = mysqli_fetch_assoc($result)){
                  $returnedNo++;
                }
            ?>
            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="card-header text-center">Books Not Returned</div>
                <div class="card-body text-center">No of Books Not Returned: <?php echo $returnedNo;  ?></div>
                <div class="card-footer text-center"><a href="returned_info.php"><button class="btn btn-danger" type="submit">View Not Returned Books</button></a></div>
                
            </div>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
if(isset($_SESSION["admin_pass"]) && $_SESSION["admin_pass"] == "password"){
  echo "<script> alert('Your Password Update Success');   </script>";
  $_SESSION["admin_pass"] = "";
}
if(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] == "admin_login"){
  echo "<script> alert('Login Successfull');   </script>";
  $_SESSION["admin_login"] = "";
}
if(isset($_SESSION["profile"]) && $_SESSION["profile"] == "profile"){
  echo "<script> alert('Your Profile Update Successfull');   </script>";
  $_SESSION["profile"] = "";
}
?>
</body>
</html>
