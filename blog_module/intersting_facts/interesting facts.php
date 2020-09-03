<?php

    session_start();
    include("../../config/config.php");


    if(!isset($_SESSION['starting_fact_id']) || !isset($_SESSION['user_id']))

    {
      intializeUser($con);
    }

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

    // for the intresting facts  
    $starting_fact_id=0; // helps in pagination
    $query2="select * from intresting_facts order by id asc";
    $exec2=mysqli_query($con,$query2);
    $row2 =mysqli_fetch_array($exec2);
    $starting_fact_id=$row2['id'];
 

    

    $_SESSION['starting_fact_id']=$starting_fact_id; // intialize the starting fact id

    $_SESSION['facts_page_num']=1;  // helps in pagination
    }



   $current_starting_fact_id=intval($_SESSION['starting_fact_id']); 
   //echo $current_starting_fact_id;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tlc Intresting facts</title>
<link rel="icon" href="../../assets/logo.jpeg" />
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

    
    <link rel="stylesheet" href="facts.css">
    <style>
        body {background-color:#eee2d7;}
    </style>
</head>
<body>

    <!-- navbar --> 
    <nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
      <a class="navbar-brand" href="#"
        ><img src="../../assets/logo_png.png" alt="" /> THE LEGAL CHRONICLE</a
      >
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span
          class="navbar-toggler-icon"
          style="background-color: white !important;"
        ></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link nav-link hvr-float-shadow" href="../../index.php"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link hvr-float-shadow" href="../../about_Us/about-us2.php"
              >About</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link nav-link hvr-float-shadow"
              href="../../blog_module/blog_main.php"
              >Blog</a
            >
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle nav-link hvr-float-shadow"
              href="#"
              id="navbardrop"
              data-toggle="dropdown"
              href="#"
              >Event</a
            >
            <div class="dropdown-menu">
              <a
                class="dropdown-item hvr-underline-from-center"
                href="../../Event_Module/event_module_main.php?event_category=upcoming"
                name="event_category"
                value="upcoming"
              >
                Upcoming Events
              </a>
              <a
                class="dropdown-item hvr-underline-from-center"
                href="../../Event_Module/event_module_main.php?event_category=sscorner"
                name="event_category"
                value="sscorner"
              >
                School Students Corner
              </a>
              <a
                class="dropdown-item hvr-underline-from-center"
                href="../../Event_Module/event_module_main.php?event_category=media"
                name="event_category"
                value="media"
              >
                Media Partnership Events
              </a>
              <a
                class="dropdown-item hvr-underline-from-center"
                href="../../Event_Module/event_module_main.php?event_category=completed"
                name="event_category"
                value="completed"
              >
                Completed Events
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a
              class="nav-link hvr-float-shadow"
              href="../../videosPodcasts/video&podcast.php"
              >Videos/Podcasts</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link hvr-float-shadow"
              href="../../contactModule/contact-us1.html"
              >Contact</a
            >
          </li>
        </ul>
      </div>
    </nav>

    <div class="pagination1">
      <nav aria-label="Page navigation example">

       
          <ul class="pagination ">
            <?php
        
                $flag_for_pagination=0;
                $page_number=0;
                $query2="select * from intresting_facts";
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
</div>


 <h1 class="facts-header"><span style="background-color: #d9ebe9;">Interesting </span>&nbsp;<span style="background-color: #d9ebe9;">Facts</span></h1>
 <div class="facts_container" id="top_view">
  

    <?php
    
    $query3="select * from intresting_facts where id>=$current_starting_fact_id limit 12";
    $exec3=mysqli_query($con,$query3);
    while($row3=mysqli_fetch_array($exec3))
    {

 
    ?>

  <div class="blog-card blog-card-blog">
    <div class="blog-card-image">
        <a href="#"> <img class="img" src="../../admin_intresting_facts/facts/<?php echo $row3['fact_image'] ?>"> </a>
        <div class="ripple-cont"></div>
    </div>
    <div class="blog-table">
        <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i> Facts</h6>
        <h4 class="blog-card-caption">
          <?php echo $row3['title'] ?>
        </h4>
        <p class="blog-card-description"><?php echo $row3['fact'] ?></p>
        <div class="ftr">
            <div class="author" >
                <a href="#">  <span><?php echo $row3['fact_author'] ?></span> </a>
                <a href="#">  <span><?php echo $row3['fact_author_school']  ?></span> </a>
               
            </div>
        </div>
    </div>
</div>

    <?php
    }
        
    ?>




</div>

  <div class="pagination2">
     
  <nav aria-label="Page navigation example">
      <ul class="pagination">
         <?php
    
            $flag_for_pagination=0;
            $page_number=0;
            $query2="select * from intresting_facts";
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

   <a  
      href="#top_view"
      class="btn btn-dark"
      style="margin: 20px auto; padding: 10px;width: 50px;height: 50px;"
    >
      <i class="fa fa-arrow-up fa-2x"></i></a
    >

 <?php

 include("../../footer/footer3_.html");

 ?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="../../assets/jquery/jquery-3.5.1.js"></script>


  <script>
$(function () {
  $('[data-toggle="popover"]').popover()
})


 function paginate(fact_id,page_number){

    $.post("paginate.php",
    {
     starting_fact_id:fact_id,
     page_number:page_number
    },
  function(data, status){
    location.reload();
  });
 }

 document.querySelector('<?php echo ".page_".$_SESSION['facts_page_num']; ?>').setAttribute("class","active page-item");
  document.querySelector('<?php echo ".page_".$_SESSION['facts_page_num']; ?>').setAttribute("class","active page-item");

  </script>


</body>
</html>