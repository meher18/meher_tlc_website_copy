
<?php 

session_start();

include("../config/config.php");

$blog_id=$_GET['blog_id'];



 
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


 $query_for_blog_likes="select * from blog_likes where user_id=$user_id and blog_id=$blog_id";
 $query_for_blog_likes_result=mysqli_query($con,$query_for_blog_likes);
 $row_for_blog_likes=mysqli_fetch_array($query_for_blog_likes_result);

if(intval($row_for_blog_likes['like_status'])===0 )
{
      
    $query="update blog set likes=likes+1 where id=$blog_id";
    
    $exec=mysqli_query($con,$query);
    
    if($exec)
    {
        echo "like";

     $query1="update blog_likes set like_status=1 where user_id=$user_id and blog_id=$blog_id"; 
     $exec1=mysqli_query($con,$query1);
    }

}

 function setAllSessionVar($con)
    {
    
 

    $query1="select * from blog order by id asc";

    $exec1=mysqli_query($con,$query1); 

    while($row=mysqli_fetch_array($exec1))
    {
      

      $_SESSION[$row['id']."blog_id"]=0; //then initalize the individuial blog ids , which helps for the user to clap for the blog and add comment
    }

    }


    ?>
    







