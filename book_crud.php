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
  <title>Responsive Table</title>
  <!-- Bootstrap CSS -->
  <link 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

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
<div class="container ">
<marquee><h1>Welcome to the Library</h1></marquee>
    <h2 class="text-center pb-4">All Books Information</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="myTable1">
        <thead class="thead-dark">
          <tr>
            <th>SL.No</th>
            <th>Books Name</th>
            <th>Books Price</th>
            <th>Books Number</th>
            <th>Books Catagory</th>
            <th>Created At</th>
            <th>Delete</th>
            <th>Update</th>
          </tr>
        </thead>
        <?php
        $sql = "select book.name, book.id as book_id, book.price, book.book_no, book.created_at, catagory.catagory from `book` left join `catagory` on book.cat_id = catagory.id";
        $result = mysqli_query($conn, $sql);
        $sl = 0;
        while($row = mysqli_fetch_assoc($result)){
            $sl++;
            // $_SESSION["students"] = $sl ;
        ?>
        <tr>
            <td><?php echo $sl;  ?></td>
            <td><?php echo $row["name"];  ?></td>
            <td><?php echo $row["price"];  ?></td>
            <td><?php echo $row["book_no"];  ?></td>
            <td><?php echo $row["catagory"];  ?></td>
            <td><?php echo $row["created_at"];  ?></td>
            <td><a href="delete_book_crud.php?id=<?php echo $row["book_id"];  ?>">Delete</a></td>
            <td><a href="update_book_crud.php?id=<?php echo $row["book_id"];   ?>">Update</a></td>
            
        </tr>

        <?php
        }
        ?>
      </table>
    </div>
  </div>
</div>
  

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script>
    $(document).ready( function () {
    $('#myTable1').DataTable();
        } );
  </script>
  <?php
if(isset($_SESSION["delete_book"]) && $_SESSION["delete_book"] == "delete_book"){
  echo "<script> alert('Delete Success');   </script>";
  $_SESSION["delete_book"] = "";
}
if(isset($_SESSION["book_update"]) && $_SESSION["book_update"] == "book_update"){
  echo "<script> alert('Update Success');   </script>";
  $_SESSION["book_update"] = "";
}
?>
</body>
</html>
