<?php
  
    include("../config/config.php");
    session_start();
    // $a=0;
    $event_category=$_GET['event_category'];


    $event_categorys=array("upcoming","completed","sscorner","media"); //event categories

// print_r($_SESSION);



  function getThumbnail($event_id,$con)
  {
    $query="select * from event_thumbnails where event_id=$event_id";
    $exec=mysqli_query($con,$query);
    $row=mysqli_fetch_array($exec);
    return  $row['thumbnail_image'];
  }


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Events</title>

    
    <link rel="stylesheet" href="../assets/dist/hoverCss/css/hover-min.css" />

     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'><link rel="stylesheet" href="./style.css">

    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&family=Red+Rose&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
  
    <!-- aos library -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->


    <link rel="stylesheet" href="event_module_style.css" />
       <!-- partial:index.partial.html -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <script src="event_module_main.js"></script>

    <!-- swiper js library -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  </head>
  <body>
   
    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-light navbar-light sticky-top" >
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


    <?php 
     
      if(in_array($event_category,$event_categorys))
     { 
    ?>

    
      <div class="event_header_container" id="top_view">
        <h5>Below <?php if($event_category==="sscorner")
        {
          echo "Is the Student Student Corner";
        }
        else if($event_category==="media"){
          echo "are the Media Partner Events";
        }else if($event_category==="completed")
        {
            echo "are the Completed Events";
        }
        else{
          echo "are the ".$event_category." Events";
           } ?>  </h5>
        <i class="material-icons">arrow_downward</i>
      </div>

      
     <div class="event-container" >
      <?php 
       
      $event_number=0;
        $query="select * from events where etype='$event_category'";
        $exec=mysqli_query($con,$query);
        $i=0;                //to check the no of events
       while( $row=mysqli_fetch_array($exec))
       { 
         $event_number++;
         $i++;
    ?>

      <div class="<?php if($event_number===1){ echo 'event';}else if($event_number===3){echo 'event2';}else if($event_number%2==0){echo 'event3';} ?>">
       <div class="event_number" data-aos="fade-down">Event <?php echo $i; ?></div>
     
      <h5>The Legal Chronicle</h5>
          <div class="<?php if($event_number===1){ echo 'event_block';}else if($event_number===3){echo 'event2_block';}else if($event_number%2==0){echo 'event3_block';} ?>" data-aos="fade-up">
            
          <h5><?php echo $row['ename'] ?></h5>
                  <p ><?php echo $row['edetails'] ?>
                      </p>


              <h4>WILL START ON - <?php 
              $date=date_create($row['start_date']);
              $end_date=date_create($row['end_date']);
              

              $formated_date=date_format($date ,"d/F/y");
              echo $formated_date;
              ?></h4>        

           <form class="event_form" action="../Event_Details/event_details.php" method="POST">
           
            <button
              name="event_id"
              type="submit"
              class="waves-effect waves-light"
              value="<?php echo $row['id'] ?>"
            >
              SEE MORE
            </button>
          </form>
          <span class="warning_text" style="color:red;font-weight:bold;">
              <?php
          
          $current_date=date("y-m-d");
          $current_date_obj=date_create($current_date);
          $diff= date_diff($current_date_obj,$end_date);
          $date_differnce=$diff->format("%R%a days");
          if($date_differnce<0)
          {
            echo "the Event has ended";
          }
          else if($date_differnce==0)
          {
             echo "The Event will be ended today , Join as early as possible";
          }
          else{
            echo "Event will be ended within $date_differnce ";
          }
         
        ?>
          </span>
      
          </div>

      <div class="<?php if($event_number===1){ echo 'event_block2';}else if($event_number===3){echo 'event2_block2';}else if($event_number%2==0){echo 'event3_block2';} ?>"
         style="background-image:url('<?php echo "../admin_event/eventThumbnails/".getThumbnail($row['id'],$con); ?>');" data-aos="fade-up"></div>
      
        <img
         data-aos="fade-left"
          src="../admin_event/event/<?php echo $row['ephoto'] ?>"
          alt="<?php echo $row['ephoto'] ?>"
        />

        <div class="<?php if($event_number===1){ echo 'event_arrow';}else if($event_number===3){echo 'event2_arrow';}else if($event_number%2==0){echo 'event3_arrow';} ?>" data-aos="fade-down">
            <i class="material-icons large white-text">arrow_downward</i>
        <?php if($row['other_link']!=='')
        
        {
          echo "<a class='event_other_link' href='".$row['other_link']."'>REGISTER NOW</a>";
        }
        else 
        {
        ?>
    
          <form  action="../Event_Details/event_details.php" method="POST">
         
            <button
              style="position:relative;margin-top:20px;left:0vh;text-align:center !important;"
              name="event_id"
              type="submit"
              class="waves-effect waves-light"
              value="<?php echo $row['id']; ?>"
            >
              REGISTER NOW
            </button>
          </form>
      <?php  }?>

        </div>
        <div class="<?php if($event_number===1){ echo 'event_details';}else if($event_number===3){echo 'event2_details';}else if($event_number%2==0){echo 'event3_details';} ?>" data-aos="fade-left">
          <p class="<?php if($event_number===1){ echo 'event_text';}else if($event_number===3){echo 'event2_text';}else if($event_number%2==0){echo 'event3_text';} ?>">
           <q style='quotes:"“" "”" ;'> <?php echo $row['etagline'] ?></q>
          </p>
          <form action="../Event_Details/event_details.php" method="POST">
           
            <button
              name="event_id"
              type="submit"
              class="waves-effect waves-light"
              value="<?php echo $row['id'] ?>"
            >
              More Info<i class="material-icons">more</i>
            </button>
          </form>
        </div>
      </div>
      <?php  
         
          if($event_number===3)
          {
            $event_number=0;
          }
    
    } 
      
       if($i===0)
       {
        
         echo '<div style="height:50vh;font-style:Montserrat;font-size:30px;text-align:center" class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry currently no '.$event_category.' events available</strong> please check other Events 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
       }
      ?>

<!-- for checking if the events are media partners events -->
 <?php 
 
 if($event_category==="media")
 {
 
 ?>     
 
 <h1 style="font-weight:bold;text-align:center;margin-top:10vh;font-size:50px">Prism Corner </h1>

<div class="partners-block">
  <!-- Swiper -->
  <div class="swiper-container">
    
    <div class="swiper-wrapper">

      <?php 
      
      $query_for_mpartners="select * from media_partners";
      $query_for_mpartners_result=mysqli_query($con,$query_for_mpartners);

      while($row2=mysqli_fetch_array($query_for_mpartners_result))
      {
      
      ?>
      <div class="swiper-slide">
      
        <div class="partner-details">
            <img src="../admin_partners/partner_images/<?php echo $row2['partner_image'] ?>" alt="">
           <div class="details">
             <p><?php echo $row2['partner_details'] ?>
              </p>
               <div class="link">
               <a href="<?php echo $row2['partner_url'] ?>" target="blank" style="font-weight: bold;letter-spacing: 0.2rem;">Visit </a>
               </div>
           </div>
        
        </div>
       

      </div>

      <?php  } ?>


      
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>


</div>

<?php 

 }
 ?>
      
    <!-- Button trigger modal -->
<button style="visibility: hidden;" id="modal-trigger" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>
<br>
 <a  
      href="#top_view"
      class="btn btn-dark"
      style="margin: 20px auto; padding: 10px;"
    >
      <i class="material-icons black-text">arrow_upward</i></a
    >

      <div class="subscribe-block">
        <div class="subscribe-img">
          <img src="../assets/join_us2.png" alt="">
        </div>
         <div class="subscribe-container">
            <div class="subscribe-text">
              <h4>Come and Join Us</h4>
               Maybe you are planning to pursue law and confused
              which law school to go or maybe you are in a law school and
              confused how to get internship or get through a moot. For any form
              of guidance, answer lies only in three words: Come, Join Us.
              </div>
              <form onsubmit="this.preventDefault()" class="subscribe-form" class="form-group">
                <input type="text" placeholder="Enter Name" id="user_name" required class="form-control">
                <input type="text" placeholder="Enter Email" id="user_email" required class="form-control">
                <button type="button" onclick="addUser()" class=" btn btn-dark form-control">JOIN US!</button>
              </form>
           </div>
      </div>
 
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Joining Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
        Hooray you joined us !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
     
<?php include("../footer/footer3_.html"); ?>


    </div>
     
  
    <?php
    
    }
    else{
      echo "<h4 class='red-text  center' style='height:50vh;font-style:Montserrat;'>Sorry ,Invalid Entry</h4>";
    }
    ?>
    

   


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
      // AOS.init();
  
    </script>
    <script>

      // swiper js
       var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,

      autoplay: {
        delay: 2500,
        disableOnInteraction: true,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    </script>
    <script>
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

        xmhttp.open("POST", "../user_join.php", true);
        xmhttp.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        xmhttp.send("user_name=" + user_name + "&user_email=" + user_email);
      }

    </script>
  </body>
</html>

