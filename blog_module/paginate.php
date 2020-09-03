
<?php  

session_start();

 $current_starting_blog_id=$_POST['starting_blog_id'];
 $_SESSION['starting_blog_id']=$current_starting_blog_id;
 $_SESSION['blog_page_num']=$_POST['page_number'];

echo $current_starting_blog_id;


?>