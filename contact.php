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
    <title>Upload testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<?php include("includes/nav.php"); ?>
<h1>Contact us</h1>
<div class="container">
<form action="contact.php" method="POST">
            <div class="form-group col-md-4">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputName">Email</label>
                <input type="text" class="form-control" id="exampleInputName" name="email" placeholder="Enter email">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputCode">Message</label>
                <input type="text" class="form-control" id="exampleInputCode" name="message" placeholder="Message">
            </div>
            
            <input type="submit" class="btn btn-primary m-2" name="insert_product" value="Submit">
        </form>
        </div>

        <?php
include("includes/db.php");

if (isset($_POST['insert_product'])){
    $product_name = $_POST['name'];
    $product_code = $_POST['email'];
    $manufacture_num = $_POST['message'];
 

    if ($product_name == '' OR $product_code == '' OR $manufacture_num == '' ) {
        echo "<script>alert('Please input values for all fields!');</script>";
        exit();
     
     }

    $insert_product = "INSERT INTO contact (name, email, message) VALUES ('$product_name', '$product_code', '$manufacture_num')";
    $run_product = mysqli_query($con, $insert_product);
    if($run_product){
        echo "<script>alert('Sent  Successfully');</script>";
        echo "<script>window.open('index.php','_self')</script>";
   
    }
    
    else{
        echo "<script>alert('Product Not Added Successfully');</script>";
    }
}


?>
 <?php
include ('includes/footer.php');
?>
</body>