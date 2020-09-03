<?php
    include('../config/config.php');
    session_start();
    $stat = ' ';
    $pid = $_SESSION['id'];
    $mname = mysqli_real_escape_string($con,strip_tags($_POST['mname']));
    
    // Entering photos and files
    $image = $_FILES['image']['name'];
    $loc = "member_photo/".$image;

    $designation = mysqli_real_escape_string($con,strip_tags($_POST['designation']));
    $bio = mysqli_real_escape_string($con,strip_tags($_POST['bio']));

     $facebook = mysqli_real_escape_string($con,strip_tags($_POST['facebook']));
    $twitter = mysqli_real_escape_string($con,strip_tags($_POST['twitter']));
    $linkedin = mysqli_real_escape_string($con,strip_tags($_POST['linkedin']));
    $instagram = mysqli_real_escape_string($con,strip_tags($_POST['instagram']));

    $edit = "UPDATE members  SET mname='$mname',image='$image',designation='$designation',bio='$bio'
     ,facebook_link='$facebook' ,twitter_link='$twitter' ,linkedin_link='$linkedin' ,instagram_link='$instagram'
     WHERE id='$pid'";
    $edit_result = mysqli_query($con,$edit) or die(mysqli_error($con));

    if($edit_result) {
      $stat = 'Edited';
      header('Location: member.php');
    } else {
        $stat = 'not edited';
        header('Location: member.php');
    }

    $_SESSION['stat'] = $stat;
?>