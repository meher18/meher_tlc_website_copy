<?php
    include('../config/config.php');
    session_start();
    $status = ' ';

    $pid = $_GET['pid'];

    $delete = "DELETE FROM podcasts WHERE podcast_id='$pid'";
    $delete_result = mysqli_query($con,$delete) or die(mysqli_error($con));

    // To check if the query works or not
    if($delete_result) {
        $status = 'deleted';
        header('Location: index.php');
    } else {
        $status = 'not deleted';
        header('Location: index.php');
    }

    $_SESSION['status'] = $status;
?>