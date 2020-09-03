<?php
    include('../config/config.php');
    session_start();
    error_reporting(0);
   
    if(isset($_SESSION['email'])) {
        header('Location: dashboard.php');
    }
    $msg = $_SESSION['msg'];
    $email = $_SESSION['email'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body style="background-image: url(../assets/images/admin_bg.jpg);">

    <!-- Login system! -->
    <div class="container text-center" style="margin-top: 150px !important;">
        <div class="card" style="display: inline-block;width: 30em !important;">
            <div class="card-title">
                <p class="display-4">
                    Admin Login
                </p>
            <?php
                if($msg == 'error') {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p class="lead">Login error! Wrong email or password!</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php    
                }
            ?>
            <div class="card-body">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Login</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>