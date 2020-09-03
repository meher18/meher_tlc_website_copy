<?php 
  include("../../config/config.php");
  session_start();
  // echo $_SESSION['event_starting_num'];
  
  $event_videos_query="select * from videos where event_id=".intval($_SESSION['event_starting_num']);
  $event_videos_query_result=mysqli_query($con,$event_videos_query) or die(mysqli_error($con));


 
?>



<!DOCTYPE html>
<html>
<head>
  <title>Tlc Video Gallery</title>
      <link rel="icon" href="../../assets/logo.jpeg" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">

	 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
    <link
      rel="stylesheet"
      href="../../assets/dist/hoverCss/css/hover-min.css"
    />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"
	<link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/docs/angular/components/tabs/">
	<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
    />
    <link rel="stylesheet" type="text/css" href="video2.css"> 
   
</head>


<body class="container-fluid" id="top_view">
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
            <a style="font-weight: bold !important;" class="nav-link nav-link hvr-float-shadow" href="../../index.php"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a style="font-weight: bold !important;" class="nav-link nav-link hvr-float-shadow" href="../../about_Us/about-us2.php"
              >About</a
            >
          </li>
          <li class="nav-item">
            <a style="font-weight: bold !important;"
              class="nav-link nav-link hvr-float-shadow"
              href="../../blog_module/blog_main.php"
              >Blog</a
            >
          </li>
          <li class="nav-item dropdown">
            <a
            style="font-weight: bold !important;"
              class="nav-link dropdown-toggle nav-link hvr-float-shadow"
              href="#"
              id="navbardrop"
              data-toggle="dropdown"
              href="#"
              >Event</a
            >
            <div class="dropdown-menu">
              <a
                class="dropdown-item "
                href="../../Event_Module/event_module_main.php?event_category=upcoming"
                name="event_category"
                value="upcoming"
              >
                Upcoming Events
              </a>
              <a
                class="dropdown-item "
                href="../../Event_Module/event_module_main.php?event_category=sscorner"
                name="event_category"
                value="sscorner"
              >
                School Students Corner
              </a>
              <a
                class="dropdown-item "
                href="../../Event_Module/event_module_main.php?event_category=media"
                name="event_category"
                value="media"
              >
                Media Partnership Events
              </a>
              <a
                class="dropdown-item "
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
              style="font-weight: bold !important;"
              class="nav-link hvr-float-shadow "
              href="../../videosPodcasts/video&podcast.php"
              >Videos/Podcasts</a
            >
          </li>
          <li class="nav-item">
            <a
              style="font-weight: bold !important;"
              class="nav-link hvr-float-shadow"
              href="../../contactModule/contact-us1.html"
              >Contact</a
            >
          </li>
        </ul>
      </div>
	</nav>
	
<header>


	
  <img src="../../assets/video_header.jpeg" class="animate__animated animate__backInDown"> 
</header>
<div class="second">

   <?php  
       
       $recent_videos_query="select * from videos order by vdate desc limit 2";
       $recent_videos_query_result=mysqli_query($con,$recent_videos_query);
      
       
      ?>
	<h1 ><span>RECENT</span>VIDEOS </h1>
	 <!-- Image Overlay -->
	<div class="container ">
		<div class="row">


			 <?php 
         while($row_for_recent_video=mysqli_fetch_array($recent_videos_query_result))
         {

        ?>

          <div class="col-lg-6 " id="one">
            <div class=" text-white mb-5">
              <div class="view overlay zoom">
                <img
                  src="<?php echo $row_for_recent_video['vthumb']; ?>"
                  class="img-fluid"
                  alt="zoom"
                />
                <div class="mask flex-center waves-effect waves-light">
                    <form action="individual_video.php" method="POST" enctype="multipart/form-data">
                      <input type="text" name="video_id"  value="<?php echo $row_for_recent_video['id'] ?>" readonly style="display: none;">
                      <button
                      style="border:none;
                      background-color: transparent;" >
                      <img  src="./assets/icon1.png" />
                    </button>
                    </form>
                </div>
              </div>
           
            </div>
          </div>


          <?php 
          
        }
          
          ?>
			
	</div>	 
</div>
<div class="third">
	<div class="row" style="width: 100%"> 
		 <?php 
       
       $event_query="select * from events";
       $event_query_result=mysqli_query($con,$event_query);
      
       
      ?>
  <div class="column1">
  <div class="vertical-menu">
	      <?php   
       
       while ($row_for_events=mysqli_fetch_array($event_query_result))
       {
           
      ?>

          <a  id="<?php echo 'event_'.$row_for_events['id']; ?>"  onclick="paginate_event(<?php echo $row_for_events['id']; ?>)" >
          EVENT - <?php echo $row_for_events['ename']; ?>
        </a>
       

      <?php
          
       }?>

  
</div>
</div> 
<div class="column">
	<div class="grid-container">

		
            <?php 
            $event_videos_count=0;
            
          while($row_for_event_video=mysqli_fetch_array($event_videos_query_result))
          { 
           
            $event_videos_count++;
            ?>
    <div class="grid-item" id="one"> <div class="card text-white">
				<div class="view overlay zoom">
				 <img
                    id="<?php echo 'id_'.$video_id;  ?>"
                    src="<?php echo $row_for_event_video['vthumb']; ?>"
                    class="img-fluid"
                    alt="zoom"
                  />
					<div class="mask flex-center waves-effect waves-light">
				   <form action="individual_video.php" method="POST" enctype="multipart/form-data">
                      <input type="text" name="video_id"  value="<?php echo $row_for_event_video['id'] ?>" readonly style="display: none;">
                      <button
                      style="border:none;
                      background-color: transparent;" >
                      <img  src="./assets/icon1.png" />
                    </button>
                    </form>
					</div>
				</div>
			  </div>
			
			</div>

          <?php  } 
          
          if($event_videos_count===0)
          {
            echo '<div style="height:50vh;font-style:Montserrat;font-size:30px;text-align:center" class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Sorry currently no Videos availabe for this event </strong> please check other Events 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
          }
          
          ?>
 


  

  
</div>
</div>

</div>
</div>
<div class="fourth">
	<div class="row" style="width: 100%;">
		<div class="col-lg-3">
	<div id="design"></div>
</div>
<div class="col-lg-8 ">
	<h1 ><span>FEATURED</span>VIDEOS </h1></div>
</div>
</div>


<div class="fifth">
	  <?php 
       
       $liked_videos_query="select * from videos order by views desc limit 3";
       $liked_videos_query_result=mysqli_query($con,$liked_videos_query);
      
       ?>
		<div class="grid-container">

			
            <?php 
            
          while($row_for_liked_video=mysqli_fetch_array($liked_videos_query_result))
          {
           
            ?>
          
			<div class="grid-item" >
			  <div class="card text-white mb-5">
				<div class="view overlay zoom">
					<img
                  src="<?php echo $row_for_liked_video['vthumb'] ?>"
                  class="img-fluid"
                  alt="zoom"
                />
					<div class="mask flex-center waves-effect waves-light">
					  <form action="individual_video.php" method="POST" enctype="multipart/form-data">
                      <input type="text" name="video_id"  value="<?php echo $row_for_liked_video['id'] ?>" readonly style="display: none;">
                      <button
                      style="border:none;
                      background-color: transparent;" >
                      <img  src="./assets/icon1.png" />
                    </button>
                    </form>
					</div>
				</div>
			  </div>
			</div>

			
       <?php 

        }
        
        
        ?>
		
		  </div>
	 </div> 
  <a  
      href="#top_view"
      class="btn btn-dark"
      style="margin: 20px auto; padding: 10px;width: 50px;height: 50px;"
    >
      <i class="fa fa-arrow-up fa-2x"></i></a
    >
   <?php include("../../footer/footer3_.html"); ?>

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

     <script src="../../assets/jquery/jquery-3.5.1.js"></script>
      <script>

        const paginate_event=(event_id)=>{

           
            $.post("paginate_event_videos.php",
            {
            event_starting_num:event_id,
            },
          function(data, status){
            location.reload();
         
            });
        }
      document.getElementById('event_<?php echo $_SESSION['event_starting_num'] ?>').setAttribute("class","active")
  
  

    </script>
 </body>
</html>