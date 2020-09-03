<?php
    include('../config/config.php');
    session_start();
    $stat = ' ';
    $pid = $_SESSION['pid'];
    $id = mysqli_real_escape_string($con,strip_tags($_POST['id']));
    $vname = mysqli_real_escape_string($con,strip_tags($_POST['vname']));
    $vthumb = mysqli_real_escape_string($con,strip_tags($_POST['vthumb']));

    $vlink = mysqli_real_escape_string($con,strip_tags($_POST['vlink']));
    $vdetails = mysqli_real_escape_string($con,strip_tags($_POST['vdetails']));

    $edit = "UPDATE videos ". "SET event_id='$id',vname='$vname',vthumb='$vthumb',vlink='$vlink',vdetails='$vdetails'". "WHERE id='$pid'";
    $edit_result = mysqli_query($con,$edit) or die(mysqli_error($con));
 

    if($edit_result) {
      $stat = 'Edited';
      header('Location: index.php');
    } else {
        $stat = 'not edited';
        header('Location: index.php');
    }

    $_SESSION['stat'] = $stat;
?>