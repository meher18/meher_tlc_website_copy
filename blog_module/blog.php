
<?php
 
    error_reporting(0);
    include("../config/config.php");
    session_start();

 
  // blog starting number(blog_id) ,which changes when we paginate
    
    if(!isset($_SESSION['starting_blog_id']) || !isset($_SESSION['user_id']))
    {
       intializeUser($con);
    } 
    else{
       $current_blog_starting_number=intval($_SESSION['starting_blog_id']); 
    }
     
    $_SESSION['blog_id']='';
 
   //only 12 blogs will be placed in this page
    $query="select * from blog where id >=$current_blog_starting_number limit 12"; 
    $exec=mysqli_query($con,$query);
    // we can the check the session variables
    // print_r($_SESSION); 
function intializeUser($con)
{
       $ip=$_SERVER['REMOTE_ADDR'];  // ip address of the machine 
       $host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']); // host name of the machine


          // if there is no such ip and host address then 
        // create a new user with the correct ip and host info
        $query_insert_user="insert into users (user_host_address,ip_address) values('$host_name','$ip')";
        $query_insert_user_result=mysqli_query($con,$query_insert_user) or die(mysqli_error($con));
        if($query_insert_user_result)
        {
          // intialize the session vars
          $_SESSION['user_id']=mysqli_insert_id($con);
          //set all the session vars for blog likes
           setAllSessionVar($con);

        }
      
      
}
     function setAllSessionVar($con)
    {
    
    $starting_blog_id=0;  // this helps for the pagination of the blogs
    $flag_for_id=0;  // check  if the blog id count
    $query1="select * from blog order by id asc";
  
    $exec1=mysqli_query($con,$query1);
   
    while($row=mysqli_fetch_array($exec1))
    {
      $flag_for_id++;
      if($flag_for_id===1)
      {
           $starting_blog_id=$row['id']; // set the starting blog id if the flag count is only one
      }

      $_SESSION[$row['id']."blog_id"]=0; //then initalize the individuial blog ids , which helps for the user to clap for the blog and add comment
    } 
    $_SESSION['starting_blog_id']=$starting_blog_id; // intialize the starting blog id

    $_SESSION['blog_page_num']=1;  // helps in pagination
    }

  
 
 ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tlc Short Reads</title>
        <link rel="icon" href="../assets/logo.jpeg" />


            <!-- Font Awesome -->
 <link rel="stylesheet" href="../assets/dist/hoverCss/css/hover-min.css">
             
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
 <!-- Google Fonts -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
 <!-- Bootstrap core CSS -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
 <!-- Material Design Bootstrap -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
 
 
 <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

<link rel="stylesheet" href="blog_stye.css">
<style>
body {background-color:d9ebe9;}
</style>

</head>
<body>
  

      <!-- navbar -->
      <nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">

      <a class="navbar-brand" href="#"><img src="../assets/logo_png.png" alt=""> THE LEGAL CHRONICLE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon" style="background-color: white !important;"></span>
      </button>
      <div class="collapse navbar-collapse " id="collapsibleNavbar">
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class="nav-link nav-link hvr-float-shadow" style="font-weight: bold !important;" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link hvr-float-shadow" style="font-weight: bold !important;" href="../about_Us/about-us2.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link hvr-float-shadow"style="font-weight: bold !important;"  href="./blog_main.php">Blog</a>
          </li>    
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link hvr-float-shadow" style="font-weight: bold !important;" href="#" id="navbardrop" data-toggle="dropdown" href="#">Event</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../Event_Module/event_module_main.php?event_category=upcoming" name="event_category" value="upcoming">
                              Upcoming Events
              </a>
              <a class="dropdown-item" href="../Event_Module/event_module_main.php?event_category=sscorner" name="event_category" value="sscorner">
                                School Students Corner
              </a>
              <a class="dropdown-item " href="../Event_Module/event_module_main.php?event_category=media" name="event_category" value="media">
                                Media Partnership Events
            </a>
              <a class="dropdown-item " href="../Event_Module/event_module_main.php?event_category=completed" name="event_category" value="completed">
                                Completed Events
              </a>
          </div>
          </li>    
            <li class="nav-item">
            <a style="font-weight: bold !important;"
              class="nav-link hvr-float-shadow"
              href="../videosPodcasts/video&podcast.php"
              >Videos/Podcasts</a
            >
          </li>
          <li class="nav-item">
            <a  style="font-weight: bold !important;" class="nav-link hvr-float-shadow" href="../contactModule/contact-us1.html">Contact</a>
          </li>    
        </ul>
      </div>  
    </nav>

    <div class="pagination1 " >
      
      <nav aria-label="Page navigation example">
         
          <ul class="pagination ">
            <?php
        
                $flag_for_pagination=0;
                $page_number=0;
                $query2="select * from blog";
                $exec2=mysqli_query($con,$query2);
                while($row2=mysqli_fetch_array($exec2))
                {
                  if($flag_for_pagination%12===0)
                  {
                    $page_number++;
                    echo "<li class='page-item page_$page_number' ><a class='page-link' onclick=paginate(".$row2['id'].",$page_number".") >$page_number</a></li>";
                  };
                  $flag_for_pagination++;
                }

            ?>

          </ul>
          
      </nav>
      
      <h4 class="card">PAGE <span class="badge badge-dark"><?php echo $_SESSION['blog_page_num']; ?></span></h4>
    </div>

    

<!-- Section: Blog v.2 -->
<section class="text-center my-7  " id="top_view" >

  <!-- Section heading -->
  <h1 class="h1-responsive font-weight-bold my-5 " style="font-size: 70px !important;">TLC Blog </h1>
  <!-- Section description -->
  <h4  class="dark-grey-text w-responsive mx-auto mb-5">
   
</h4>
        
    <div class=" blogs-block">
      <!-- Grid row -->
      <div class=" blogs-container">

        <?php 
          while($row=mysqli_fetch_array($exec))
          {

        ?>
        <!-- Grid column -->
        <div class=" blog card">
            
        <?php
         
         $link_for_share= (isset($_SERVER['HTTPS'])?"https":"http")."://$_SERVER[HTTP_HOST]/TheLegalChronicle/blog_module/blog_details.php?blog_id=".$row['id'];
         $text_for_share= $row['bname']." A Blog by 'The Legal Chronicle', written by ".$row['aname'];
      
        
        ?>
          <!-- Featured image -->
          <div class="view overlay rounded z-depth-2 mb-7 blog-image">
            <img class="img-fluid  waves-effect waves-light" src="../admin_blog/blog/<?php echo $row['image'] ?>" alt="Sample image">
            <a href="./blog_details.php?blog_id=<?php echo $row['id']; ?>">
              <div class="mask rgba-white-slight waves-effect waves-light"></div>
            </a>
          </div>
          <div class="blog-block1">
            <img src="../assets/logo.jpeg" alt="">
             <span>
                <p>The Legal Chronicle &nbsp;<i class="fas fa-crown"></i></p>
                 <p> <?php  $date=date_create($row['date']); $date_format=date_format($date,"F d") ;  echo $date_format; ?></p>
                <p style="font-weight:bold;"><?php $word_count =str_word_count($row['content']); echo round($word_count/120)."-".ceil($word_count/120);  ?>&nbsp;min read</p>

             </span>
          </div>
          <!-- Post data -->
            <a style="display: inline-flex;" href="./blog_details.php?blog_id=<?php echo $row['id']; ?>">
                <h4 class=" blog-title font-weight-bold mb-3"><strong><?php echo $row['bname'] ?></strong>
                  </h4>
            </a>
            <!-- Post data -->
           <p>BY <a class="font-weight-bold"><?php echo $row['aname'] ?></a></p>
                <!-- <a  class=" blog-share " data-toggle="modal" data-target="#exampleModalCenter">
                       share this blog
                 </a> -->
                    <hr>
            <div class="blog-tools">
              <!-- <div class="view"><i class="far fa-eye"></i>&nbsp;<p>0</p></div> -->
              <div  id="heart" class="heart"><img src="../assets/clapYellow64.png" alt="">&nbsp;&nbsp;<p><?php echo $row['likes'] ?></p></div>
              <div class="comment"><i class="far  fa-comment-alt"></i>&nbsp;<p><?php echo $row['comments']; ?></p></div>
            </div>
          
        </div>
      <!-- <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share">Share via Whatsapp</a> -->
      
        <?php 
        }
          
        
        ?> 
      </div>
      <!-- Grid row -->
    </div>

  <div class="pagination2">
     
  <nav aria-label="Page navigation example">
      <ul class="pagination">
         <?php
    
            $flag_for_pagination=0;
            $page_number=0;
            $query2="select * from blog";
            $exec2=mysqli_query($con,$query2);
            while($row2=mysqli_fetch_array($exec2))
            {
            
              if($flag_for_pagination%12===0)
              {
                $page_number++;
                echo "<li class='page-item page_$page_number'><a class='page-link' onclick=paginate(".$row2['id'].",$page_number".") >$page_number</a></li>";
              };
              $flag_for_pagination++;
            }

        ?>

  

      </ul>
  </nav>
  </div>
</section>
<!-- Section: Blog v.2 -->

 <a  
      href="#top_view"
      class="btn btn-dark"
      style="margin: 20px auto; padding: 10px;width: 50px;height: 50px; font-family:FontAwesome"
    >
      <i class="fa fa-arrow-up fa-2x"></i></a
    >
  <?php include("../footer/footer3_.html"); ?>






<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="../assets/jquery/jquery-3.5.1.js"></script>
<script src="../assets/jquery/pagination.js"></script>
<script>



 function  animateHeart()
   {
   document.getElementById("heart").style.setProperty("animation-name","heartBeat");
   document.getElementById("heart").style.setProperty("animation-duration","1s");
   
  
 }
   
  function shareOnEmail()
  { 
 
    window.location.href = "mailto:mehersairamt@gmail.com?subject=Subject&body=mehersairam";
  }


 const paginate= (blog_id,page_number)=>{

    $.post("paginate.php",
    {
     starting_blog_id:blog_id,
     page_number:page_number
    },
  function(data, status){
    location.reload();
  });
 }

 document.querySelector('<?php echo ".page_".$_SESSION['blog_page_num']; ?>').setAttribute("class","active page-item");
 document.querySelector('<?php echo ".page_".$_SESSION['blog_page_num']; ?>').setAttribute("class","active page-item");

</script>
</body>
</html>