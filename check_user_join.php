<?php 

include("config/config.php");
session_start();

// checks if the user is joined  or not ,
// if not joined then a modal is shown to join
if(isset($_SESSION['user_id']))
{


    if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_email']))
    {
        echo "notjoined";
        return ;
    }
    else{
        echo "joined";
    }

}
else{
    echo "noid";
}

?>