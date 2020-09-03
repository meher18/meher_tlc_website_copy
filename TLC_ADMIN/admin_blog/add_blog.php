<?php
    include('../config/config.php');
    session_start();
    $add = ' ';
  
    // checks if the admin is valid or logged in
    if(isset($_SESSION['email']))
    {
    $bname = mysqli_real_escape_string($con,strip_tags($_POST['bname']));
    $aname = mysqli_real_escape_string($con,strip_tags($_POST['aname']));
    $date = mysqli_real_escape_string($con,strip_tags($_POST['date']));
    $brief = mysqli_real_escape_string($con,strip_tags($_POST['brief']));
    $content = mysqli_real_escape_string($con,strip_tags($_POST['content']));

    $d_image = $_FILES['image']['name'];
    $loc="blog/".$d_image;
    
    $a_image=$_FILES['aimage']['name'];
    $loc2="blog_author/".$a_image;
    
    



    // Entering the data into the database!
    $blog = "INSERT INTO blog(bname,aname,date,brief,image,content,aimage) VALUES('$bname','$aname','$date','$brief','$d_image','$content','$a_image')";
    $blog_result = mysqli_query($con,$blog) or die(mysqli_error($con));
    move_uploaded_file($_FILES['image']['tmp_name'],$loc);
    move_uploaded_file($_FILES['aimage']['tmp_name'],$loc2);

    // Checking if 
    if($blog_result) {
        $add = 'added';
        header('Location: blog.php');
    } else {
        $add = 'Not added';
        header('Location: blog.php');
    }

    $_SESSION['add'] = $add;
}
?>