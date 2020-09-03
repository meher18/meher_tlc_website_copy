<?php
    include('../config/config.php');
    session_start();
    $stat = ' ';

     // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $pid = $_SESSION['id'];
    $bname = mysqli_real_escape_string($con,strip_tags($_POST['bname']));
    $aname = mysqli_real_escape_string($con,strip_tags($_POST['aname']));
    $date = mysqli_real_escape_string($con,strip_tags($_POST['date']));
    $brief = mysqli_real_escape_string($con,strip_tags($_POST['brief']));
    $old_image = mysqli_real_escape_string($con,$_POST['old_image']);
    $a_old_image = mysqli_real_escape_string($con,$_POST['a_old_image']);

     
    unlink("blog/".$old_image); //unlink the old blog image
    unlink("blog_author/".$a_old_image); // unlink old author image
    // edit photo
    $d_image = $_FILES['new_image']['name'];
    $loc="blog/".$d_image;
  
    $a_image=$_FILES['aimage']['name'];
    $loc2="blog_author/".$a_image;

    $content = mysqli_real_escape_string($con,strip_tags($_POST['content']));

    $edit = "UPDATE blog SET bname='$bname',aname='$aname',date='$date',brief='$brief',image='$d_image',content='$content',aimage='$a_image'". "WHERE id='$pid'";
    $edit_result = mysqli_query($con,$edit) or die(mysqli_error($con));

    move_uploaded_file($_FILES['new_image']['tmp_name'],$loc);
    move_uploaded_file($_FILES['aimage']['tmp_name'],$loc2);
  

    if($edit_result) {
      $stat = 'Edited';
      header('Location: blog.php');
    } else {
        $stat = 'not edited';
        header('Location: blog.php');
    }

    $_SESSION['stat'] = $stat;
  }
?>