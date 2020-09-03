<?php
    include('../config/config.php');
    session_start();
    $add = ' ';

    $header = mysqli_real_escape_string($con,strip_tags($_POST['header']));
    $link = mysqli_real_escape_string($con,strip_tags($_POST['audio_link']));
    
   

    $pic=$_FILES['podcast_pic']['name'];
    $pic_loc="podcast_images/".$pic;

    $audio=$_FILES['podcast_audio']['name'];
    $audio_loc="podcasts/".$audio;
    
    $details = mysqli_real_escape_string($con,strip_tags($_POST['details']));

    // Entering the data into the database!
    $video = "INSERT INTO podcasts(header,pic,audio,details,audio_link) 
    VALUES('$header','$pic','$audio','$details','$link')";
    $video_result = mysqli_query($con,$video) or die(mysqli_error($con));

    move_uploaded_file($_FILES['podcast_pic']['tmp_name'],$pic_loc);
    move_uploaded_file($_FILES['podcast_audio']['tmp_name'],$audio_loc);
 

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