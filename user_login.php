<?php
@session_start();
include ("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Lab Automation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <?php
        include ("includes/nav.php");
    ?>
    <div class="container m-5">
        <form action="user_login.php" method="POST">
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password details">
            </div>
            <input type="submit" class="btn btn-primary m-2" name="login" value="login">
        </form>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        $login_query = "SELECT * FROM user WHERE email='$user_email' AND user_password='$user_password'";
        $run_login = mysqli_query($con, $login_query);
        $user_data = mysqli_fetch_assoc($run_login);
        
        if ($user_data == 0) {
            echo "<script>alert('Password and email not correct! Try again')</script>";
        } else {
            // Store the user ID in the session
            $_SESSION['user_id'] = $user_data['user_id'];

            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    ?>

    <?php
    include ('includes/footer.php');
    ?>
</body>
</html>
