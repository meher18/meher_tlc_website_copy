<?php
 
 
 session_start();
 include("../config/config.php");

 if($_POST['user_email']!=="" && $_POST['user_name']!=="")
 {

          if( !isset($_SESSION['user_id'])  || $_SESSION['user_name']!==$_POST['user_name'] && $_SESSION['user_email']!==$_POST['user_email'] )
          {

                    
               $username=mysqli_real_escape_string($con,$_POST['user_name']);
               $useremail=mysqli_real_escape_string($con,$_POST['user_email']);
               $query1="insert into users(event_like,event_love) values(0,0)";
                $exec1=mysqli_query($con,$query1);
               if($exec1)
               {
                    $_SESSION['user_id']=mysqli_insert_id($con);
                    

                    
               } $userid=$_SESSION['user_id'];
                $query="update users set user_name='$username ', user_email='$useremail' where user_id=$userid";
               $exec=mysqli_query($con,$query);
               if($exec)
               {
               echo "joined,$username";
     
               }
          
          }
          else{
               echo "already joined,".$_POST['user_name'];
               
          }

}
else {
     echo "empty";
}
 



?>