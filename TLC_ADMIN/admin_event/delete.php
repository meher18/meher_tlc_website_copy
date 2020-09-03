<?php
    include('../config/config.php');
    session_start();
    $status = ' ';
   
     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $pid = $_GET['pid'];

    $delete = "DELETE FROM events WHERE id='$pid'";
    $query1="DELETE FROM event_thumbnails where event_id=$pid";
    $query2="DELETE FROM event_guests where event_id=$pid";
    $query3="DELETE FROM event_testimonials where event_id=$pid";
    $delete_result = mysqli_query($con,$delete) or die(mysqli_error($con));
    $exec1= mysqli_query($con,$query1) or die(mysqli_error($con));
    $exec2= mysqli_query($con,$query2) or die(mysqli_error($con));
    $exec3= mysqli_query($con,$query3) or die(mysqli_error($con));

    // To check if the query works or not
    if($delete_result) {
        $status = 'deleted';
        header('Location: event.php');
    } else {
        $status = 'not deleted';
        header('Location: event.php');
    }

    $_SESSION['status'] = $status;
}
?>