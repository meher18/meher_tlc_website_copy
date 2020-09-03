
<?php

// error_reporting(0);
session_start();
error_reporting(0);

 $connect = mysqli_connect("localhost","root","","tlc");
  
 $event_id=$_POST['event_id'];

 if(isset($_SESSION['user_id']))
 {
   $user_id=$_SESSION['user_id'];
 }
 
//  echo $_SESSION['user_id'];


//  echo $_SESSION['likes'];
//  echo $_SESSION['love'];

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event</title>

  

      <link rel="stylesheet" href="../assets/dist/hoverCss/css/hover-min.css" />


    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Red+Rose&display=swap" rel="stylesheet">
    <!-- font awesome icons -->
   

     <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'><link rel="stylesheet" href="./style.css">
    <!-- aos library -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
    <link rel="stylesheet" href="event_details_style.css" />


<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <script src="event_main.js"></script>

  </head>
  <body>
   
    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
      <a class="navbar-brand" href="#"
        ><img src="../assets/logo_png.png" alt="" /> THE LEGAL CHRONICLE</a
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
            <a class="nav-link nav-link hvr-float-shadow" href="../index.php"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link hvr-float-shadow" href="../about_Us/about-us2.php"
              >About </a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link nav-link hvr-float-shadow"
              href="../blog_module/blog_main.php"
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
                href="../Event_Module/event_module_main.php?event_category=upcoming"
                name="event_category"
                value="upcoming"
              >
                Upcoming Events
              </a>
              <a
                class="dropdown-item "
                href="../Event_Module/event_module_main.php?event_category=sscorner"
                name="event_category"
                value="sscorner"
              >
                School Students Corner
              </a>
              <a
                class="dropdown-item "
                href="../Event_Module/event_module_main.php?event_category=media"
                name="event_category"
                value="media"
              >
                Media Partnership Events
              </a>
              <a
                class="dropdown-item "
                href="../Event_Module/event_module_main.php?event_category=completed"
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
              href="../videosPodcasts/video&podcast.php"
              >Videos/Podcasts</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link hvr-float-shadow"
              href="../contactModule/contact-us1.html"
              >Contact</a
            >
          </li>
        </ul>
      </div>
    </nav>

    <div class="event_header_container" id="top_view" >
        <h5>Scroll Down to See the Event Details</h5>
        
      </div>
  

    <?php
      $query=" select * from events where id=$event_id";
      $exec=mysqli_query($connect,$query);

      $row=mysqli_fetch_array($exec);
    ?>  

    <div class="event_container">

      
      

      <div class="event_block row">
      
        <div class="event_image_container col col-lg-6 ">
          <img
          id="event_image"
          data-aos="fade-left"
        
            src="../admin_event/event/<?php echo $row['ephoto'] ?>"
            alt="../admin_event/event/<?php echo $row['ephoto'] ?>"
          />
        </div>
        <div class="event_details_container col col-lg-5 "  data-aos="fade-right">
          <h5><?php echo $row['ename']; ?></h5>
         
          <div class="event-timeline">
            <?php
             $start_date=date_create($row['start_date']);
              $end_date=date_create($row['end_date']);
              
                
              $formated_start_date=date_format($start_date ,"d/F/y");
              $formated_end_date=date_format($end_date ,"d/F/y");
            
            ?>
            <span>
              <label for="start">WILL START ON</label>
            <div name="start" class="start-time badge badge-light">
            <?php  echo $formated_start_date; ?>
            </div>
            </span>
            <br />
            <div>
              <label for="end">WILL END ON</label>

            <div name="end" class="end-time badge badge-light ">
                         <?php echo $formated_end_date; ?>

            </div>
            </div>
          </div>
          
          <p>
           <?php echo $row['edetails'] ?>
          </p>

         
        </div>


      </div>

      <div class="event_thumbnail_container">
            <?php
              
            $query3="select * from event_thumbnails where event_id=$event_id";
            $exec3=mysqli_query($connect,$query3);

            while($row3=mysqli_fetch_array($exec3))
            {
            
            
            ?>
          <div class="thumbnail"><img onclick="changeEventImage(this)" onmouseout="setInitialImage(this)"
            src="../admin_event/eventThumbnails/<?php echo $row3['thumbnail_image'];?>" alt=""></div>
          
          <?php } ?>

    </div>

      <!-- tools block -->
      <div class="event_tools_container">
        <div class="like-container">
          <div>
              <a class="btn" onclick="add(<?php echo $event_id; ?>)" >
            
              <?php 
              if(isset($_SESSION['user_id']))

              {
                  if($_SESSION[$event_id.'event_likes']>0)
                  {
                    echo '<img src="../assets/clapYellow64.png" alt="" id="claps" class="clap" >';
                  }
                  else{
                      echo '<img src="../assets/clap2.png" alt="" id="claps" class="clap">';
                  }
              }
              else{
                  echo '<img src="../assets/clap2.png" alt="" id="claps" class="clap">';
              }
              ?>
             
              </a>
           
             <p id="like" class="chip" style="font-size: 18px;font-weight: bold;"><?php echo $row['event_likes'] ?></p>
            </div>
          <div>
     
          </div>
        </div>
        <ul class="tools right">
        </ul>
      </div>


   </div><!----Event-container ending-->



        <?php 
            $query4="select * from event_testimonials where event_id=$event_id";
            $exec4=mysqli_query($connect,$query4);
            $testimonial_number=mysqli_num_rows($exec4);

            if($testimonial_number>0)
            {
              echo "<div class='event_testimonials_block'>
          <p>See What Past Attendees Are Saying Online:</p>
           <div class='testimonials'>";
            while($row4=mysqli_fetch_array($exec4))
            {

          ?>
          
         
            <div class="testimonial">
                  <img class="card " src="../admin_event/eventTestimonial/<?php echo $row4['image'] ?>" alt="">       
                    <div class="testimonial_text">
                <pre style="height: 80%;white-space: pre-line;word-spacing: 0.2rem;line-height: 1.7rem;color:black;font-style:normal;font-weight:normal">
                   <?php
                   echo $row4['testimonial_text'];
                   ?>
                  
                </pre>
               <p style="position: relative;left: 10px;font-size: large;font-weight: bold;"> 
                 <?php
                    echo "By : ".$row4['author'];
                   ?>
                   
                  </p>
                </div>
            </div>
            <?php
             }
              echo "</div>";
               
              echo "</div>";

              }
          ?>
     
      </div>
  


 
    <?php
      
       $query1="select * from event_guests where event_id=$event_id";
       
       $exec1=mysqli_query($connect,$query1);
       $count_rows=mysqli_num_rows($exec1);
     
       if($count_rows>0)
       {
        
        echo ' <div class="guest-container-header" >
     Our Guest Speakers
      <i class="fa fa-users"></i>
    </div>';
 
    ?>
        <div class="guest_container">
    <?php
    
      while($row1=mysqli_fetch_array($exec1))
       {

    ?>

      <div class=" guest_card card" >
       
          <img class="circle" src="../admin_event/eventGuests/<?php echo $row1['guest_photo']; ?>" alt="../admin_event/eventGuests/<?php echo $row1['guest_photo']; ?>"
          >
          <p class="guest_name"><?php echo $row1['guest_name']; ?></p>
          <p class="guest_details"><?php echo $row1['guest_details']; ?></p>
      </div>
      
    <?php
    
      }

        }
    
    ?>
    
       </div>


    <?php 
          
          if($row['event_video'])
          {

          

    ?>


    <div class="video-container-header " >
      Event Videos
      <i class="fa fa-video"></i>
      
    </div>

    
    <div class="event-video-container ">
      <div class="video_block1"> <img src="../assets/sticker_videos1.png" alt=""></div>
    <div class="video_block2"></div>
    
      <iframe  src="<?php echo $row['event_video']; ?>" 
      frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen></iframe>

       <?php 
       
       if($row['event_playlist']!=="")
       {
         echo ' <a 
        target="base"
        href="'.$row['event_playlist'].'"
        class="toast black white-text"
        ><i class="fa fa-photo-video"></i> Full playlist</a
      >' ;
       }

      }
       
     ?>
      
     
    </div>
 
    <?php  
     
     $query_for_similar="select * from events order by id desc limit 3";
     $query_for_similar_result=mysqli_query($connect,$query_for_similar);

    
    
    ?>

     <div class="similar_events_block">
     <img src="../assets/sticker_events.png" alt="" class="similar_events_tag">
     <h5 style="margin:40px 0px">You may also like !</h5>
       <div class="similar_events_container">

       <?php 
       
       
     while($row_for_similar=mysqli_fetch_array($query_for_similar_result))
     {
       
  
       
       ?>
         <div class="event">
            <img src="../admin_event/event/<?php echo $row_for_similar['ephoto'];  ?>" alt="">
            <p><?php echo $row_for_similar['ename'];  ?></p>
            <form action="" method="POST" >
              <button name="event_id" value="<?php echo $row_for_similar['id'];  ?>">SEE MORE</button>
            </form>
          </div>

     <?php  }
     ?>
     
       </div>
     
   </div>


   
  <?php 
   
   if(isset($_SESSION['event_comment_add']))
   {
      if($_SESSION['event_comment_add']==="added")
      {

        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Comment Added &nbsp;</strong> You should reload the page to see the comment .
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
        </div>";
      }
   }
  
  
  ?>


     <div  class="comment-container  bg-light ">
         
    <div class="comment_tag" style="text-transform: capitalize; font-size: 30px;">
     Scroll to see all comments  <i class="fa fa-arrow-down" style="font-size: 40px;" data-aos="fade-down"data-aos-duration="4000" ></i>
    </div>
   
     <div class="comments" data-aos="fade-left">

      <?php
         $query2="select * from event_comments where event_id=$event_id order by comment_id desc";
         $exec2=mysqli_query($connect,$query2);
         $flag_for_comments=0;
         while($row2=mysqli_fetch_array($exec2))
         {
          $flag_for_comments++;
      ?>
          <div class="card " style="padding: 10px;margin-top: 10px;">
            <div class="user ">&nbsp;&nbsp;
            <i class="fa fa-user " style="padding: 5px;"></i>&nbsp;&nbsp;
            <p><?php echo $row2['user_name'] ?></p>
            </div>
            <div class="user-comment" style="font-weight: bold;font-size: 18px;"><?php echo $row2['event_comment'] ?> </div>
          </div>
          <?php 

           }
           if($flag_for_comments<=0)
           {
             echo "<h4 style='text-align:center;'>No Comments , Be first to comment</h4>";
           }
           ?>
      
     </div>
    
       <form id="comment" class=" card right white-text" data-aos="fade-right" >
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
          </div>
          <input required type="text" class="form-control" id="user_name" placeholder="user name" aria-label="user_name" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon2">a@example.com</span>
          </div>
          <input required type="email" class="form-control" id="user_email" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <input type="text" value="<?php echo $event_id;  ?>" id="event_id" readonly/>
        <textarea id="event_comment"  required class="textarea form-control" name="event_comment" placeholder="enter your comment" style="height: 100px; padding: 10px;"></textarea>
         
         <input style="display:none" type="text" name="event_id" value="<?php echo $event_id ?>">
        <button name="comment" type="button" onclick="addComment()" class="button btn-dark btn-block" style="margin:10px 0px" ><i class="fa fa-paper-plane"></i></button>
         

      </form>
     
    </div> 
       <a  
      href="#top_view"
      class="btn btn-dark"
      style="margin: 20px auto; padding: 10px;width: 50px;height: 50px;"
    >
      <i class="fa fa-arrow-up fa-2x"></i></a
    >


  <?php include("../footer/footer3_.html"); ?>





    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>


    <script>
      AOS.init();
     



      current_image="<?php echo '../admin_event/event/'.$row[3] ?>";
     </script>
     <script>

       

    function add(id) {
 
       var xmhttp = new XMLHttpRequest();
       xmhttp.onreadystatechange = function () {
       
        
         if (this.readyState == 4 && this.status == 200) {
        
           if (this.responseText.match("like")) {
             var num = Number(document.getElementById("like").innerHTML);
             num += 1;
             document.getElementById("like").innerHTML = num;
             document.getElementById("claps").setAttribute("src","../assets/clapYellow64.png");
             
             return;
           }
          else if(this.responseText.match("dis"))
           { 
                var num = Number(document.getElementById("like").innerHTML);
             num -= 1;
             document.getElementById("like").innerHTML = num;
             document.getElementById("claps").setAttribute("src","../assets/clap2.png");
           }


           // alert(this.responseText);
         }
       };
       xmhttp.open(
         "GET",
         "add_event_likes_loves.php?event_id=" + id,
         true
       );
       xmhttp.send();
  
}


function changeEventImage(e) {

 
    e.style.border = "2px dotted black";
    
  document.getElementById("event_image").src = e.src;


}
function setInitialImage(e)
{
  console.log(current_image);
     e.style.border ="none";
    
  document.getElementById("event_image").src=current_image;
  
}


function addComment()
{
        var event_comment = document.getElementById("event_comment").value;
        var event_id = document.getElementById("event_id").value;
        var user_name = document.getElementById("user_name").value;
        var user_email = document.getElementById("user_email").value;


        if(event_comment=="" || event_id =="" || user_name =="" || user_email == "")
        {
        alert("Please the fields to enter comment");
        return;
        }

      
        var xmhttp = new XMLHttpRequest();
        xmhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
           
          
            if (this.responseText.match("addedcomment")) {
          
                 location.reload();
            
              return;
            }


          }
        };

        xmhttp.open("POST", "add_event_comment.php", true);
        xmhttp.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        xmhttp.send("event_comment=" + event_comment + "&event_id=" + event_id+"&user_name="+user_name+"&user_email="+user_email);
}
     </script>
  </body>
</html>

