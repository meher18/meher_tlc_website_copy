<?php 

 include("../config/config.php");

 $user_name=mysqli_real_escape_string($con,$_POST['user_name']);
 $user_email=mysqli_real_escape_string($con,$_POST['user_email']);
 $user_subject=mysqli_real_escape_string($con,$_POST['user_subject']);
 $user_message=mysqli_real_escape_string($con,$_POST['user_message']);

 $query_to_insert_message="insert into user_messages(user_name,user_email,subject,message)
  values('$user_name','$user_email','$user_subject','$user_message')";
 $query_to_insert_message_result=mysqli_query($con,$query_to_insert_message);
 if($query_to_insert_message_result)
 {
     echo "addedmessage";
 }

?>