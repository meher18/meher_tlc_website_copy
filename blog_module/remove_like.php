
<?php 

session_start();

include("../config/config.php");

$blog_id=$_GET['blog_id'];

$user_id=$_SESSION['user_id'];


 $query2="select * from blog_likes where user_id=$user_id and blog_id=$blog_id";
 $exec2=mysqli_query($con,$query2);
 $row2=mysqli_fetch_array($exec2);


if(intval($row2['like_status'])===1)
{
      
    $query="update blog set likes=likes-1 where id=$blog_id";
    
    $exec=mysqli_query($con,$query);
    
    if($exec)
    {
     echo "dislike";
    
     $query1="update  blog_likes set like_status=0 where user_id=$user_id and blog_id=$blog_id"; 
     $exec1=mysqli_query($con,$query1);
    }
 
}

    







?>