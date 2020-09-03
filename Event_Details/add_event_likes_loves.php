

<?php 
error_reporting(0);
session_start();

include("../config/config.php");

$event_id=$_GET['event_id'];


 
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
          //set all the session vars for blog likes
           setAllSessionVar($con);

        }
}




$user_id=$_SESSION['user_id'];



if(intval($_SESSION[$event_id.'event_likes'])<=0)
{


    
       $query="update events set event_likes=event_likes+1 where id=$event_id";
    
       $exec=mysqli_query($con,$query);
      
       if($exec)
       {
           echo "like";
           $_SESSION[$event_id.'event_likes']=intval($_SESSION[$event_id.'event_likes'])+1;

       }
      
    



}
else{
    
       $query2="update events set event_likes=event_likes-1 where id=$event_id";
    
       $exec2=mysqli_query($con,$query2);
      
       if($exec2)
       {
           echo "dis";
           $_SESSION[$event_id.'event_likes']=intval($_SESSION[$event_id.'event_likes'])-1;

       }
      
}

    function setAllSessionVar($con)
    {

  
    $query_for_event="select * from events order by id asc";

    $query_for_event_result=mysqli_query($con,$query_for_event);


    while($row4=mysqli_fetch_array($query_for_event_result)){
          
      $_SESSION[$row4['id'].'event_likes']=0;
    }
    
    $event_query="select * from events";
    $event_query_result=mysqli_query($con,$event_query) or die(mysqli_error($con));
    $event_row=mysqli_fetch_array($event_query_result);
    
    $_SESSION['event_starting_num']=$event_row['id'];
    }
    ?>





?>