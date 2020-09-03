
<?php  
 
 include("../config/config.php");
 session_start();

  // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
 $blog_id=$_GET['blog_id'];
 $query="update blog set top_blog_status=1 where id=$blog_id ";;
 $exec=mysqli_query($con,$query);
 if($exec)

 {
     echo "1";
 }
 else{
     echo "0";
 }

}

?>