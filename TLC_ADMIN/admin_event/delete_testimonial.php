<?php
   include("../config/config.php");
   session_start();
    // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
   $thumbnail_id=mysqli_real_escape_string($con,$_POST['thumbnail_id']);
   $event_id=mysqli_real_escape_string($con,$_POST['event_id']);
   $query="DELETE FROM event_testimonials where testimonial_id=$thumbnail_id and event_id=$event_id";
   $exec=mysqli_query($con,$query) or die(error($con));
   if($exec)
   {
       echo "deleted";
   }
    }


?>