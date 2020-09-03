<?php
    include('../config/config.php');
    session_start();
    $stat = ' ';
     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $pid = $_SESSION['id'];
    $title = mysqli_real_escape_string($con,strip_tags($_POST['title']));
    $fact = mysqli_real_escape_string($con,strip_tags($_POST['fact']));
    $author_name = mysqli_real_escape_string($con,strip_tags($_POST['author_name']));
    $author_school = mysqli_real_escape_string($con,strip_tags($_POST['author_school']));
    $old_image = mysqli_real_escape_string($con,$_POST['fact_old_image']);
    

     
    unlink("facts/".$old_image); //unlink the old blog image

    // edit photo
    $d_image = $_FILES['fact_image']['name'];
    $loc="facts/".$d_image;
  


    $edit = "UPDATE intresting_facts SET title='$title',fact='$fact',fact_image='$d_image',fact_author='$author_name',
    fact_author_school='$author_school' WHERE id='$pid'";
    $edit_result = mysqli_query($con,$edit) or die(mysqli_error($con));

    move_uploaded_file($_FILES['fact_image']['tmp_name'],$loc);
    
  

    if($edit_result) {
      $stat = 'Edited';
      header('Location: fact.php');
    } else {
        $stat = 'not edited';
        header('Location: fact.php');
    }

    $_SESSION['stat'] = $stat;
  }
?>