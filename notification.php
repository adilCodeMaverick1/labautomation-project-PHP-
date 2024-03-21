<?php

include ("includes/db.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>lab Automation</title>
  </head>
  <body>
 <?php
 
 include ("includes/nav.php")

 
 ?>
 <h1 class="text-danger" style="font-family: cursive;">Notifications</h1>
 <?php
include("includes/db.php");

// Fetch data from the database
$user_id = $_SESSION['user_id'];

$select_product = "SELECT * FROM product_testing where status ='3' AND user_id = $user_id";
$run_product = mysqli_query($con, $select_product);


   if (mysqli_num_rows($run_product) < 1) {
    echo "<div class='alert alert-warning'role='alert'>
    Notifications not found !
  </div>";
  } else {
    ?>
 <table class="table table-danger m-5" >
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
<?php  } ?>



<?php
include ('includes/footer.php');
?>

  </body>