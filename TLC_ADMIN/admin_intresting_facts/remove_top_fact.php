
<?php  
 
 include("../config/config.php");
session_start();
 // checks if the admin is valid or logged in
 if(isset($_SESSION['email']))
    {
 $fact_id=$_GET['fact_id'];
 $query="update intresting_facts set top_fact_status=0 where id=$fact_id ";;
 $exec=mysqli_query($con,$query);
 if($exec)

 {
     echo "0";
 }
 else{
     echo "1";
 }

}

?>