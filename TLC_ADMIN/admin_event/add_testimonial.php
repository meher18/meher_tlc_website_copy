<?php
    include('../config/config.php');
    session_start();
    $add = ' ';

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $event_id = mysqli_real_escape_string($con,strip_tags($_POST['testimonial_event_id']));
   
    $testimonial_details = mysqli_real_escape_string($con,strip_tags($_POST['testimonial_details']));
    $tauthor = mysqli_real_escape_string($con,strip_tags($_POST['tauthor']));
  
    
    // Entering photos and files
    $testimonial_photo = $_FILES['testimonial_image']['name'];
    $loc = "eventTestimonial/".$testimonial_photo;




    // Entering the data into the database!
    $event = "INSERT INTO event_testimonials(image,testimonial_text,event_id,author) 
    VALUES('$testimonial_photo','$testimonial_details',$event_id,'$tauthor')";
    $event_result = mysqli_query($con,$event) or die(mysqli_error($con));
    move_uploaded_file($_FILES['testimonial_image']['tmp_name'],$loc);

    // Checking if 
    if($event_result) {
        $add = 'added';
        $_SESSION['testimonial_added']=$add;
        header('Location: addEventTestimonialsOnly.php');
    } else {
        $add = 'Not added';
        header('Location: addEventTestimonialsOnly.php');
    }


}

?>