<?php
    error_reporting(0);
    include('../config/config.php');
    session_start();
    $add = ' ';

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
   $pid= $_SESSION['event_id'];

    $testimonial_id = mysqli_real_escape_string($con,strip_tags($_POST['testimonial_id']));
   
    $testimonial_text = mysqli_real_escape_string($con,strip_tags($_POST['testimonial_text']));
    $testimonial_old_image = mysqli_real_escape_string($con,strip_tags($_POST['testimonial_old_image']));
    $tauthor = mysqli_real_escape_string($con,strip_tags($_POST['tauthor']));
  
    
     unlink("eventTestimonial/".$testimonial_old_image);
   // Entering photos and files
     $testimonial_new_image = $_FILES['testimonial_new_image']['name'];
     $loc = "eventTestimonial/".$testimonial_new_image;
 
     
    


    // Entering the data into the database!
    $event = "UPDATE event_testimonials set testimonial_text='$testimonial_text',image='$testimonial_new_image',author='$tauthor' where testimonial_id=$testimonial_id";
    $event_result = mysqli_query($con,$event) or die(mysqli_error($con));
     move_uploaded_file($_FILES['testimonial_new_image']['tmp_name'],$loc);

    // Checking if 
    if($event_result) {
        $add = 'edited';
         $_SESSION['edited_testimonial'] = $add;
        header("Location: event.php?pid=$pid");
    } else {
        $add = 'notedited';
        header("Location: event.php?pid=$pid");
    }

}
   
?>