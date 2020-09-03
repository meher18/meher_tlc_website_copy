<?php 

 include("config/config.php");
 session_start();

 $user_name=$_POST['user_name'];
 $user_email=$_POST['user_email'];

           if($user_name!="" && $user_email!="")
           {
               
            if(filter_var($user_email,FILTER_VALIDATE_EMAIL)) // to check the email 
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
                return;

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


            }else{
              // else invalid email 
              echo "invalidemail";
            }


            }
            else{
              echo "empty";
            }


?>