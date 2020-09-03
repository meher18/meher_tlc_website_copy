<?php  
 
 session_start();
 error_reporting(0);

 $event_starting_num=$_POST['event_starting_num'];
 $_SESSION['event_starting_num']=$event_starting_num;

 echo "paginate event videos";



?>