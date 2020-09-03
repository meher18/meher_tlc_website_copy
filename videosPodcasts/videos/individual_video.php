
<?php  

include("../../config/config.php");

$id=$_POST['video_id'];
$query_for_video="select * from videos where id=$id";
$query_for_video_result=mysqli_query($con,$query_for_video);

$row_for_video=mysqli_fetch_array($query_for_video_result);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video</title>
        <link rel="icon" href="../../assets/logo.jpeg" />

    <link
      href="https://use.fontawesome.com/releases/v5.0.6/css/all.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/dist/hoverCss/css/hover-min.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="individual_video_style.css" />
  </head>
  <body >

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
                class="dropdown-item"
                href="../../Event_Module/event_module_main.php?event_category=upcoming"
                name="event_category"
                value="upcoming"
              >
                Upcoming Events
              </a>
              <a
                class="dropdown-item"
                href="../../Event_Module/event_module_main.php?event_category=sscorner"
                name="event_category"
                value="sscorner"
              >
                School Students Corner
              </a>
              <a
                class="dropdown-item"
                href="../../Event_Module/event_module_main.php?event_category=media"
                name="event_category"
                value="media"
              >
                Media Partnership Events
              </a>
              <a
                class="dropdown-item"
                href="../../Event_Module/event_module_main.php?event_category=completed"
                name="event_category"
                value="completed"
              >
                Completed Events
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link hvr-float-shadow" href="../../videosPodcasts/video&podcast.php">Videos/Podcasts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hvr-float-shadow" href="../../contactModule/contact-us1.html">Contact</a>
          </li>
        </ul>
      </div>
    </nav>


     <div class="block1 jumbotron-fluid" id="top_view">
        <div class="container">
          <h4 class="display-4" id="event_name"><?php echo $row_for_video['vname'] ?></h4>
          
        </div>
      </div>
   
    <div class="video-container jumbotron">
      <div class="video">
        <iframe
          src="https://www.youtube.com/embed/<?php echo $row_for_video['vlink'] ?>"
          frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        ></iframe>
      </div>
      <div class="video_details " id="video_details">
       <h2 style="font-weight: bold;">Description</h2>
      <pre class="card">
          <?php echo $row_for_video['vdetails']; ?> 
      </pre>
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


  </body>
</html>
