<?php  

include("../config/config.php");

$pid=$_GET['pid'];
$query="delete from media_partners where partner_id=$pid";
$exec=mysqli_query($con,$query);


if($exec)
{
    header("location:media_partner.php");
}

?>