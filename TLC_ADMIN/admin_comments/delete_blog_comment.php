<?php  
  session_start();
 include("../config/config.php");

 $id=$_GET['id'];

 
if(isset($_SESSION['email']))
{
     
 $query="delete from blog_comments where id=$id";
 $exec=mysqli_query($con,$query);
 if($exec)
 {
     echo "deleted";
 }

}

?>