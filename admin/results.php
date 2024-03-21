<?php 
include ('db.php');
session_start();
if ($_SESSION == null){
    echo "<script>alert('You have to login first '); window.location='admin_login.php';</script>";
    exit(); 
}
// searching query
// searching throw key words are in products table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<?php include("admin_nav.php"); 
if (isset($_GET ['search'])){

    $user_keyword=$_GET ['user_query'];
$get_products = "select * from product_testing where product_name like '%$user_keyword%' OR product_code like '%$user_keyword%' ";
$run_products = mysqli_query($con, $get_products);
$count=mysqli_num_rows($run_products);
if($count==0){
  echo "<div class='alert alert-warning'role='alert'>
  No results found related this word
</div>";
exit();
}
?>
<table class="table table-dark m-5" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Manufacturing Number</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
// Loop through each row of data
while ($row_product = mysqli_fetch_array($run_products)) {
    $product_id = $row_product['product_id'];
    $product_name = $row_product['product_name'];
    $product_code = $row_product['product_code'];
    $manufacture_num = $row_product['manufacture_num'];
    $status = $row_product['status'];
}
?>
   <tr>
      <th scope="row"><?php echo $product_id; ?></th>
      <td><?php echo $product_name; ?></td>
      <td><?php echo $product_code; ?></td>
      <td><?php echo $manufacture_num; ?></td>
      <td>
    <?php
    echo ($status == 1 ? 'Pending' : ($status == 2 ? 'Testing Success' : ($status == 3 ? 'Testing Failed' : $status)));
    ?>
</td>

    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</body>
