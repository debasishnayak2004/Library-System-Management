<?php
include("connection.php");
session_start();
if(!isset($_SESSION["email"])){
  header("location: login.php");
}
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "select * from `book` where id = $id";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Library Registration</title>
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
          <a class=" pl-4 py-1" href="catagory.php"  >Add Catagory</a>
        </div>
        <div id="demo2" class="collapse py-1">
          <a class=" pl-4" href="catagory_crud.php" >Manage Catagorys</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo4" href="#">Issued</a>
        <div id="demo4" class="collapse">
          <a class=" pl-4 py-1" href="issued.php"  >Books Issued</a>
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
    <marquee><h1>Welcome to the Library</h1></marquee>
        <div class="row justify-content-center">
            <div class="col-md-8 form-container  py-3">
                <h1 class="text-center ">Update Book</h1>
                <form action="update_book_crud_action.php" method="POST">
                <input type="hidden" name="id" class="form-control" id="id"  value="<?php echo $row1["id"]; ?>"  >
                    <div class="my-2">
                        <label for="studentName" class="form-label">Book Name :</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Book Name" value="<?php echo $row1["name"]; ?>"  required>
                    </div>
                    <div class="my-2">
                        <label for="studentName" class="form-label">Book Price :</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter Book Price" value="<?php echo $row1["price"]; ?>"  required>
                    </div>
                    <div class="my-2">
                        <label for="studentName" class="form-label">Book Number :</label>
                        <input type="number" name="book_no" class="form-control" id="book_no" placeholder="Enter Book Number" value="<?php echo $row1["book_no"]; ?>"  required>
                    </div>

                    <div class="form-group ">
                        <label for="inputState" class="mb-2">Choose Book Catagory</label>
                        <select id="inputState" name="cat_id" class="form-control" required>
                            <!-- <option selected>   --Selected--</option> -->
                            <?php
                            $sql = "select * from `catagory`";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){

                            ?>
                            <option <?php echo $row['id'] == $row1['cat_id'] ? "selected" : "" ?> value="<?php echo $row["id"]; ?>"><?php echo $row["catagory"];  ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>



                    <button type="submit" class="btn btn-primary w-100 my-3">Add Now</button>
                </form>
                
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
