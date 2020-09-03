
<?php

 
  include("../config/config.php");
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
  $event_comment=mysqli_real_escape_string($con,$_POST['event_comment']);
  $event_id=mysqli_real_escape_string($con,$_POST['event_id']);
  $user_name=mysqli_real_escape_string($con,$_POST['user_name']);
  $user_email=mysqli_real_escape_string($con,$_POST['user_email']);
  

  $query="insert into event_comments(user_id,event_comment,event_id,user_name,user_email)
   values($user_id,'$event_comment',$event_id,'$user_name','$user_email')";

   $exec=mysqli_query($con,$query);
   if($exec)
   {    
       $comment_id=mysqli_insert_id($con);

        if(!isset($_SESSION['user_name']) || !isset($_SESSION['user_email']))
       {
        $query1="update users set user_name='$user_name',event_comment=$comment_id,user_email='$user_email' where 
        user_id=$user_id";
        $exec1=mysqli_query($con,$query1) or die(mysqli_error($con));
        if($exec1)
        {
            $_SESSION['user_name']=$user_name;
            $_SESSION['user_email']=$user_email;
        }
       }
       echo  "addedcomment";
    
   }

?>