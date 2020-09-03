<?php
    include('../config/config.php');
    session_start();
    $add = ' ';
    
     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $ename = mysqli_real_escape_string($con,strip_tags($_POST['ename']));
    $start_date = mysqli_real_escape_string($con,strip_tags($_POST['start_date']));
    $event_end_data = mysqli_real_escape_string($con,strip_tags($_POST['end_date']));
    $event_video = mysqli_real_escape_string($con,strip_tags($_POST['video_link']));
    $event_playlist = mysqli_real_escape_string($con,strip_tags($_POST['playlist_link']));
    $event_tagline=mysqli_real_escape_string($con,strip_tags($_POST['tagline']));
    $other_link=mysqli_real_escape_string($con,strip_tags($_POST['other_link']));
    
    // Entering photos and files
    $ephoto = $_FILES['ephoto']['name'];
    $loc = "event/".$ephoto;

    $etype = mysqli_real_escape_string($con,strip_tags($_POST['etype']));
    $edetails = mysqli_real_escape_string($con,strip_tags($_POST['edetails']));


    // Entering the data into the database!
    $event = "INSERT INTO events(ename,start_date,ephoto,etype,edetails,event_video,event_likes,end_date,event_playlist,etagline,other_link) 
    VALUES('$ename','$start_date','$ephoto','$etype','$edetails','$event_video',0,'$event_end_data','$event_playlist ','$event_tagline','$other_link')";
    $event_result = mysqli_query($con,$event) or die(mysqli_error($con));
    move_uploaded_file($_FILES['ephoto']['tmp_name'],$loc);

    // Checking if 
    if($event_result) {
        $add = 'added';
    
        header('Location: event.php');
    } else {
        $add = 'Not added';
        header('Location: event.php');
    }


    $_SESSION['add'] = $add;

}
   
?>