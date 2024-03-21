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



    <div class="container">
        <h1 style="font-family:cursive ;">Product Testing Form</h1>
        <form action="product_testing.php" method="POST">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="product_name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputCode">Code</label>
                <input type="text" class="form-control" id="exampleInputCode" name="product_code" placeholder="Enter code">
            </div>
            <div class="form-group">
                <label for="exampleInputManufacturingNum">Manufacturing Number</label>
                <input type="text" class="form-control" id="exampleInputManufacturingNum" name="manufacture_num" placeholder="Enter manufacturing number">
            </div>
            <div class="form-group">
                <label for="exampleInputDetails">Other Details</label>
                <input type="text" class="form-control" id="exampleInputDetails" name="details" placeholder="Enter other details">
            </div>
            <input type="submit" class="btn btn-primary m-2" name="insert_product" value="Submit">
        </form>
    </div>

    

<?php
include("includes/db.php");

if (isset($_POST['insert_product'])){
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $manufacture_num = $_POST['manufacture_num'];
    $details = $_POST['details'];
    $status = 1;
    $user_id = $_SESSION['user_id'];

    // print_r($user_id);
    // exit

    if ($product_name == '' OR $product_code == '' OR $manufacture_num == '' OR $details == '' OR $status == '') {
        echo "<script>alert('Please input values for all fields!');</script>";
        exit();
     
     }

    $insert_product = "INSERT INTO product_testing (user_id,product_name, product_code, manufacture_num, details, status) VALUES ('$user_id','$product_name', '$product_code', '$manufacture_num', '$details', '$status')";
    $run_product = mysqli_query($con, $insert_product);
    if($run_product){
        echo "<script>alert('Product Added Successfully');</script>";
        echo "<script>window.open('product_testing.php','_self')</script>";
    
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
</html>
