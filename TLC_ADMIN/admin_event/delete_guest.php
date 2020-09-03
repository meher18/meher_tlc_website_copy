
<?php
   include("../config/config.php");
  error_reporting(0);
  session_start();

   // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
   $guest_id=mysqli_real_escape_string($con,$_POST['guest_id']);
   $query="DELETE FROM event_guests where guest_id=$guest_id";
   $exec=mysqli_query($con,$query) or die(error($con));
   if($exec)
   {
       echo "deleted";
   }
    }


?>