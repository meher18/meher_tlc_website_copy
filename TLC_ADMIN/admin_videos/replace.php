<?php
    include('../config/config.php');
    session_start();
    if(!isset($_SESSION['email'])) {
      header('Location: ../admin/index.php');
    }
    $pid = $_GET['pid'];
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">

    <script>

        function  getVideoDetails(e)
      { 
      var video_id=e.value;
     
      var url="https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id="+video_id+"&key=AIzaSyAOEckGwpn5zOi70mq8hS3MElaE5YS7PSo"
       fetch(url).then((res)=>{
         if(res.status!==200)
         {
           console.log(res.statusText," error fetching the video from youtube");
           return;
         }
          res.json().then((data)=>{
            console.log(data);
            document.getElementById("vname").value=data.items[0].snippet.title;
            document.getElementById("vdetails").value=data.items[0].snippet.description;
            thumbnails_url=data.items[0].snippet.thumbnails.high.url
            document.getElementById("thumbnail_image").setAttribute("src",thumbnails_url);
            document.getElementById("vthumb").value=thumbnails_url;
          })
       })
      }
    </script>
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">The Legal Chronicle</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item">Welcome <?php echo $email; ?></a>
          <a class="dropdown-item" href="../admin/logout.php">Logout</a>
        </div>
      </li>
    </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="../admin/dashboard.php">
              <span data-feather="home"></span>
              TLC DASHBOARD 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_event/event.php">
              <span data-feather="event"></span>
              ADD EVENT
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_blog/blog.php">
              <span data-feather="blog"></span>
             ADD BLOG
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="../admin_intresting_facts/fact.php">
              <span data-feather="blog"></span>
             ADD INTERESTING FACTS
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="../admin_member/member.php">
              <span data-feather="view blogs"></span>
             ADD TLC MEMBER
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../admin_videos/index.php">
              <span data-feather="view blogs"></span>
             ADD VIDEOS FOR EVENTS(GALLERY) / EDIT<span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_podcasts/index.php">
              <span data-feather="view blogs"></span>
            ADD PODCASTS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_partners/media_partner.php">
              <span data-feather="view blogs"></span>
             ADD MEDIA PARTNER/COLLABORATOR
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../admin_inbox/inbox.php">
              <span data-feather="view blogs"></span>
          INBOX 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_users/users.php">
              <span data-feather="view blogs"></span>
           TLC USERS 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_comments/index.php">
              <span data-feather="view comments"></span>
              VIEW COMMENTS 
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit the video details!</h1>
      </div>
      <?php
        $videos = "SELECT * FROM videos WHERE id='$pid'";
        $videos_result = mysqli_query($con,$videos) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($videos_result);
        $_SESSION['pid'] = $pid;
      ?>
      <!-- Form to edit blogs into the database -->
      <div class="container text-center">
          <?php
              $details = "SELECT * FROM events";
              $details_result = mysqli_query($con,$details) or die(mysqli_error($con));
            ?>
        <div class="card" style="background-color: #3274B6 !important;">
            <h1 class="display-4" style="color: #ffffff !important;">Edit Video details</h1>
            <div class="card-body">
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                      <label for="id" style="color: #ffffff !important;">Event name or ID:</label>
                        <select class="form-control" id="id" name="id" value="<?php echo $row['event_id']; ?>" placeholder="Id" required>
                          <!-- <option value="<?php echo $row['event_id']; ?>"><?php echo $row['id']; ?></option> -->

                            <?php
                            while($row1 = mysqli_fetch_assoc($details_result)) {
                          ?>
                          <option value="<?php echo $row1['id'] ?>" id="id"  name="id"><?php echo $row1['id'] ?> - <?php echo $row1['ename'] ?></option>
                          <?php
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="vlink" style="color: #ffffff !important;">Video link</label>
                        <input oninput="getVideoDetails(this)" type="text" id="vlink" name="vlink" value="<?php echo $row['vlink']; ?>" class="form-control" placeholder="Video Link" required>
                    </div>
                    <div class="form-group">
                       <label for="vname" style="color: #ffffff !important;">Video name </label>
                        <input type="text" class="form-control" id="vname" value="<?php echo $row['vname']; ?>" name="vname" placeholder="Video Name" required>
                    </div>
                    <div class="form-group">
                      <label for="old_thumb" style="color: #ffffff !important;">old thumbnail </label>
                      <br>
                      <img src="<?php echo $row['vthumb']; ?>" alt="" width="200" height='200' id="thumbnail_image">
                       <br>
                        <label for="vthumb" style="color: #ffffff !important;">New Thumbnail (update thumbnail)</label>
                      <input type="text" class="form-control input-lg" id="vthumb" value="<?php echo $row['vthumb']; ?>" name="vthumb">
                     
                    </div>
                    
                    <div class="form-group">
                      <label for="vdetails" style="color: #ffffff !important;">Video details </label>
                        <textarea name="vdetails" id="vdetails" cols="30" rows="10" class="form-control"><?php echo $row['vdetails']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Post</button>
                </form>
            </div>
        </div>
      </div>
</main><br>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="../aasets/js/dashboard.js"></script></body>
</html>
