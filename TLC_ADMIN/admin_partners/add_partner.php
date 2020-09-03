<?php  

include("../config/config.php");

$partner_details=mysqli_real_escape_string($con,$_POST['partner_details']);

$partner_link=mysqli_real_escape_string($con,$_POST['partner_link']);

$partner_image=$_FILES['partner_image']['name'];

$loc="partner_images/".$partner_image;

$query="insert into media_partners(partner_details,partner_image,partner_url) values('$partner_details','$partner_image','$partner_link')";

move_uploaded_file($_FILES['partner_image']['tmp_name'],$loc);

$exec=mysqli_query($con,$query);
if($exec)
{
    header("location:media_partner.php");

}

?>