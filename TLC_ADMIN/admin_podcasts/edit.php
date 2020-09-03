<?php
    include('../config/config.php');
    session_start();
    $stat = ' ';
    $pid = $_SESSION['pid'];
    $header = mysqli_real_escape_string($con,strip_tags($_POST['header']));
    
    $details = mysqli_real_escape_string($con,strip_tags($_POST['details']));
    $old_pic = mysqli_real_escape_string($con,strip_tags($_POST['podcast_old_pic']));
    $old_audio = mysqli_real_escape_string($con,strip_tags($_POST['podcast_old_audio']));
    $link = mysqli_real_escape_string($con,strip_tags($_POST['audio_link']));
    

    unlink("podcast_images/".$old_pic);
    unlink("podcasts/".$old_audio);

     $pic=$_FILES['podcast_pic']['name'];
    $pic_loc="podcast_images/".$pic;

    $audio=$_FILES['podcast_audio']['name'];
    $audio_loc="podcasts/".$audio;
   
    $edit = "UPDATE podcasts ". "SET header='$header',pic='$pic',audio='$audio',details='$details',audio_link='$link' WHERE podcast_id='$pid'";
    $edit_result = mysqli_query($con,$edit) or die(mysqli_error($con));
    move_uploaded_file($_FILES['podcast_pic']['tmp_name'],$pic_loc);
    move_uploaded_file($_FILES['podcast_audio']['tmp_name'],$audio_loc);
     
    if($edit_result) {
      $stat = 'Edited';
      header('Location: index.php');
    } else {
        $stat = 'not edited';
        header('Location: index.php');
    }

    $_SESSION['stat'] = $stat;
?>