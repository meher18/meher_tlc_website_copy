<?php 
  include("../config/config.php");
  error_reporting(0);
  session_start();


$ip=$_SERVER['REMOTE_ADDR'];  // ip address of the machine 
$host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']); // host name of the machine

 

if(!isset($_SESSION['user_id']))
{
          // if there is no such ip and host address then 
        // create a new user with the correct ip and host info
        $query_insert_user="insert into users (user_host_address,ip_address) values('$host_name','$ip')";
        $query_insert_user_result=mysqli_query($con,$query_insert_user) or die(mysqli_error($con));
        if($query_insert_user_result)
        {
          // intialize the session vars
          $_SESSION['user_id']=mysqli_insert_id($con);
      

        }
}

      
  
  $user_id=$_SESSION['user_id'];
  
  $name=mysqli_real_escape_string($con,$_POST['user_name']);
  $email=mysqli_real_escape_string($con,$_POST['user_email']);
  $comment=mysqli_real_escape_string($con,$_POST['comment']);
  $blog_id=mysqli_real_escape_string($con,$_POST['blog_id']);
  $query1="update users set user_name='$name' ,user_email='$email' ,blog_comment='$comment' where user_id=$user_id";
  $exec1=mysqli_query($con,$query1);
   

  $query3="update blog set comments=comments+1 where id=$blog_id";
  $exec3=mysqli_query($con,$query3);


  $query2="insert into blog_comments(user_id,blog_comment,blog_id) values($user_id,'$comment',$blog_id)";
  $exec2=mysqli_query($con,$query2);
   if($exec2)
   {
       header("Location:blog_details.php?blog_id=".$blog_id);
   } 
?>