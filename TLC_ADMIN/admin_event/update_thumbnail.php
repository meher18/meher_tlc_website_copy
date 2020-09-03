<?php
    include('../config/config.php');
    session_start();

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $add = ' ';
     $pid= $_SESSION['event_id'];
    $thumbnail_event_id = mysqli_real_escape_string($con,strip_tags($_POST['event_thumbnail_id']));
    $thumbnail_old_image = mysqli_real_escape_string($con,strip_tags($_POST['thumbnail_old_image']));
    $thumbnail_new_image = mysqli_real_escape_string($con,strip_tags($_POST['thumbnail_new_image']));
  
  
    
    unlink("eventThumbnails/".$thumbnail_old_image);
   // Entering photos and files
     $thumbnail_photo = $_FILES['thumbnail_new_image']['name'];
     $loc = "eventThumbnails/".$thumbnail_photo;
 
     
    


    // Entering the data into the database!
    $event = "UPDATE event_thumbnails set thumbnail_image='$thumbnail_photo' where event_thumbnail_id=$thumbnail_event_id";
    $event_result = mysqli_query($con,$event) or die(mysqli_error($con));
     move_uploaded_file($_FILES['thumbnail_new_image']['tmp_name'],$loc);

    // Checking if 
    if($event_result) {
        $add = 'edited';
        header("Location: event_edit.php?pid=$pid");
    } else {
        $add = 'notedited';
        header("Location: event_edit.php?pid=$pid");
    }

    $_SESSION['edited_thumbnail'] = $add;
}
?>