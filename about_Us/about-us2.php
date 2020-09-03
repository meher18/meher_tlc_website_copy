<?php 
 include("../config/config.php");
 session_start();

 $query_for_teamMembers="select * from members";
 $query_for_teamMembers_result=mysqli_query($con,$query_for_teamMembers);

 
?>

<!DOCTYPE html>
<html>
<head>
  <title>About TLC</title>
  <link rel="icon" href="../assets/logo.jpeg" />
   <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">

     <link rel="stylesheet" href="../assets/dist/hoverCss/css/hover-min.css" />
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Red+Rose:wght@700&display=swap"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
  />
  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
  />
  <link rel="stylesheet" href="ourteam1.css" />
  <link rel="stylesheet" type="text/css" href="about-us2.css">
</head>

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
              >About</a
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

<body class="container-fluid">
<div class="first" id="top_view">
	<div>
		<img class="law1" src="../assets/About us_Top Left.jpg">
		<img class="maam" src="../assets/about us top right.jpg">

	</div>
	<div class="content1">
		     <div id="tag">
					 <h1 id="curiosity" style="color:red">Curiosity</h1>
       	<h1><del style="text-decoration-color:red;">Necessity</del> is the mother<br>of Invention.</h2>

         </div>
  </div>
<div class="container arrow">
             <img src="../assets/arrowAi.png">
      </div>

</div>
<div class="second">
  <h3><u>LET US TALK ABOUT YOU FIRST, OKAY? </u> <br><br>(Well, you don’t really have a choice)</h3>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 para1">
       <p> Let’s do a small exercise. Get a paper and a pen and draw three concentric circles; one inner circle, one middle circle and an outer circle.</p>
       
     <p> Choose three persons who are closest to you. Amongst them, write the name of the person whom you love the most in the inner circle, person who is loved second most in the middle circle and the last person in the outer circle. Take your time and decide!<p>
Now, check the result and see where is your name in it? This is the first problem that we as students face; lack of self-recognition and self-importance.</p>
      </div>
      <div class="col-lg-6 para2">
        We have told ourselves so many tall stories based on others’ perception of us like ‘I am an average student’, ‘I am a failure in life’ and so on. You and I can together put an end to this. Let us tell the world that we are what we make of ourselves and we do not need to depend upon anyone for our life and our career.<p></p>
If you and I were to meet in a café and have few hours to spare, I would tell you that you can do whatever you want even if it sounds impossible today.
    </div>
  </div>
</div>
</div>

 <div class="third">
  <h1 id="values" style="font-weight:bold">Our Values</h1>
  <div class="content">
     
       <a class="card" href="../contactModule/contact-us1.html">
      <div class="front" style="background-image: url(https://images.unsplash.com/photo-1557318041-1ce374d55ebf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80)">
              <p>CURIOSITY</p>
      </div>
      <div class="back">
      <div>
        <p> Like we always say, every student needs a mentor. We provide personal mentorship and guidance to enable you to deal with your general problems of life, specific problems of academics, or dire need for knowledge.</p>
        <button class="button">Contact us</button>
      </div>
      </div></a>
      
      <a class="card" href="../Event_Module/event_module_main.php?event_category=completed">
    <div class="front" style="background-image: url(https://images.unsplash.com/photo-1519401706-5cf17f6e70de?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&q=80)">
      <p>WISDOM</p>
    </div>
    <div class="back">
      <div>
        <p>We conduct training programs and workshops to give a mix of theoretical and practical knowledge in distinct areas such as legal research, moot court practices, drafting, etc.</p>
        <button class="button">Event</button>
      </div>
    </div></a>
    
    <a class="card" href="../Event_Module/event_module_main.php?event_category=upcoming">
    <div class="front" style="background-image: url(https://images.unsplash.com/photo-1549633030-89d0743bad01?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80)">
      <p>BELIEF</p>
    </div>
    <div class="back">
      <div>
        <p>We conduct webinars on contemporary issues & subjects of law from the viewpoint of career and excellence; besides, academics and examinations.</p>
        <button class="button">Save your seat</button>
      </div>
    </div></a>
  </div>
  <img src="../assets/about us tlc.jpg">
  <div class="tlc">
    <h1 style="font-weight:bold">Okay! Now, Let us Tell You About TLC …</h1>
  </div>
</div>
 

 <div class="fourth">
  <div class="atlc">
    <div class="row">
      <div class="col-lg-6 cont1">
        <p>
          The Legal Chronicle, a virtual guidance and training institution, is a social fraternity of individuals dedicated to the motto of “Erudition & Pragmatism”.<br>
          <br>
Our vision is to help students navigate through their law school and get imbued with knowledge in their journey. We endeavor to enable them to make decisions based on practical aspects of life and be immune to stigma and dogma.
<br>
<br>
Our vision is to be able to provide much more than sophisticated theoretical knowledge. We host an array of events all year round, like training programs & workshops, moot practices & competitions. We give you first-hand experience to sail through law school.</p>

        
      </div>
      <div class="col-lg-6 cont2">
        <p>
          Our virtual platform not only makes us a student-friendly organization but also an environment-friendly organization, saving tons of paper used daily. We provide personal mentorship and guidance to enable you to deal with your general problems of life, specific problems of academics, or dire need for knowledge.
          <br>
          <br>
          Our webinars and virtual competitions are tailor-made to provide you with a mix of theoretical and practical knowledge in distinct areas.</p>

        
      </div>
    </div>
  </div>

 </div>
<div class="fifth">
  <h2 style="text-align: center;padding-top:10vh;"></h2>

<div class="container team-row">
      <div class="team-member text-center">
        <div class="team-img">
          <img class="tpo" src="https://github.com/thelegalchronicle/thelegalchronicle/blob/master/founder_pics/1.png?raw=true" alt="founder pic" />
          <div class="overlay">
            <div class="team-details text-center" style="top: 30%;">
              <p>
                <b style="font-size: 1.5em;font-weight:bold">Aakriti Vikas</b><br /><br />
                Lawyer
               <br /><br />

                <i class="far fa-envelope" style="color: #fff; margin-right: 0.5rem;"></i>
                <i style="font-size: 14px;">aakriti.tlc@gmail.com</i><br />
                <i class="fas fa-phone-volume" style="
                    color: #fff;
                    margin-right: 0.2rem;
                    font-size: 14px;
                  "></i>
                <i>+91 8951365715</i>
              </p>
            </div>
          </div>
        </div>
        <h5 class="team-title">Aakriti  Vikas</h5>
        <p>Founder & Partner</p>
      </div>


    
      <div class="team-member text-center">
        <div class="team-img">
          <img class="tpo " src="https://github.com/thelegalchronicle/thelegalchronicle/blob/master/founder_pics/2.png?raw=true" alt="founder pic" />
          <div class="overlay">
            <div class="team-details text-center" style="top: 30%;">
              <p>
                <b style="font-size: 1.5em;font-weight:bold">Ashish Agarwal</b><br /><br />
              Lawyer
             <br /><br />

                <i class="far fa-envelope" style="color: #fff; margin-right: 0.5rem;"></i>
                <i style="font-size: 14px;">ashishagarwal.tlc@gmail.com</i><br />
                <i class="fas fa-phone-volume" style="
                    color: #fff;
                    margin-right: 0.2rem;
                    font-size: 14px;
                  "></i>
                <i>+91 8861410479</i>
              </p>
            </div>
          </div>
        </div>
        <h5 class="team-title">Ashish Agarwal</h5>
        <p>Founder & Partner</p>
      </div>


</div>
<div class="developers-block-header" style="width:100%;text-align: center;margin-top:10vh"><h1 style="font-weight:bold;">Core Members</h1></div>
  
<div class=" other_team_members">
   
  <?php 
   
  while($row_for_members=mysqli_fetch_array($query_for_teamMembers_result))
  {
  
  ?>
    
          <div class="my-team">
              <div class="pic">
                  <img  src="../admin_member/member_photo/<?php echo $row_for_members['image']; ?>">
                  <ul class="social">
                    <?php if($row_for_members['facebook_link']!="")
                    {
                      echo "<li><a href='".$row_for_members['facebook_link']."' class='fab fa-linkedin'></a></li>";
                    }
                  if($row_for_members['twitter_link']!="")
                    {
                       echo "<li><a href='".$row_for_members['twitter_link']."' class='fab fa-twitter'></a></li>";
                    }
                   if($row_for_members['linkedin_link']!="")
                   {
                      echo "<li><a href='".$row_for_members['linkedin_link']."' class='fab fa-linkedin'></a></li>";
                   }
                   if($row_for_members['instagram_link']!="")
                   {
                     echo "<li><a href='".$row_for_members['instagram_link']."' class='fab fa-instagram'></a></li>";
                   }
                    
                    ?>
                    
                  </ul>
              </div>
              <div class="team-content">
                  <div class="team-info">
                      <h3 class="title">
                        <?php echo $row_for_members['mname']; ?>
                      </h3>
                      <span class="post">
                        <?php echo $row_for_members['bio']; ?>
                      </span>
                  </div>
              </div>
          </div>

  <?php } ?>
  
 </div>

<div class="developers-block-header" style="width:100%;text-align: center;margin-top:10vh"><h2 style="text-transform: capitalize;
font-weight:bold;
">designed and develped by</h2></div>

  <div class="developers-block">
    <div class="">
      <div class="ol-team">
        <img src="../assets/1.jpg" />
        <div class="team-content">
          <h3 class="title">Dinesh sahu</h3>
          <span class="post">Web Developer</span>
          <ul class="social">
            <li>
              <a
                href="https://www.facebook.com/profile.php?id=100012942063932"
                target="_blank"
                ><i class="fab fa-facebook-f"></i
              ></a>
            </li>
            <li>
              <a
                href="https://twitter.com/dineshsahu003?s=09"
                target="_blank"
                ><i class="fab fa-twitter"></i
              ></a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/in/dinesh-sahu-a54692174"
                target="_blank"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="">
      <div class="ol-team">
        <img src="../assets/3.jpg" />
        <div class="team-content">
          <h3 class="title">Rupesh Chandra Mohanty</h3>
          <span class="post">Web Developer</span>
          <ul class="social">
            <li>
              <a
                href="https://www.facebook.com/rupesh.mohanty.1806"
                target="_blank"
                ><i class="fab fa-facebook-f"></i
              ></a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/mwlite/in/rupesh-chandra-mohanty-23050a176"
                target="_blank"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="">
      <div class="ol-team">
        <img src="../assets/4.jpg" />
        <div class="team-content">
          <h3 class="title">T Meher Sai Ram</h3>
          <span class="post">Web Developer</span>
          <ul class="social">
            <li>
              <a
                href="https://m.facebook.com/meher.tangudu.9"
                target="_blank"
                ><i class="fab fa-facebook-f"></i
              ></a>
            </li>
            <li>
              <a
                href="https://mobile.twitter.com/TMeherSaiRam1"
                target="_blank"
                ><i class="fab fa-twitter"></i
              ></a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/in/mehersairam/"
                target="_blank"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="">
      <div class="ol-team">
        <img src="../assets/2.jpg" />
        <div class="team-content">
          <h3 class="title">V Asha</h3>
          <span class="post">Web Developer</span>
          <ul class="social">
            <li>
              <a
                href="https://www.facebook.com/shilpaasha.vaddi"
                target="_blank"
                ><i class="fab fa-facebook-f"></i
              ></a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/in/v-asha-0b1814173"
                target="_blank"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="">
      <div class="ol-team">
        <img src="../assets/5.jpg" />
        <div class="team-content">
          <h3 class="title">Ishan Ranasingh</h3>
          <span class="post">Web Developer</span>
          <ul class="social">
            <li>
              <a
                href="https://www.facebook.com/ishan.ranasingh"
                target="_blank"
                ><i class="fab fa-facebook-f"></i
              ></a>
            </li>
            <li>
              <a
                href="https://twitter.com/IshanRanasingh?s=08"
                target="_blank"
                ><i class="fab fa-twitter"></i
              ></a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/in/ishan-ranasingh-689687b2"
                target="_blank"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </li>
          </ul>
        </div>
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
<?php include("../footer/footer3_.html");  ?>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
