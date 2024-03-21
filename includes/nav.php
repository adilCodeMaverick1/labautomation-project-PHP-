<?php
@session_start();

include ("includes/db.php")



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="container_fluid bg-success p-2">
    <?php
if ($_SESSION == null){
  
  echo "<div class='row'>";
  echo "<div class='col-auto'>";
  echo "<a class='nav-link text-info' href='user_login.php'>Login</a>";
  echo "</div>";
  echo "<div class='col-auto'>";
  echo "<a class='nav-link text-light ms-3' href='register.php'>Register</a>";
  echo "</div>";
 
  echo "</div>";

}




    else{

      $user_id = $_SESSION['user_id']; 
      $get_items = "SELECT * FROM product_testing WHERE status='3' AND user_id = '$user_id'";
      $run_items = mysqli_query($con, $get_items);
      $user_name ="SELECT name FROM user WHERE  user_id = '$user_id'";
      $run_user_name = mysqli_query($con, $user_name);
      $row_user_name = mysqli_fetch_assoc($run_user_name);
      $user_name = $row_user_name['name'];
      $count_items = mysqli_num_rows($run_items);
      echo "<div class='row'>";
      echo "<div class='col'>";
      echo "<a class='text-light nav-link btn btn-danger col-md-3 ' href='logout.php'>Logout</a>";
      echo "</div>";
      echo "<div class='col'>";
      echo "<h5 class='text-light mt-2' >";
      echo "Welcome $user_name"; // Display the fetched username
      echo "</h5>";
      echo "</div>";
      echo "<div class='col'>";
      echo "<a href='notification.php'  class='btn btn-warning' >";
      echo "Notifications <span class='badge badge-danger' style='color:red;'>$count_items</span>";
      echo "</a>";
      echo "</div>";
      echo "</div>";
      
    }
    
     ?>

    

</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#" style="font-family: cursive;">Lab Automation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product_testing.php">Upload products to testing</a>
        </li>
        <li class="nav-item">
      <a class="nav-link" href="testing_details.php">Testing details</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="successful_test.php">Successful tests</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="contact.php">Faqs</a>
        </li>
        
      </ul>
      <form class="d-flex" method="get" action="results.php" enctype="multipart/form-data">
        <input class="form-control me-2  custom-search-input   " type="text" placeholder="Enter Product Code or name" name="user_query">
        <button class="btn btn-outline-dark" type="submit"  name="search" value="search">Search</button>
      </form>
      
  
    </div>
  </div>
</nav>
<style>
  .custom-search-input {
  width: 300px; /* Set the desired width */
}

</style>
</body>
</html>



