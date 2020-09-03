<?php
  session_start();
  error_reporting(0);
  include("../config/config.php");

  $blog_id=$_GET['blog_id'];
  

   


   $user_id=$_SESSION['user_id'];

   $query="select * from blog where id=$blog_id";
   $exec=mysqli_query($con,$query);
   $row=mysqli_fetch_array($exec);


  
    // this are the links for sharing the blog , create a dynamic link for the blog
    $link_for_share= (isset($_SERVER['HTTPS'])?"https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $text_for_share= $row['bname']."  Blog by ''The Legal Chronicle'', written by ".$row['aname'];
      
      if($_SESSION[$blog_id."blog_id"]===0)
      {
            $query2="insert into blog_likes(user_id,like_status,blog_id) values($user_id,0,$blog_id)";
            $exec2=mysqli_query($con,$query2);
            $_SESSION[$blog_id."blog_id"]=1;
      }
      
  
        $query3="select * from blog_likes where user_id=$user_id and blog_id=$blog_id";
        $exec3=mysqli_query($con,$query3);
        $row3=mysqli_fetch_array($exec3); 
 
        //print_r($_SESSION);


         function getUsername($user_id,$con)
        {
           $query6="select * from users where user_id=$user_id";
           $exec6=mysqli_query($con,$query6);
           $row6=mysqli_fetch_array($exec6);
          
           return $row6['user_name'];
        }
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tlc Blog</title>
        <link rel="icon" href="../assets/logo.jpeg" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/dist/hoverCss/css/hover-min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    />
    <!-- Google Fonts -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    />
    <!-- Bootstrap core CSS -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Material Design Bootstrap -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="blog_details_style.css" />
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
            <a style="font-weight: bold !important;" class="nav-link nav-link hvr-float-shadow" href="../index.php"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a style="font-weight: bold !important;" class="nav-link nav-link hvr-float-shadow" href="../about_Us/about-us2.php"
              >About</a
            >
          </li>
          <li  class="nav-item">
            <a style="font-weight: bold !important;"
              class="nav-link nav-link hvr-float-shadow"
              href="./blog.php"
              >Blog</a
            >
          </li>
          <li class="nav-item dropdown">
            <a style="font-weight: bold !important;"
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
            <a style="font-weight: bold !important;"
              class="nav-link hvr-float-shadow"
              href="../videosPodcasts/video&podcast.php"
              >Videos/Podcasts</a
            >
          </li>
          <li class="nav-item">
            <a style="font-weight: bold !important;" class="nav-link hvr-float-shadow" href="../contactModule/contact-us1.html">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="sidenav" id="sidenav">
      <div class="alert alert-danger alert-dismissible fade show" style="font-weight: bold;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Double click</strong> any where to dismiss this
       </div>
      <i class="fa fa-times fa-3x" onclick="closeSideNav()" style="cursor: pointer;float:right;color: rgb(255, 142, 142);margin:20px"></i>
      <h4>You can leave a comment here !</h4>
      <?php 
        if(isset($_SESSION['user_id']))
        {
          
          $query4="select * from users where user_id=$user_id";
          $exec4=mysqli_query($con,$query4);
          $row4=mysqli_fetch_array($exec4);
      
      ?>
      <form action="add_comment.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="user_name">Enter Name</label>
           <input type="text" name="user_name" id="" value="<?php echo $row4['user_name'] ?>" class="form-control"  required>
        </div>
        <div class="form-group">
          <label for="user_email">Enter Email</label>
         <input type="email" name="user_email" id="" value="<?php echo $row4['user_email'] ?>" class="form-control" required>
        </div>
       <div class="form-group">
         <label for="comment"> Comment Here !</label>
           <textarea rows="5"  type="text" name="comment"  class="form-control" required></textarea>
       </div>
       <button type="submit" class=" btn btn-primary">
        Add Comment &nbsp; <i class="fas fa-comment"></i>
       </button>
       <div class="form-group">
    
         <input type="email" name="blog_id" id="" value="<?php echo $row['id'] ?>" class="form-control" required readonly style="visibility:hidden">
        </div>
      </form>  
        <?php } ?> 
        <h4>Below are the comments </h4>
      <div class="comment-container " id="comments">

      <?php 
        $query5="select * from blog_comments where blog_id=$blog_id";
        $exec5=mysqli_query($con,$query5);
        $blog_count=0;
        while($row5=mysqli_fetch_array($exec5))
        {
        
          $blog_count++;
       
      ?>
        <div class="comment card">
          <div>
              <i class="fa fa-user fa-2x"></i>
           <p class="comment_user_name" style="color: rgb(105, 101, 101);"><u><?php echo getUsername($row5['user_id'],$con); ?></u></p>
          </div>
          <div class="comment_text">
          <?php echo $row5['blog_comment'] ?>
          </div>
        </div>

        <?php  } 
        
        if($blog_count<=0)
        {
  
           echo "<h4>No Comments , Be first to add comment</h4>";

        }
          ?>
      
       
      </div>
        <!--end of comment containe -->
     
    </div>
    <!-- end of sidenav  -->



    <!-- blog container -->
    <div class="container blog-container" id="top_view">
      <!-- blog -->
  
      <div class="blog ">
        <h4 class="blog-title">
                <?php echo $row['bname'] ?>  
        </h4>
        <div class="blog-block1">
          <div class="blog-author-block">
            <div class="author-image-block">

             <?php if($row['aimage']==='') 
                echo '<i class="fas fa-user-edit fa-3x"></i>';
              else 
              echo "<img
                src='../admin_blog/blog_author/".$row['aimage']."'
                alt=''
                width='90'
                height='90'
                class='author-image'
              />"
              
              ?>  
             
              <!-- <i class="fas fa-user fa-2x"></i> -->
            </div>
            <div class="author-details">
              <p class="author-name"><?php echo $row['aname'] ?>  </p>
              <p class="date"><i class="far fa-calendar-alt"></i> &nbsp;<?php  $date=date_create($row['date']); $date_format=date_format($date,"F d Y") ;  echo $date_format; ?></p>
             
            </div>
          </div>
          <div class="share-block">
            <a
              target="_blank"
              href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link_for_share; ?>&amp;src=sdkpreparse"
              class="fb-xfbml-parse-ignore hvr-float-shadow"
              ><i class="fab fa-facebook fa-3x"></i
            ></a>
           
            <a
            class="hvr-float-shadow"
              href="http://twitter.com/share?text=<?php echo $text_for_share ?>&url=<?php echo $link_for_share; ?>"
              ><i class="fab fa-twitter fa-3x"></i
            ></a>
            <a
            class="hvr-float-shadow"
              href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link_for_share; ?>"
              ><i class="fab fa-linkedin fa-3x"></i
            ></a>
            <a
            class="hvr-float-shadow"
              href="whatsapp://send?text=<?php echo $text_for_share."  link : " ?><?php echo $link_for_share; ?>"
              data-action="share/whatsapp/share"
              ><i class="fab fa-whatsapp fa-3x" style="color: #25d366;"></i
            ></a>
          </div>
        </div>
        <div class="blog-image ">
          <p style="font-weight:bold;"><?php $word_count =str_word_count($row['content']); echo ceil($word_count/120);  ?>&nbsp;min read</p>
          <img
         
            src="../admin_blog/blog/<?php echo $row['image'] ?>"
            alt=""
          />
        </div>

        <div class="blog-text">

          <pre> 
            <?php echo $row['content'] ?>  
          </pre
          >
        </div>
        <div class="blog-tools">
          <div class="heart">
            <img src="../assets/<?php if(intval($row3['like_status'])===1) echo 'clapYellow64.png'; else echo 'clap2.png '; ?>" 
            id="heart" onclick="add_remove(<?php echo $blog_id; ?>)"
            >
            <p><span id="heart_count"><?php echo $row['likes'] ?></span> &nbsp;CLAPS</p>
          </div>
          <div class="comment " onclick="openSideNav()" >
            <i class="fas fa-comments fa-2x "></i>
            <a  style="text-decoration: underline;" href="#comments"><?php echo $blog_count; ?> &nbsp;RESPONSES</a>
          </div>
          <div class="share-block2 ">
            <a 
            class="hvr-float-shadow"
              target="_blank"
              href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link_for_share; ?>&amp;src=sdkpreparse"
              class="fb-xfbml-parse-ignore "
              ><i class="fab fa-facebook fa-2x"></i
            ></a>
            <a
            class="hvr-float-shadow"
            href="http://twitter.com/share?text=<?php echo $text_for_share ?>&url=<?php echo $link_for_share; ?>"
            ><i class="fab fa-twitter fa-2x"></i
            ></a>
            <a
            class="hvr-float-shadow"
            href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link_for_share; ?>"
            ><i class="fab fa-linkedin fa-2x"></i
            ></a>
            <a
            class="hvr-float-shadow"
              href="whatsapp://send?text=<?php echo $text_for_share." Link : " ?><?php echo $link_for_share; ?>"
              data-action="share/whatsapp/share"
              ><i class="fab fa-whatsapp fa-2x" style="color: #25d366;"></i
            ></a>
          </div>
        </div>
        <div class="blog-author-block1">
          <div class="author-image-block1">
            <img src="../assets/logo_png.png" alt="" class="author-image" />
          </div>
          <p class="author-name">Powered by The Legal Chronicle</p>
        </div>
      </div>
      <!-- end of blog -->
    </div>

    <div
      class="container"
      style="
        margin-top: 12vh;
        padding: 20px;
        text-align:center;
        font-weight: bolder;
        font-size: 45px;
        word-spacing: 2rem;
      "
    >
      More from TLC Blog
    </div>
    <!-- start of similar blogs -->
    <div class="more_blogs_container">
    <?php 
    $query1="select * from blog order by likes desc limit 8";
    $exec1=mysqli_query($con,$query1);
    
    while($row1=mysqli_fetch_array($exec1))
    {

  
            
    ?>

      <div class="mblog card">
        <div class="mblog-name">
       <a target="_blank" href="./blog_details.php?blog_id=<?php echo $row1['id'] ?>">
           <?php echo $row1['bname'] ?>
           <br>
           <br>
           <?php $word_count =str_word_count($row1['content']); echo ceil($word_count/120);  ?>&nbsp;min read
       </a>
       <?php echo $row1['read_time']; ?>
       </div>
        <div class="mblog-image">
          <a target="_blank" href="./blog_details.php?blog_id=<?php echo $row1['id'] ?>">
            <img
            src="../admin_blog/blog/<?php echo $row1['image']; ?>"
            alt=""
          /></a>
        </div>
      </div>
   <?php 
       } 
   ?>

    </div>

     <a  
      href="#top_view"
      class="btn btn-dark"
      style="margin: 20px auto; padding: 10px;width: 50px;height: 50px;"
    >
      <i class="fa fa-arrow-up fa-2x"></i></a
    >

  



    <?php include("../footer/footer3_.html");  ?>

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
    <script>

      
     var flag=<?php if(intval($row3['like_status'])===1) echo 'false'; else echo 'true'; ?>; 
      function add_remove(blog_id)
      {
          
            if(flag==true)
            {
                addLike(blog_id);
                flag=!flag;
                
            }
            else{
                removeLike(blog_id);
                flag=!flag;
            }
      }

        function addLike(blog_id)
        {

      var xmhttp = new XMLHttpRequest();
       xmhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            
           if (this.responseText.match("like")) {
            
             var num = Number(document.getElementById("heart_count").innerHTML);
             num += 1;
             document.getElementById("heart_count").innerHTML = num;
             document.getElementById("heart").setAttribute("src","../assets/clapYellow64.png");
             
           } 
         }
       };
       xmhttp.open(
         "GET",
         "add_like.php?blog_id="+blog_id,
         true
       );
       xmhttp.send();
        }


        function removeLike(blog_id)
        {
          var xmhttp = new XMLHttpRequest();
       xmhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
           
           if (this.responseText.match("like")) {
             var num = Number(document.getElementById("heart_count").innerHTML);
             num -= 1;
             document.getElementById("heart_count").innerHTML = num;
             document.getElementById("heart").setAttribute("src","../assets/clap2.png");
            
           } 
         }
       };
       xmhttp.open(
         "GET",
         "remove_like.php?blog_id="+blog_id,
         true
       );
       xmhttp.send();
        }
         
        function openSideNav()
        {
           document.getElementById("sidenav").style.setProperty("transform","translateX(0%)");
        }
         document.ondblclick=()=>{
        
          document.getElementById("sidenav").style.setProperty("transform","translateX(-110%)");
        }
        function closeSideNav()
        {
           document.getElementById("sidenav").style.setProperty("transform","translateX(-110%)");
        }

       
      

  


    </script>
  </body>
</html>
