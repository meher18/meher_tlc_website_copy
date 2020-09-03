<?php
    include('../config/config.php');
    session_start();
    $add = ' ';

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
    

    // Entering the data into the database!
    $member = "INSERT INTO members(mname,bio,image,designation,facebook_link,twitter_link,linkedin_link,instagram_link)
     VALUES('$mname','$bio','$image','$designation','$facebook','$twitter','$linkedin','$instagram')";
    $member_result = mysqli_query($con,$member) or die(mysqli_error($con));
    move_uploaded_file($_FILES['image']['tmp_name'],$loc);

    // Checking if 
    if($member_result) {
        $add = 'added';
        header('Location: member.php');
    } else {
        $add = 'Not added';
        header('Location: member.php');
    }

    $_SESSION['add'] = $add;
?>