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


<div class="container">
<form action="register.php" method="post" onsubmit="return validatePassword()">
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
            
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="user_password" placeholder="Enter password details">
    </div>
    <div id='pass_valid' class="container" style="display: none;"><p class="text-danger" >password must have speacial characters</p></div>
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
    </div>
    
    <input type="submit" class="btn btn-primary m-2" name="register" value="Register">
</form>
</div>

 <?php
 
 if (isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_password = $_POST['user_password'];
    

    $insert_user = "INSERT INTO user (name, email, user_password) VALUES ('$name', '$email', '$user_password')";
    $run_user = mysqli_query($con, $insert_user);
    if($run_user){
        echo "<script>alert('Register  Successfully');</script>";
        echo "<script>window.open('user_login.php')</script>";
    
    }
 }
 ?>
  <?php
include ('includes/footer.php');
?>
<script>
    function validatePassword() {
        var password = document.getElementById('password').value;
        var pass_valid = document.getElementById('pass_valid');
        var specialChars = /[!@#$%^&*(),.?":{}|<>]/g;
        if (!specialChars.test(password)) {
            pass_valid.style.display = 'block';
            return false;
        }
        return true;
    }
</script>
  </body>