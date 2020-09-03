<?php
 include("../config/config.php");
 session_start();
  // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
  $current_event_id=$_POST['event_id'];
  
  $query2="select * from event_testimonials where event_id=$current_event_id";
  $exec2=mysqli_query($con,$query2);
  $thumbnail_array=mysqli_fetch_all($exec2);

  if($exec2)
  {
      echo count($thumbnail_array);
  }
}


?>