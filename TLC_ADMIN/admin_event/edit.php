<?php
    include('../config/config.php');
    session_start();
    $stat = ' ';
    $pid = $_SESSION['id'];
    
     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    
    $ename = mysqli_real_escape_string($con,strip_tags($_POST['ename']));
    $start_date = mysqli_real_escape_string($con,strip_tags($_POST['date']));
    $event_end_data = mysqli_real_escape_string($con,strip_tags($_POST['end_date']));
    $event_video = mysqli_real_escape_string($con,strip_tags($_POST['event_video']));
    $event_playlist = mysqli_real_escape_string($con,strip_tags($_POST['event_playlist']));
    $event_tagline=mysqli_real_escape_string($con,strip_tags($_POST['tagline']));
    $event_old_photo=mysqli_real_escape_string($con,strip_tags($_POST['eoldphoto']));
    $other_link=mysqli_real_escape_string($con,strip_tags($_POST['other_link']));


    unlink("event/".$event_old_photo);
    // Photo edit
    $ephoto = $_FILES['ephoto']['name'];
    $loc = "event/".$ephoto;

    $etype = mysqli_real_escape_string($con,strip_tags($_POST['etype']));
    $edetails = mysqli_real_escape_string($con,strip_tags($_POST['edetails']));

    $edit = "UPDATE events SET ename='$ename', start_date='$start_date',ephoto='$ephoto',etype='$etype',edetails='$edetails',event_video='$event_video',end_date='$event_end_data',event_playlist='$event_playlist'
    ,etagline='$event_tagline',other_link='$other_link' WHERE id='$pid'";
    $edit_result = mysqli_query($con,$edit) or die(mysqli_error($con));

    move_uploaded_file($_FILES['ephoto']['tmp_name'],$loc);

    if($edit_result) {
      $stat = 'Edited';
      header("Location: event.php?pid=$pid");
    } else {
        $stat = 'not edited';
        header("Location: event.php?pid=$pid");
    }

    $_SESSION['stat'] = $stat;
  }
?>

  