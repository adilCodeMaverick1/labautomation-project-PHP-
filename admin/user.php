
<?php 
include ('db.php');
@session_start();
if ($_SESSION == null){
  echo "<script> window.location='admin_login.php';</script>";
  exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Approvals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<?php
    
    include ('admin_nav.php');
    ?>
<?php


// Fetch data from the database
$select_product = "SELECT * FROM user";
$run_product = mysqli_query($con, $select_product);

?>

<table class="table table-light m-5" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
    
      
    </tr>
  </thead>
  <tbody>
    <?php
    // Loop through each row of data
    while ($row_product = mysqli_fetch_array($run_product)) {
        $id = $row_product['id'];
        $name = $row_product['name'];
        $email = $row_product['email'];
      
    ?>
   
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $name; ?></td>
      <td><?php echo $email; ?></td>
  


    </tr>
    <?php
    }
    ?>
  </tbody>
</table>





</body>