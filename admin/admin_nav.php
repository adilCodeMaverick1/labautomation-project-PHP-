<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
</head>
<body>
<div class="container_fluid bg-warning">
    <?php
    @session_start();
include ('db.php');

if ($_SESSION == null){
  echo "<a class='text-light nav-link' href='.\index.php'>Visit Website</a>";

  


}
else{
  echo "<div class='row'>";
  echo "<div class='col'>";
  echo "<a class='text-danger nav-link' href='logout.php'>Logout</a>";
  
  echo "</div>";
  echo "<div class='col'>";
  $admin = "select * from admin";
$run_product = mysqli_query($con, $admin);
$row_product = mysqli_fetch_array($run_product);
//$name = $row_product['name'];
//$name = $_SESSION['email'];

//print_r($name);
//exit;



  echo "<a class='text-light nav-link' href='logout.php'>Welcome ADMIN!  </a>";
  
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
          <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="new_approvals.php">New Approvals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="message.php">Messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="successful_test.php">Successful Approvals</a>
        </li>
        
      </ul>
      <form class="d-flex" method="get" action="results.php" enctype="multipart/form-data">
        <input class="form-control me-2" type="text" placeholder="Enter Code or name" name="user_query">
        <button class="btn btn-outline-dark" type="submit"  name="search" value="search">Search</button>
      </form>
      
  
    </div>
  </div>
</nav>
</body>
</html>
