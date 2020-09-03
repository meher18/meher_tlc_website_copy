

<?php  

include("../config/config.php");

$partner_id=mysqli_real_escape_string($con,$_POST['id']);

$partner_details=mysqli_real_escape_string($con,$_POST['partner_details']);

$partner_link=mysqli_real_escape_string($con,$_POST['partner_link']);
$old_image=mysqli_real_escape_string($con,$_POST['old_image']);

unlink("partner_images/".$old_image);

$partner_image=$_FILES['partner_image']['name'];

$loc="partner_images/".$partner_image;

$query="update media_partners set partner_details='$partner_details',partner_image='$partner_image',partner_url='$partner_link'
where partner_id=$partner_id";

move_uploaded_file($_FILES['partner_image']['tmp_name'],$loc);

$exec=mysqli_query($con,$query);
if($exec)
{
    header("location:media_partner.php");

}

?>