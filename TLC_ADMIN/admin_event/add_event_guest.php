<?php
    include('../config/config.php');
    session_start();
    $add = ' ';

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $event_id = mysqli_real_escape_string($con,strip_tags($_POST['guest_event_id']));
    $guest_name = mysqli_real_escape_string($con,strip_tags($_POST['guest_name']));
    $guest_details = mysqli_real_escape_string($con,strip_tags($_POST['guest_details']));
  
    
    // Entering photos and files
    $guest_photo = $_FILES['guest_photo']['name'];
    $loc = "eventGuests/".$guest_photo;




    // Entering the data into the database!
    $event = "INSERT INTO event_guests(guest_name,guest_details,guest_photo,event_id) VALUES('$guest_name','$guest_details','$guest_photo',$event_id)";
    $event_result = mysqli_query($con,$event) or die(mysqli_error($con));
    move_uploaded_file($_FILES['guest_photo']['tmp_name'],$loc);

    // Checking if 
    if($event_result) {
        $add = 'added';
        $_SESSION['event_guests']=$add;
        header('Location: addEventGuestsOnly.php');
    } else {
        $add = 'Not added';
        header('Location: addEventGuestsOnly.php');
    }

}

    

?>