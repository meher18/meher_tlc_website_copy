<?php 

session_start();
include("../config/config.php");

$table_name=$_GET['table_name'];

if(isset($_SESSION['email']))
{
        $query="truncate table $table_name";
        $exec=mysqli_query($con,$query);
        if($exec)
        {
            echo "deleted all";
        }
}






?>