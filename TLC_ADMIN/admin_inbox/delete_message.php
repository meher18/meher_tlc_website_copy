<?php  

session_start();
 include("../config/config.php");

 $message_id=$_GET['message_id'];

 
if(isset($_SESSION['email']))
{
     
 $query="delete from user_messages where id=$message_id";
 $exec=mysqli_query($con,$query);
 if($exec)
 {
     echo "deleted";
 }

}

?>