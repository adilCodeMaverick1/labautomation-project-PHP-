<?php
include("includes/db.php");

session_start();
if ($_SESSION == null){
    echo "<script>alert('You have to login first '); window.location='user_login.php';</script>";
    exit(); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>

<?php

include ("includes/nav.php");
?>
<div class="container">

<h1 class="text-success">Succesful Tests</h1>
<?php
include("includes/db.php");

// Fetch data from the database
$user_id = $_SESSION['user_id'];

$select_product = "SELECT * FROM product_testing where status = '2' AND  user_id = '$user_id'";
$run_product = mysqli_query($con, $select_product);
if (mysqli_num_rows($run_product) < 1) {
  echo "<div class='alert alert-warning'role='alert'>
No any test succesfull !
</div>";
} else {
?>

<table class="table table-success m-5" >
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
   
    while ($row_product = mysqli_fetch_array($run_product)) {
        $product_id = $row_product['product_id'];
        $product_name = $row_product['product_name'];
        $product_code = $row_product['product_code'];
        $manufacture_num = $row_product['manufacture_num'];
        $status = $row_product['status'];
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

</div>
<?php
}
include ('includes/footer.php');
?>
</body>

