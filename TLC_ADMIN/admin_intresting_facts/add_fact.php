<?php
    include('../config/config.php');
    session_start();
    $add = ' ';

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $title = mysqli_real_escape_string($con,strip_tags($_POST['title']));
    $fact = mysqli_real_escape_string($con,strip_tags($_POST['fact']));
    $author_name = mysqli_real_escape_string($con,strip_tags($_POST['author_name']));
    $author_school_name = mysqli_real_escape_string($con,strip_tags($_POST['author_school']));
  

    $d_image = $_FILES['fact_image']['name'];
    $loc="facts/".$d_image;
    
   
    
    



    // Entering the data into the database!
    $query = "INSERT INTO intresting_facts(title,fact,fact_image,fact_author,fact_author_school) VALUES('$title','$fact','$d_image','$author_name','$author_school_name')";
    $exec = mysqli_query($con,$query) or die(mysqli_error($con));
    move_uploaded_file($_FILES['fact_image']['tmp_name'],$loc);
  

    // Checking if 
    if($exec) {
        $add = 'added';
        header('Location: fact.php');
    } else {
        $add = 'Not added';
        header('Location: fact.php');
    }

    $_SESSION['add'] = $add;
}
    
?>