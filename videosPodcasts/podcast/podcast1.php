<?php

session_start();
include("../../config/config.php");

$query="select * from podcasts order by podcast_id desc limit 6";
$exec=mysqli_query($con,$query) or die(mysqli_error($con));


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Tlc Podcasts</title>
        <link rel="icon" href="../../assets/logo.jpeg" />


       <link rel="stylesheet" href="../../assets/dist/hoverCss/css/hover-min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.7/mediaelementplayer.min.css">


    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,600&display=swap" rel="stylesheet">
    
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap">
    
    <link rel="stylesheet" href="podcast1.css">
    <link rel="stylesheet" type="text/css" href="audio1.css">
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
              >About </a
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

    <div class="first" id="top_view">
    	<img class="image1" src="img/img1.jpg">
    	<div class="content1">
    		  <h1 style="font-weight:bold" >Begin your Podcast <br>with <br>TLC Now</h1>
          <a href="#joinus"><button type="button" class="btn btn-dark btn-lg">Subscribe Now</button></a>
      </div>
      <img class="image2" src="../../assets/Lets talk about__ Aakriti.png"> 
      <img src="img/coffee.jpg" class="image3"> 
    </div>

    
    <div class="second" style="margin-top: 10vh;">

      <h1>Let's Talk About with Aakriti || The Legal Chronicle</h1>
      <div class="container" style="margin-top: 10vh;">
         <div class="row">
            <div class="col-lg-6">
              If you are reading this, it means you are only one step behind from finding a solution to your problems. My name is Aakriti and this podcast is about teaching you your value, your importance and the importance of values like self-love and self-dependence.
            </div>
            <div class="col-lg-6">
               Here, we talk about different problems in the life of a student with special focus on law students and try our best to provide a solution which doesn't sound absurd. If you have read this much, you are certainly in need of talking. Why wait? Go ahead and listen!
            </div>
          </div>
      </div>
    </div>

    <div class="third">
        <h1>Plugged In+Ready To Go</h1>
      <div class="podcast">
        <?php 
        
        $flag=0;
        while($row=mysqli_fetch_array($exec))
        {
         $flag++;
          
           
        ?>
  
         
            <div class=" card rellax" data-rellax-speed="<?php  
                          if($flag%2!==0)
                          {
                            echo    '-1';
                          }
                          else {
                             echo    '2';
                          }
                        
                        ?>"    data-rellax-xs-speed="0">
              <div class="<?php  
                          if($flag%2!==0)
                          {
                            echo   'ones';
                          }
                          else {
                             echo    'twos';
                          }
                        
                        ?>" >
                <div class="player">
                     <div class="cover">
                        <img src="../../admin_podcasts/podcast_images/<?php echo $row['pic'] ?>" alt="">
                     </div>
                     <div class="info">
                         <div class="title">Let's Talk About with Aakriti</div>
                      
                     </div>
                    
                   
                     <div class="music-box" style="width: 100%;">
                      
                       <audio style="width: 100%;" class="fc-media<?php echo $flag ?>">

                        <?php  
                          if($row['audio']!=='')
                          {
                            echo    "<source src='../../admin_podcasts/podcasts/".$row['audio']."' type='audio/mp3'/>";
                          }
                          else {
                             echo    "<source src='".$row['audio_link']."' type='audio/mp3'/>";
                          }
                        
                        ?>
                      
                    </audio>
                         
                     </div>
                  </div>
                  <div class="description">
                    <h2><?php echo $row['header'] ?></h2>
                    <p><?php echo $row['details']; ?></p>
                  </div>
              </div>
            </div>

<?php 

 }
?>

       
       
           
       

       
            
    </div>
  </div>


  
    <div class="fourth">
      <h1>Want More of Such Podcasts from Me?</h1>
      <div id="button">
      <a href="spotify:show:0Hc3c6UWpYRo4sju9Aacnt"><button type="button" class="btn btn-dark btn-lg" >Listen On Spotify</button></a>
      </div>
    </div>
     <div class="fifth" id="joinus">
        <div class="form">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12" style="display: flex;align-content: center;
            align-items: center;flex-direction: column;">
              <img src="../../assets/join_us2.png">
            </div>
            <div  class="col-lg-6 col-md-12 col-sm-12 content" id="guide">
                
              <h2 style="font-weight: bolder;letter-spacing: 0.3rem;">Come and Join Us</h2>
            <p style="font-size: 18px;font-weight: bold;">
              Maybe you are planning to pursue law and confused
              which law school to go or maybe you are in a law school and
              confused how to get internship or get through a moot. For any form
              of guidance, answer lies only in three words: Come, Join us.
            </p>
                      <form 
         class="form-group"
              onsubmit="{this.preventDefault()}"
              enctype="multipart/form-data"
            >
              <input
                required
                id="user_name"
                type="text"
                class="form-control"
                placeholder="your name"
              
              /><br />
              <input
                required
                id="user_email"
                type="email"
                class="form-control"
                placeholder="your email "
                
              /><br />
              <button
                onclick="addUser()"
                name="join_us_button"
                type="button"
                style="background-color: black;"
                class="btn btn-secondary"
              >
                JOIN US !
              </button>
            </form>
            </div>
          </div>
        </div>
      </div>
      
       <a  
      href="#top_view"
      class="btn btn-dark"
      style="margin: 20px auto; padding: 10px;width: 50px;height: 50px;"
    >
      <i class="fa fa-arrow-up fa-2x"></i></a
    >

        <!-- Button trigger modal -->
    <button
      style="visibility: hidden;"
      id="modal-trigger"
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModalCenter"
    >
      Launch demo modal
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
      style="border: 2px solid black;"
    >
      <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="modal_body">
            Hooray you joined us !
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
      <div class="sixth">
       
        <?php  include("../../footer/footer3_.html") ?>
    
      </div>





          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>
      <script >
        var rellax = new Rellax('.rellax');

        
      </script>
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  

      


<script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.7/mediaelement-and-player.min.js"></script>
<script>
  var audio = {    
    init: function() {        
    var $that = this;        
        $(function() {            
            $that.components.media();        
        });    
    },
    components: {        
        media: function(target) {            
            var media1 = $('audio.fc-media1', (target !== undefined) ? target : 'body');            
            var media2 = $('audio.fc-media2', (target !== undefined) ? target : 'body');            
            var media3 = $('audio.fc-media3', (target !== undefined) ? target : 'body');            
            var media4 = $('audio.fc-media4', (target !== undefined) ? target : 'body');            
            var media5 = $('audio.fc-media5', (target !== undefined) ? target : 'body');            
            var media6 = $('audio.fc-media6', (target !== undefined) ? target : 'body');            
            if (media1.length) {                
                media1.mediaelementplayer({                    
                    audioHeight: 40,
                    features : ['playpause', 'current', 'duration', 'progress', 'volume', 'tracks', 'fullscreen'],
                    alwaysShowControls      : true,
                    timeAndDurationSeparator: '<span></span>',
                    iPadUseNativeControls: true,
                    iPhoneUseNativeControls: true,
                    AndroidUseNativeControls: true                
                });            
            }        
            if (media2.length) {                
                media2.mediaelementplayer({                    
                    audioHeight: 40,
                    features : ['playpause', 'current', 'duration', 'progress', 'volume', 'tracks', 'fullscreen'],
                    alwaysShowControls      : true,
                    timeAndDurationSeparator: '<span></span>',
                    iPadUseNativeControls: true,
                    iPhoneUseNativeControls: true,
                    AndroidUseNativeControls: true                
                });            
            }        
            if (media3.length) {                
                media3.mediaelementplayer({                    
                    audioHeight: 40,
                    features : ['playpause', 'current', 'duration', 'progress', 'volume', 'tracks', 'fullscreen'],
                    alwaysShowControls      : true,
                    timeAndDurationSeparator: '<span></span>',
                    iPadUseNativeControls: true,
                    iPhoneUseNativeControls: true,
                    AndroidUseNativeControls: true                
                });            
            }        
            if (media4.length) {                
                media4.mediaelementplayer({                    
                    audioHeight: 40,
                    features : ['playpause', 'current', 'duration', 'progress', 'volume', 'tracks', 'fullscreen'],
                    alwaysShowControls      : true,
                    timeAndDurationSeparator: '<span></span>',
                    iPadUseNativeControls: true,
                    iPhoneUseNativeControls: true,
                    AndroidUseNativeControls: true                
                });            
            }        
            if (media5.length) {                
                media5.mediaelementplayer({                    
                    audioHeight: 40,
                    features : ['playpause', 'current', 'duration', 'progress', 'volume', 'tracks', 'fullscreen'],
                    alwaysShowControls      : true,
                    timeAndDurationSeparator: '<span></span>',
                    iPadUseNativeControls: true,
                    iPhoneUseNativeControls: true,
                    AndroidUseNativeControls: true                
                });            
            }        
            if (media6.length) {                
                media6.mediaelementplayer({                    
                    audioHeight: 40,
                    features : ['playpause', 'current', 'duration', 'progress', 'volume', 'tracks', 'fullscreen'],
                    alwaysShowControls      : true,
                    timeAndDurationSeparator: '<span></span>',
                    iPadUseNativeControls: true,
                    iPhoneUseNativeControls: true,
                    AndroidUseNativeControls: true                
                });            
            }        
        },
            
    },
};
audio.init();



   function addUser() {
        var user_name = document.getElementById("user_name").value;
        var user_email = document.getElementById("user_email").value;
        var xmhttp = new XMLHttpRequest();
        xmhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            var array = this.responseText.split(",");
        
            if (array[0] === "joined") {
              document.getElementById("modal_body").innerHTML =
                "Thanks for joining us " + array[1];

              document.getElementById("modal-trigger").click();
              setTimeout(()=>{
                 location.reload();
              },1600)
              return;
            } else if (array[0] === "already joined") {
              document.getElementById("modal_body").innerHTML =
                "Wow ! " +
                array[1] +
                " you are already a member .  please check your email we have sent , for more details :)";
              document.getElementById("modal-trigger").click();
              setTimeout(()=>{
                location.reload();
              },1600)
            }else if (this.responseText.match("empty")) {
              document.getElementById("modal_body").innerHTML =
                "Fill the fields";
              document.getElementById("modal-trigger").click();
            }
            else if(this.responseText.match("invalidemail"))
            {
              document.getElementById("modal_body").innerHTML =
                "Please enter correct Email"
              document.getElementById("modal-trigger").click();
              
            }
          }
        };

        xmhttp.open("POST", "../../user_join.php", true);
        xmhttp.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        xmhttp.send("user_name=" + user_name + "&user_email=" + user_email);
      }


</script>
  </body>
</html>
