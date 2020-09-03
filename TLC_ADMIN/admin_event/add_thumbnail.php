<?php
    include('../config/config.php');
    session_start();
    $add = ' ';

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $event_id = mysqli_real_escape_string($con,strip_tags($_POST['thumbnail_event_id']));
   
    
    // Entering photos and files
    $thumbnail_photo = $_FILES['event_thumbnail']['name'];
    $loc = "eventThumbnails/".$thumbnail_photo;




    // Entering the data into the database!
    $event = "INSERT INTO event_thumbnails(thumbnail_image,event_id) VALUES('$thumbnail_photo',$event_id)";
    $event_result = mysqli_query($con,$event) or die(mysqli_error($con));
    move_uploaded_file($_FILES['event_thumbnail']['tmp_name'],$loc);

    // Checking if 
    if($event_result) {
        $add = 'added';
       $_SESSION['event_thumbnail'] = $add;
        header('Location: addEventThumbnailsOnly.php');
    } else {
        $add = 'Not added';
        header('Location: addEventThumbnailsOnly.php');
    }

}
  
 
    
?>