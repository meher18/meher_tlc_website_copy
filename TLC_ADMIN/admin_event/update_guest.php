<?php
    include('../config/config.php');
    session_start();
    $add = ' ';

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
   $pid= $_SESSION['event_id'];

    $guest_id = mysqli_real_escape_string($con,strip_tags($_POST['guest_id']));
    $event_id = mysqli_real_escape_string($con,strip_tags($_POST['event_id']));
    $guest_name = mysqli_real_escape_string($con,strip_tags($_POST['guest_name']));
    $guest_details = mysqli_real_escape_string($con,strip_tags($_POST['guest_details']));
    $guest_old_img = mysqli_real_escape_string($con,strip_tags($_POST['old_image']));
  
    
    unlink("eventGuests/".$guest_old_img);
   // Entering photos and files
     $guest_photo = $_FILES['guest_photo']['name'];
     $loc = "eventGuests/".$guest_photo;
 
     
    


    // Entering the data into the database!
    $event = "UPDATE event_guests set guest_name='$guest_name',guest_details='$guest_details',guest_photo='$guest_photo',event_id=$event_id where guest_id=$guest_id";
    $event_result = mysqli_query($con,$event) or die(mysqli_error($con));
     move_uploaded_file($_FILES['guest_photo']['tmp_name'],$loc);

    // Checking if 
    if($event_result) {
        $add = 'edited';
         $_SESSION['edited_guest'] = $add;
        header("Location: event.php?pid=$pid");
    } else {
        $add = 'notedited';
        header("Location: event.php?pid=$pid");
    }

}
   
?>