
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
    <title>Upload testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <?php
    
    include ('admin_nav.php');
    ?>

    <div class="container d-flex m-4">
<div class=" col-md-4 bg-danger p-3 m-2" style="height:200px; border-radius: 10px;">
<h3>Total Rejected Tests</h3>
<?php
$reject_query = "SELECT  * from product_testing where status = '3'";
$reject_query = mysqli_query($con , $reject_query);
$rows =  mysqli_num_rows($reject_query);


?>

<h2><?php echo $rows ?> </h2>


</div>
<div class="col-md-4 bg-success p-3 m-2" style="height:200px; border-radius: 10px;">

<h3>Total Succesfull Tests</h3>
<?php
$reject_query = "SELECT  * from product_testing where status = '2'";
$reject_query = mysqli_query($con , $reject_query);
$rows =  mysqli_num_rows($reject_query);


?>

<h2><?php echo $rows ?> </h2>
</div>
<div class="col-md-4 bg-warning p-3 m-2" style="height:200px; border-radius: 10px;">

<h3>Total Pending Tests</h3>
<?php
$reject_query = "SELECT  * from product_testing where status = '1'";
$reject_query = mysqli_query($con , $reject_query);
$rows =  mysqli_num_rows($reject_query);


?>

<h2><?php echo $rows ?> </h2>
</div>



    </div>


</body>



