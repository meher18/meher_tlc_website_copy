<?php
 
 
 include("config/config.php");
 session_start();

//  check the user_name and user_email is not empty
// if empty go to else part
 if($_POST['user_name']!=="" && $_POST['user_email']!=="")
 {
   //to check if the email is valid or not
   if(filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL))
   {
        $array=array();
        $arry_for_user_name=array();

        $query2="select * from users";
        $exec2=mysqli_query($con,$query2);
        
        // populate both the arrays with user_email and user_names
        while ($row2=mysqli_fetch_array($exec2))
        {
          array_push($array,$row2['user_email']);
          array_push($arry_for_user_name,$row2['user_name']);
        }

        // check if the both array contains the new input user_name ans user_email
        if(!in_array($_POST['user_email'],$array) || !in_array($_POST['user_name'],$arry_for_user_name))
        {

           //if session is set but no user_name and user_email , then update the user info , and set 
           // session user_name and email
              if(isset($_SESSION['user_id']))
              {
              
                $ip=$_SERVER['REMOTE_ADDR'];
                $host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $username=mysqli_real_escape_string($con,$_POST['user_name']);
                $useremail=mysqli_real_escape_string($con,$_POST['user_email']);
                $query_to_update_session_created_user="update users set user_name='$username', user_email='$useremail',
                user_host_address='$host_name',ip_address='$ip' where user_id=".$_SESSION['user_id'];
                $query_to_update_session_created_user_result=mysqli_query($con,$query_to_update_session_created_user) or die(mysqli_error($con));

                if($query_to_update_session_created_user_result)
                {
                    
                    $username=mysqli_real_escape_string($con,$_POST['user_name']);
                    $useremail=mysqli_real_escape_string($con,$_POST['user_email']);

                    $_SESSION['user_name']=$username;
                    $_SESSION['user_email']=$useremail;
                    echo "joined,$username";
                }

              } //  else if the session is not set , create a new session by inserting the new user 
              else{  
                 $ip=$_SERVER['REMOTE_ADDR'];
                 $host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                 $query1="insert into users(event_like,event_love,user_host_address,ip_address) values(0,0,'$ip','$host_name')";
                  
                 $exec1=mysqli_query($con,$query1);
                if($exec1)
                    {
                      // then initialize the user_id with the new inserted user
                        $_SESSION['user_id']=mysqli_insert_id($con);
                        

                    
                    }

                 $username=mysqli_real_escape_string($con,$_POST['user_name']);
                 $useremail=mysqli_real_escape_string($con,$_POST['user_email']);
                 $userid=$_SESSION['user_id'];

                
                  // if all user insertion and creation is successfull then ,
                  // update the user_name , and user_email by the id that is initalized

                  // you can also see , that we insert the user details when we insert the new user,
                  //but updating the user details this after making a user , is good i guess

                  $ip=$_SERVER['REMOTE_ADDR'];
                  $host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                  $query="update users set user_name='$username', user_email='$useremail',
                  user_host_address='$host_name',ip_address='$ip' where user_id=$userid";
                 $exec=mysqli_query($con,$query);
                   if($exec)
                    {
                          $_SESSION['user_name']=$username;
                          $_SESSION['user_email']=$useremail;
                          echo "joined,$username";
                      
                          
                    }
              }
          

      }
        else{  
          // so , here we get to know that user is already a member 
          // then we fetch the details of the user details and set the new user session id with the user database id
              $query2="select * from users where user_name='".mysqli_real_escape_string($con,$_POST['user_name'])."'"
             ." and user_email='".mysqli_real_escape_string($con,$_POST['user_email'])."' ";
             $user_result=mysqli_query($con,$query2);
             $row_for_user=mysqli_fetch_array($user_result);
             $_SESSION['user_name']=$row_for_user['user_name'];
             $_SESSION['user_email']=$row_for_user['user_email'];
             $_SESSION['user_id']=$row_for_user['user_id'];  // setting the session user id with the database id

             echo "already joined,".$_POST['user_name'];


      }



    }else{ //else the email is valid
       echo "invalidemail";
    }
}else{
  // if empty then alery empty fields
  echo "empty";
}


?>