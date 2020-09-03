<?php
    include('../config/config.php');
    session_start();
    $status = ' ';

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $pid = $_GET['pid'];

    $delete = "DELETE FROM intresting_facts WHERE id='$pid'";
    $delete_result = mysqli_query($con,$delete) or die(mysqli_error($con));

    // To check if the query works or not
    if($delete_result) {
        $status = 'deleted';
        header('Location: fact.php');
    } else {
        $status = 'not deleted';
        header('Location: fact.php');
    }

    $_SESSION['status'] = $status;
}
?>