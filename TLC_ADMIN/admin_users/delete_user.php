<?php  

 include("../config/config.php");
 session_start();
 $user_id=$_GET['user_id'];

if(isset($_SESSION['email']))
{
     
 $query="delete from users where user_id=$user_id";
 $exec=mysqli_query($con,$query);
 if($exec)
 {
     echo "deleted";
 }
}


?>