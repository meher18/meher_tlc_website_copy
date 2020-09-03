
<?php  

session_start();

 $current_starting_blog_id=$_POST['starting_fact_id'];
 $_SESSION['starting_fact_id']=$current_starting_blog_id;
 $_SESSION['facts_page_num']=$_POST['page_number'];

echo $current_starting_blog_id;


?>