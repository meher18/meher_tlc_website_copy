<?php 


include("../config/config.php");
session_start();


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Blog and Facts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../assets/logo.jpeg" />

    <link rel="stylesheet" href="../assets/dist/hoverCss/css/hover-min.css" />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      href="https://use.fontawesome.com/releases/v5.0.6/css/all.css"
      rel="stylesheet"
    />
     <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="blog_main_css.css" />
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
            <a
              class="nav-link nav-link hvr-float-shadow"
              href="../about_Us/about-us2.php"
              >About
            </a>
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
                class="dropdown-item"
                href="../Event_Module/event_module_main.php?event_category=upcoming"
                name="event_category"
                value="upcoming"
              >
                Upcoming Events
              </a>
              <a
                class="dropdown-item"
                href="../Event_Module/event_module_main.php?event_category=sscorner"
                name="event_category"
                value="sscorner"
              >
                School Students Corner
              </a>
              <a
                class="dropdown-item"
                href="../Event_Module/event_module_main.php?event_category=media"
                name="event_category"
                value="media"
              >
                Media Partnership Events
              </a>
              <a
                class="dropdown-item"
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

    <div class="first" id="top_view">
      <div class="first-container">
        <div class="row">
          <div class="col-lg-8  col-md-12">
            <img
              src="../assets/tlc_blog_main.png"
              style="height: 100%; width: 100%; padding-top: 50px;"
            />
          </div>
          <div class="col-lg-4 col-md-12">
            <p>
              <mark>Law things </mark><br />Articles ,<br />Short Reads,<br />and<br />Interesting Facts
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="second">
      <h2 style="margin:40px 0px"><span>Top</span>Categories</h2>
      <div class="con">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <a href="../blog_module/blog.php"
              ><img
                src="../assets/blog pic beside interesting facts pic.jpg"
            /></a>
            <div class="data">
              <h4 style="font-weight: bold;">SHORT ARTICLES</h4>
              <p style="text-align: center;">
              Tired of reading long boring articles ? Here are some short-reads to enjoy when you have five minutes to spare.
              </p>
            </div>
          </div>

          <div class="col col-lg-6 col-md-12">
            <a href="../blog_module/intersting_facts/interesting facts.php">
              <img
                src="../assets/interestingfactsunsplash.jpg"
            /></a>

            <div class="data">
              <h4 style="font-weight: bold;">INTERESTING FACTS</h4>
              <p style="text-align: center;">
               Did you know that Prashant Bhushan’s coin was held fake? Naah, that’s not true. True stuff’s inside, take a sneak peak!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="third">
      <h2 style="margin: 40px 0px;"><span>Top</span>Authors </h2>
      <div class="top-blog-block">
        <div class="blog-container">
          <?php 
           
           $query1="select * from blog where top_blog_status=1 order by id desc limit 3";
           $exec1=mysqli_query($con,$query1);

           while($row=mysqli_fetch_array($exec1))
           {

            

         
          
          ?>

          <!-- Grid column -->
          <div class="blog card">
            <!-- Featured image -->
            <div class="view overlay rounded z-depth-2 mb-7 blog-image">
              <img
                class="img-fluid waves-effect waves-light"
                src="../admin_blog/blog/<?php echo $row['image'] ?>"
                alt="Sample image"
              />
              <a href="./blog_details.php?blog_id=<?php echo $row['id']; ?>">
                <div
                  class="mask rgba-white-slight waves-effect waves-light"
                ></div>
              </a>
            </div>
            <div class="blog-block1">
              <img src="../assets/logo.jpeg" alt="" />
              <span>
                <p>The Legal Chronicle &nbsp;<i class="fas fa-crown"></i></p>
                <p>
                  <?php  $date=date_create($row['date']); $date_format=date_format($date,"F d") ;  echo $date_format; ?>
                </p>
                <p style="font-weight: bold;">
                  <?php $word_count =str_word_count($row['content']); echo round($word_count/120)."-".ceil($word_count/120);  ?>&nbsp;min
                  read
                </p>
              </span>
            </div>
            <!-- Post data -->
            <a
              style="display: inline-flex;"
              href="./blog_details.php?blog_id=<?php echo $row['id']; ?>"
            >
              <h4 class="blog-title font-weight-bold mb-3">
                <strong><?php echo $row['bname'] ?></strong>
              </h4>
            </a>
            <!-- Post data -->
            <p>
              BY <a class="font-weight-bold"><?php echo $row['aname'] ?></a>
            </p>
            <!-- <a  class=" blog-share " data-toggle="modal" data-target="#exampleModalCenter">
                       share this blog
                 </a> -->
            <hr />
            <div class="blog-tools">
              <!-- <div class="view"><i class="far fa-eye"></i>&nbsp;<p>0</p></div> -->
              <div id="heart" class="heart">
                <img src="../assets/clapYellow64.png" alt="" />&nbsp;&nbsp;
                <p><?php echo $row['likes'] ?></p>
              </div>
              <div class="comment">
                <i class="far fa-comment-alt"></i>&nbsp;
                <p><?php echo $row['comments']; ?></p>
              </div>
            </div>
          </div>

          <?php   }?>
        </div>
      </div>

     
      <div class="top-facts-block">
         <h1 style="text-align: center;padding: 90px 0px;
        background-color: #eee2d7;
	color: black;
	font-weight:bold;
  font-size: 60px;
  text-transform: capitalize;
	">Interesting <span style="color: #fc7658;">facts</span> </h1>
        <div class="fact-container">
          <?php 
           
           $query2="select * from intresting_facts where top_fact_status=1 order by id desc limit 3";
           $exec2=mysqli_query($con,$query2);

           while($row2=mysqli_fetch_array($exec2))
           {

            

         
          
          ?>
          <div class="blog-card blog-card-blog">
            <div class="blog-card-image">
              <a href="#">
                <img
                  class="img"
                  src="../admin_intresting_facts/facts/<?php echo $row2['fact_image'] ?>"
                />
              </a>
              <div class="ripple-cont"></div>
            </div>
            <div class="blog-table">
              <h6 class="blog-category blog-text-success">
                <i class="far fa-newspaper"></i> Facts
              </h6>
              <h4 class="blog-card-caption">
                <?php echo $row2['title'] ?>
              </h4>
              <p class="blog-card-description"><?php echo $row2['fact'] ?></p>
              <div class="ftr">
                <div class="author">
                  <a href="#">
                    <span><?php echo $row2['fact_author'] ?></span>
                  </a>
                  <a href="#">
                
                    <span><?php echo $row2['fact_author_school']  ?></span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <?php 
          
           }?>
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
    <?php include("../footer/footer3_.html"); ?>

    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
