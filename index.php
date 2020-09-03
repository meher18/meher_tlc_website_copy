<?php
  
  // Legal chronicle user session creation

    error_reporting(0);
    include("config/config.php");
    session_start();
    



   
    $a=0;

$ip=$_SERVER['REMOTE_ADDR'];  // ip address of the machine 
$host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']); // host name of the machine

 
   // query for the showing the upcoming events  in the home page
   $query="select * from events  where etype='upcoming' limit 3";
   $exec=mysqli_query($con,$query);
   // /end of query

   // blog likes 
    $_SESSION['blog_likes']=0; 
  
    // check if the user_session is created with user_id 
    if(isset($_SESSION['user_id']))
    {
      // if the session is created then initialize all the wanted session vars
    setAllSessionVar($con);
   
    }else{
      // ok , if the user_session is not created then check if the
      // user is new user or the old user
     check_user($con);
    }
    //echo $_SESSION['event_starting_num'];

    //print_r($_SESSION);

    //echo $_SESSION['starting_blog_id'];

    // this function checks the user ip and host name  
    // if the ip address and host_name is present in the database then 
    // then it will not create new user
    // if the ip and host_name is absent in the data base then 
    // then create a new user  by inserting new data
    function check_user($con)
    {
      $ip=$_SERVER['REMOTE_ADDR'];
      $host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
      
      $array_host_address=array();   // this is the array of all host address
      $array_ip_address=array();     // array for ip address
      $query_to_check_user="select user_host_address,ip_address from users";
      $query_to_check_user_result=mysqli_query($con,$query_to_check_user) or die(mysqli_error($con));
      $array1=mysqli_fetch_all($query_to_check_user_result);
      while($row_for_check_user=mysqli_fetch_array($query_to_check_user_result))
      {
         // populate the arrays
     array_push($array_host_address,$row_for_check_user['user_host_address']); 
     array_push($array_ip_address,$row_for_check_user['ip_address']);
      }

      // check if the ip , and host address are new or old one
      if(!in_array($ip,$array_ip_address)  && !in_array($host_name,$array_host_address))
      { 
        // if there is no such ip and host address then 
        // create a new user with the correct ip and host info
        $query_insert_user="insert into users (user_host_address,ip_address) values('$host_name','$ip')";
        $query_insert_user_result=mysqli_query($con,$query_insert_user) or die(mysqli_error($con));
        if($query_insert_user_result)
        {
          // intialize the session vars
          $_SESSION['user_id']=mysqli_insert_id($con);
          //set all the session vars
           setAllSessionVar($con);

        }

      }else{
        //else if the ip address and the host address is present in the data base then
        // get the id of the user from the ip and host information
        //and initialize the session.
        $query_for_user_id="select user_id from users where user_host_address='$host_name' and ip_address='$ip'";
        $query_for_user_id_result=mysqli_query($con,$query_for_user_id_result);
        $row_for_user_id=mysqli_fetch_array($query_for_user_id_result);
        $_SESSION['user_id']=$row_for_user_id['user_id'];
        
        //set all session vars
        setAllSessionVar($con);
      }

     
      
    }
 
    function setAllSessionVar($con)
    {
    
     $starting_blog_id=0;  // this helps for the pagination of the blogs
    $flag_for_id=0;  // check  if the blog id count
    $query1="select * from blog order by id asc";
    $query_for_event="select * from events order by id asc";
    $exec1=mysqli_query($con,$query1);
    $query_for_event_result=mysqli_query($con,$query_for_event);
    while($row=mysqli_fetch_array($exec1))
    {
      $flag_for_id++;
      if($flag_for_id===1)
      {
           $starting_blog_id=$row['id']; // set the starting blog id if the flag count is only one
      }

      $_SESSION[$row['id']."blog_id"]=0; //then initalize the individuial blog ids , which helps for the user to clap for the blog and add comment
    }

    while($row4=mysqli_fetch_array($query_for_event_result)){
          
      $_SESSION[$row4['id'].'event_likes']=0;
    }
    
    // for the intresting facts  
    $starting_fact_id=0; // helps in pagination
    $query2="select * from intresting_facts order by id asc";
    $exec2=mysqli_query($con,$query2);
    $row2 =mysqli_fetch_array($exec2);
    $starting_fact_id=$row2['id'];
 

    
    $_SESSION['starting_blog_id']=$starting_blog_id; // intialize the starting blog id
    $_SESSION['starting_fact_id']=$starting_fact_id; // intialize the starting fact id
    $_SESSION['blog_page_num']=1;  // helps in pagination
    $_SESSION['facts_page_num']=1;  // helps in pagination

    $event_query="select * from events";
    $event_query_result=mysqli_query($con,$event_query) or die(mysqli_error($con));
    $event_row=mysqli_fetch_array($event_query_result);
    
    $_SESSION['event_starting_num']=$event_row['id'];
    }




    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>The Legal Chronicle</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
    <link rel="icon" href="assets/logo.jpeg" />


    <link rel="stylesheet" href="assets/dist/hoverCss/css/hover-min.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://use.fontawesome.com/releases/v5.0.6/css/all.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.5/waves.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"
    />

    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="home1.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body class="container-fluid">



    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
      <a class="navbar-brand" href="#"
        ><img src="assets/logo_png.png" alt="" /> THE LEGAL CHRONICLE</a
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
            <a class="nav-link nav-link hvr-float-shadow" href="./index.php"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link hvr-float-shadow" href="about_Us/about-us2.php"
              >About</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link nav-link hvr-float-shadow"
              href="blog_module/blog_main.php"
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
                href="./Event_Module/event_module_main.php?event_category=upcoming"
                name="event_category"
                value="upcoming"
              >
                Upcoming Events
              </a>
              <a
                class="dropdown-item"
                href="./Event_Module/event_module_main.php?event_category=sscorner"
                name="event_category"
                value="sscorner"
              >
                School Students Corner
              </a>
              <a
                class="dropdown-item "
                href="./Event_Module/event_module_main.php?event_category=media"
                name="event_category"
                value="media"
              >
                Media Partnership Events
              </a>
              <a
                class="dropdown-item "
                href="./Event_Module/event_module_main.php?event_category=completed"
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
              href="videosPodcasts/video&podcast.php"
              >Videos/Podcasts</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link hvr-float-shadow"
              href="contactModule/contact-us1.html"
              >Contact</a
            >
          </li>
        </ul>
      </div>
    </nav>

  <div class="first" id="top_view">
      <img class="law1" src="assets/law2.jpg" />
      <div class="seen">
        <img class="maam " src="assets/akriti_home_image.jpeg" />
        <div class="content1">
            <h1 style="font-weight: bolder;font-size: 50px;">Hey Friend!</h1>
            <p>
              Learning in law school may be tough. Stop looking 
              around for help from others, and stop feeling 
              helpless and lost. Let us be your guiding light 
              towards realization of your self-dependance!
            </p>
          <a href="#joinus">
              <button type="button" class="btn btn-secondary">
                 START NOW
            </button>
        </a>
        </div>
      </div>
      <div id="arrow">
        <img src="assets/arrowAi.png" >
      </div>

      <div class="second">
        <img src="assets/spectrum_home.jpeg" class="prism" />
        <div class="prismbox">
          <blockquote class="blockquote">
            <i class="fa fa-quote-left fa-3x" aria-hidden="true"></i>
            <p style="margin-left: 40px; font-weight: bold;">
              WE BRING OUT THE BEAUTIFUL TRUE
              COLOURS IN AN ORDINARY WHITE LIGHT .
            </p>
          </blockquote>
        </div>
      </div>
    </div>
<div class="third">
      <h1 style="text-transform: capitalize; margin: 40px 0px;font-size: 50px;font-weight: bold;">
       our specialization
      </h1>
      <div class="content">
        <a class="card" href="contactModule/contact-us1.html">
          <div
            class="front"
            style="
              background-image: url(https://images.unsplash.com/photo-1553559707-0d8e571f58e9?ixlib=rb-1.2.1&auto=format&fit=crop&w=375&q=80);
            "
          >
            <p>Mentorship & Guidance</p>
          </div>
          <div class="back">
            <div>
              <p>
                Like we always say, every student needs a mentor. We provide
                personal mentorship and guidance to enable you to deal with your
                general problems of life, specific problems of academics, or
                dire need for knowledge.
              </p>
              <button class="button">Contact us</button>
            </div>
          </div></a
        >

        <a class="card" href="Event_Module/event_module_main.php?event_category=completed">
          <div
            class="front"
            style="
              background-image: url(https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80);
            "
          >
            <p>Training programs & workshops</p>
          </div>
          <div class="back">
            <div>
              <p>
                We conduct training programs and workshops to give a mix of
                theoretical and practical knowledge in distinct areas such as
                legal research, moot court practices, drafting, many more.
              </p>
              <button class="button">Event</button>
            </div>
          </div></a
        >

        <a class="card" href="Event_Module/event_module_main.php?event_category=upcoming">
          <div
            class="front"
            style="
              background-image: url(https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=967&q=80);
            "
          >
            <p>Webinar</p>
          </div>
          <div class="back">
            <div>
              <p>
                We conduct webinars on contemporary issues & subjects of law
                from the viewpoint of career and excellence; besides, academics
                and examinations.
              </p>
              <button class="button">Save your seat</button>
            </div>
          </div></a
        >

        <a class="card skill" href="Event_Module/event_module_main.php?event_category=sscorner">
          <div
            class="front"
            style="
              background-image: url(https://images.unsplash.com/photo-1592500338176-f9df00b1320f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);
            "
          >
            <p>Competitions</p>
          </div>
          <div class="back">
            <div>
              <p>
                Our virtual competition strategy enables us to reach thousands
                of students around the nation who can participate at ease
                without the need to travel. We conduct moot court competitions,
                debate competitions, and many more and sometimes we innovate our
                competitions as well.
              </p>
              <button class="button">Event</button>
            </div>
          </div></a
        >

        <a class="card skill" href="contactModule/contact-us1.html" >
          <div
            class="front"
            style="
              background-image: url(https://images.unsplash.com/photo-1514580426463-fd77dc4d0672?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=330&q=80);
            "
          >
            <p>Skill & personality development</p>
          </div>
          <div class="back">
            <div>
              <p>
                Our internship program and campus ambassador program have been
                designed to inculcate professionalism in students, develop their
                communication skills and interpersonal skills.
              </p>
              <button class="button">Contact us</button>
            </div>
          </div></a
        >
      </div>
      <div class="fbox"></div>
</div>
<div class="fourth">
    <div class="content2">
    	<div class="row">
    		<div class="col-lg-9">
                <div class="slider single-item">
                    <div class="quote-container">
                            <div class="portrait octogon">
                                <img src="https://github.com/thelegalchronicle/thelegalchronicle/blob/master/home_testimonial_pics/Paridhi%20Goel.png?raw=true"/>
                            </div>
                            <div class="quote">
                                <blockquote class="blockquote2">
                                    <p> The Legal Chronicle is a great platform for law aspirants. I was working on an article and I asked for help. Within 24 hours, they provided me with a mentor and with his guidance, I not only won the competition but also secured a publication.</p>
                                    <cite>
                                    <span>Paridhi Goel</span>
                                    
                                    </cite>
                                </blockquote>
                            </div>
                    </div>
                    <div class="quote-container">
                        <div class="portrait octogon">
                            <img alt="" src="https://github.com/thelegalchronicle/thelegalchronicle/blob/master/home_testimonial_pics/Manav%20Garg.png?raw=true"/>
                         </div>
                         <div class="quote">
                                <blockquote class="blockquote2">
                                     <p>I was confused earlier in multitude of things and came in contact with the Legal Chronicle team. After talking to them, I believed that everyone needs a mentor and they are great mentors who would help you at different stages.
                                     </p>
                                    <cite>
                                    <span>Manav Garg</span>
                                   
                                     </cite>
                                </blockquote>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <img src="assets/testimonial_side_pic2.png" class="side-pic" />
            </div>
        </div>
    </div>  
      <svg >
        <defs>
          <clipPath clipPathUnits="objectBoundingBox" id="octogon">
            <polygon
              points="0.50001 0.00000, 0.61887 0.06700, 0.75011 0.06721, 0.81942 0.18444, 0.93300 0.25001, 0.93441 0.38641, 1.00000 0.49999, 0.93300 0.61887, 0.93300 0.75002, 0.81556 0.81944, 0.74999 0.93302, 0.61357 0.93444, 0.50001 1.00000, 0.38118 0.93302, 0.24998 0.93302, 0.18056 0.81556, 0.06700 0.74899, 0.06559 0.61359, 0.00000 0.49999, 0.06700 0.38111, 0.06700 0.25001, 0.18440 0.18058, 0.25043 0.06700, 0.38641 0.06559, 0.50001 0.00000"
            ></polygon>
          </clipPath>
        </defs>
      </svg>

</div>

 <div class="fifth">
      <h1><span id="heading">What</span><span id="heading">To</span><span id="heading">Expect?</span></h1>
      <div class="row expectcontent">
         <div class="col-lg-4">
            <h4 style="text-transform: uppercase !important;line-height: 2rem;"><span id="subhead">Honest Mentorship</span> <br> <span id="subhead">& Student Friendly</span> <br><span id="subhead"> Methods</span></h4>
             <p>We have seen people with knowledge as deep as an ocean but are not able to convey it to the students. This is where we ask what is more significant: Knowledge or Ability to Teach? We chose ability to teach and we are proud that we are
                able to come to the level of students and explain them vital concepts.</p>
          </div>
           <div class="col-lg-4">
              <h4 style="text-transform: uppercase !important;line-height: 2rem;"><span id="subhead">Workshops that</span> <br> <span id="subhead">bring a </span> <br><span id="subhead">Shift in You</span></h4>
              <p>We call our workshops, training programs for a reason. Our aim is not to lecture a crowd who do not understand anything. Our aim is to have a one on one personal interaction. Have a talk with one of our workshop participants and you will
                 find one thing in common: they all observed a profound shift in them.</p>
            </div>
            <div class="col-lg-4">
                 <h4 style="text-transform: uppercase !important;line-height: 2rem;"><span id="subhead">First Ever</span> <br> <span id="subhead"> Interactive Moot</span> <br><span id="subhead">Club</span></h4>
                <p>We proudly present the first ever virtual moot club in India. In our club, members work in teams on real moot propositions, they exchange roles and argue before their peers supervised by the President of the club and Mootmaster of the day.
                   They renew their membership every three months until they become a Mootmaster.</p>
            </div>
            <!-- <div class="col-lg-3">
                <h4><span id="subhead">A TOOLBELT</span> <br> <span id="subhead">FOR THE</span> <br><span id="subhead">LONG-HAUL</span></h4>
                <p>That’s right, we’re loading you up with all the tools you need to go forward with confidence and strength. We believe practical is powerful!</p>
             </div> -->
        </div>
</div>      
    <div class="sixth">
      <h1 style="font-weight: bold;text-transform: capitalize;letter-spacing: 0.3rem;font-size: 50px;">
        our upcoming events
      </h1>
      <div class="events">
        <?php 
           
           while($row3=mysqli_fetch_array($exec))
           {

          

          ?>
        <form
          class="event"
          action="Event_Details/event_details.php"
          method="POST"
        >
          <img
            src="admin_event/event/<?php echo $row3['ephoto']; ?>"
          />
          <div class="hue">
            <p>
              <?php echo $row3['ename'] ?>
            </p>
            <button name="event_id" value="<?php echo $row3['id']; ?>">
              GO TO THE EVENT
            </button>
          </div>
        </form>
        <?php 
           }
         ?>
      </div>
    </div>
 <div class="seventh" id="joinus">
      <div class="detox">
        <div class="detox-row">
          <div>
            <img
              src="assets/join_us2.png"
             
            />
          </div>
          <div class="form">
            <h2 style="font-weight: bolder;letter-spacing: 0.3rem;">Come and Join Us</h2>
            <p style="font-size: 18px;">
              Maybe you are planning to pursue law and confused
              which law school to go or maybe you are in a law school and
              confused how to get internship or get through a moot. For any form
              of guidance, answer lies only in three words: Come, Join us.
            </p>
            <form
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

    <!-- modal to pop up   -->
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1" id="modal-trigger2" style="visibility: hidden;">
  Launch demo modal 2
</button>

<!-- Modal -->
<div class="modal  fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #d9ebe9;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">TLC Welcome you</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " style="background-color: #d9ebe9;" id="modal-body2">
         <form 
         class="form-group"
              onsubmit="{this.preventDefault()}"
              enctype="multipart/form-data"
            >
              <input
                required
                id="user_name2"
                type="text"
                class="form-control"
                placeholder="your name"
              
              /><br />
              <input
                required
                id="user_email2"
                type="email"
                class="form-control"
                placeholder="your email "
                
              /><br />
              <button
               style="padding:10px 25px"
                onclick="addUser2()"
                name="join_us_button"
                type="button"
                style="background-color: black;"
                class="btn btn-secondary bg-dark"
              >
                JOIN US !
              </button>
            </form>
            <p style="color:rgb(255, 122, 122);visibility: hidden;" id="error_email">asdf</p>
      </div>
      <div class="modal-footer" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     </div>
    </div>
  </div>
</div>


 
 <?php include("footer/footer3_.html"); ?> 
   

    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"
    ></script>

    <script type="text/javascript">
      /* rainbow slider */
      var prevButton =
          '<button type="button" data-role="none" class="slick-prev" aria-label="prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" version="1.1"><path fill="#FFFFFF" d="M 16,16.46 11.415,11.875 16,7.29 14.585,5.875 l -6,6 6,6 z" /></svg></button>',
        nextButton =
          '<button type="button" data-role="none" class="slick-next" aria-label="next"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M8.585 16.46l4.585-4.585-4.585-4.585 1.415-1.415 6 6-6 6z"></path></svg></button>';

      $(".single-item").slick({
        infinite: true,
        dots: true,
        autoplay: false,
        autoplaySpeed: 4000,
        speed: 1000,
        cssEase: "ease-in-out",
        prevArrow: prevButton,
        nextArrow: nextButton,
      });

      $(".quote-container").mousedown(function () {
        $(".single-item").addClass("dragging");
      });
      $(".quote-container").mouseup(function () {
        $(".single-item").removeClass("dragging");
      });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
            } else if (this.responseText.match("empty")) {
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

        xmhttp.open("POST", "user_join.php", true);
        xmhttp.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        xmhttp.send("user_name=" + user_name + "&user_email=" + user_email);
      }



      function addUser2() {
        var user_name = document.getElementById("user_name2").value;
        var user_email = document.getElementById("user_email2").value;
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
              },2000)
              return;
            }else if(this.responseText.match("invalidemail"))
            {
              document.getElementById("error_email").innerHTML =
                "Please enter correct Email"
              document.getElementById("error_email").style.visibility="visible"
            
            }
            else if(this.responseText.match("empty"))
            {
              document.getElementById("error_email").innerHTML =
                "Please Fill the fields"
              document.getElementById("error_email").style.visibility="visible"
            }

            
          }
        };

        xmhttp.open("POST", "user_join_by_popup.php", true);
        xmhttp.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        xmhttp.send("user_name=" + user_name + "&user_email=" + user_email);
      }


     function check_user_join()
     {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                 if(this.responseText==="notjoined")
                 {
                   setTimeout(()=>{
                  document.getElementById("modal-trigger2").click();
                   },1000)
                 }
              }
          };
          xhttp.open("GET", "check_user_join.php", true);
          xhttp.send();
     }
    
  
   setTimeout(()=>{
        check_user_join();
   },1000);

    </script>



  </body>
</html>
