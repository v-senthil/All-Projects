<?php

    if(isset($_POST['field22']))
    {
        $email = $_POST['field20']; 
        $pwd = $_POST['field21'];
        if ($email=='root' && $pwd == 'root')
        {
            echo "<script> window.open('read_db.php','_self') </script>";
        }  
        else
        {
            echo "<script> alert('Invalid!!!')</script>";
            echo "<script> window.open('index.php','_self') </script>";
        }
    }    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-dark">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="field20" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="field21" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="field22">Log In</button>
    <!--        </div><a href="#" class="forgot">Forgot your email or password?</a></form>                -->
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>