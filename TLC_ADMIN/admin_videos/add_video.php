<?php
    include('../config/config.php');
    session_start();
    $add = ' ';

    $id = mysqli_real_escape_string($con,strip_tags($_POST['id']));
    $vname = mysqli_real_escape_string($con,strip_tags($_POST['vname']));
    $vlikes = mysqli_real_escape_string($con,strip_tags($_POST['vlikes']));
    $vviews = mysqli_real_escape_string($con,strip_tags($_POST['vviews']));
    $vthumb = mysqli_real_escape_string($con,strip_tags($_POST['vthumb']));
    $vlink = mysqli_real_escape_string($con,strip_tags($_POST['vlink']));
    $vdetails = mysqli_real_escape_string($con,strip_tags($_POST['vdetails']));
    $vdate = mysqli_real_escape_string($con,strip_tags($_POST['vdate']));


    // Entering the data into the database!
    $video = "INSERT INTO videos(event_id,vname,vthumb,vlink,vdetails,likes,views,vdate) 
    VALUES('$id','$vname','$vthumb','$vlink','$vdetails',$vlikes,$vviews,'$vdate')";
    $video_result = mysqli_query($con,$video) or die(mysqli_error($con));
 

    // Checking if 
    if($video_result) {
        $add = 'added';
        header('Location: index.php');
    } else {
        $add = 'Not added';
        header('Location: index.php');
    }

    $_SESSION['add'] = $add;
?>