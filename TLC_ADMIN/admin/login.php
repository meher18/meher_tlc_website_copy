<?php
    include('../config/config.php');
    session_start();

    $msg = ' ';
    $email = mysqli_real_escape_string($con,strip_tags($_POST['email']));
    $password = mysqli_real_escape_string($con,strip_tags($_POST['password']));

    // To check if the user exists or not!
    $login = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $login_result = mysqli_query($con,$login) or die(mysqli_error($con));
    if(mysqli_num_rows($login_result) == 1) {
        $msg = "success";
        header('Location: dashboard.php');
    } else {
        $msg = "error";
        header('Location: index.php');
    }

    $_SESSION['email'] = $email;
    $_SESSION['msg'] = $msg;

?>