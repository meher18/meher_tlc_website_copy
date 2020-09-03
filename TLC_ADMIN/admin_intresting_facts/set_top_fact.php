
<?php  
 
 include("../config/config.php");

 $fact_id=$_GET['fact_id'];
 $query="update intresting_facts set top_fact_status=1 where id=$fact_id ";;
 $exec=mysqli_query($con,$query);
 if($exec)

 {
     echo "1";
 }
 else{
     echo "0";
 }


?>