<?php
    include('../config/config.php');
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['email'])) {
        header('Location: ../admin/index.php');
    }
    $email = $_SESSION['email'];
    $add = $_SESSION['add'];
    $stat = $_SESSION['stat'];
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Video Upload Page</title>

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
     
      var url="https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id="+video_id+"&key=AIzaSyD76WtzxAGbZnRnh8rfI1VfRVxwS1xFYOg"
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
            document.getElementById("vlikes").value=data.items[0].statistics.likeCount;
            document.getElementById("vviews").value=data.items[0].statistics.viewCount;
            document.getElementById("vdate").value=data.items[0].snippet.publishedAt;
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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
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
             ADD VIDEOS FOR EVENTS(GALLERY) <span class="sr-only">(current)</span>
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
        <h1 class="h2">Add videos for a particular event!</h1>
      </div>
      <!-- Form to add videos for a particular event! -->
      <div class="container text-center">
        <div class="card" style="background-color: #3274B6 !important;">
            <h1 class="display-4" style="color: #ffffff !important;">Add video for an event!</h1>
            <?php
                if($add == 'added') {
            ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Video Uploaded</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                } else {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Failed to upload video!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                }
            ?>
            <?php
              $details = "SELECT * FROM events";
              $details_result = mysqli_query($con,$details) or die(mysqli_error($con));
            ?>
            <div class="card-body">
                <form action="add_video.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="id" style="color: #ffffff !important;">Event name or ID:</label>
                        <select class="form-control" id="id" name="id" placeholder="Event Type" required>
                          <?php
                            while($row = mysqli_fetch_assoc($details_result)) {
                          ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row[id] ?> - <?php echo $row['ename'] ?></option>
                          <?php
                            }
                          ?>
                        </select>
                    </div>
                       <div class="form-group">
                       <label for="vlink" style="color: #ffffff !important;">Link of the video</label>
                        <input type="text" id="vlink" name="vlink" class="form-control" placeholder="Video Link" oninput="getVideoDetails(this)" required>
                    </div>
                    <div class="form-group">
                      <label for="vname" style="color: #ffffff !important;">Enter the name of the video</label>
                        <input type="text" class="form-control" id="vname" name="vname" placeholder="Video Name" required>
                    </div>
                    <div class="form-group">
                    <label for="vthumb" style="color: #ffffff !important;">Thumbnail</label>
                    <img id="thumbnail_image" src="" alt="" width="200" height="200">
                    <input type="text" class="form-control input-lg" id="vthumb" name="vthumb" placeholder="enter the video thumbnail image link">
                    </div>
                 
                    <div class="form-group">
                       <label for="vdetails" style="color: #ffffff !important;">Enter the video description</label>
                        <textarea name="vdetails" id="vdetails" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                       <label for="vlikes" style="color: #ffffff !important;">Video likes from youtube</label>
                        <input type="text" name="vlikes" id="vlikes" value="0" placeholder="video likes" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                       <label for="vviews" style="color: #ffffff !important;">Video views from youtube</label>
                        <input type="text" name="vviews" id="vviews" value="0" placeholder="video views" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                       <label for="vdate" style="color: #ffffff !important;">Video published date from youtube</label>
                        <input type="text" name="vdate" id="vdate" value="0" placeholder="video published date" class="form-control" readonly />
                    </div>
                   
                    <button type="submit" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Post</button>
                </form>
            </div>
        </div>
      </div>
</main><br>
      <!-- To display the videos entered into the database -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">TLC Event Videos!</h1>
      </div>
      <?php
        if($stat == 'Edited') {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Changes made successfully!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <?php
        } else {
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Failed to make changes!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <?php
        }
      ?>
      <?php
        $videos = "SELECT * FROM videos";
        $videos_result = mysqli_query($con,$videos) or die(mysqli_error($con));
        while($row = mysqli_fetch_assoc($videos_result)) {
          $pid = $row['id'];
      ?>
      <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['vname'] ;?></h5>
            <p class="text-muted">Video Link : <a href="<?php echo $row['vlink']; ?>"><?php echo $row['vlink']; ?></a></p>
            <p class="card-text"><?php echo $row['vdetails']; ?></p>
            <a href="replace.php?pid=<?php echo $pid; ?>" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Edit</a>
            <a href="delete.php?pid=<?php echo $pid; ?>" class="btn btn-danger" style="background-color:  #ffcccb !important;color: red;">Delete</a>
        </div>
        </div>
      <?php
      $_SESSION['id'] = $pid;
        }
      ?>

              <button class="btn btn-dark" onclick="erase('videos')">ERASE DATABASE</button>
      </main>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      
</div>

 

<script>
 
     function erase(tname)
   {
       alert("Are you sure");
    
         var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                 
                   if(this.responseText.match("deleted all"))
                   {
                       alert("Erased the table ...");
                       document.location.reload();
                   }
                  }
                };
                xhttp.open("GET", "../admin_truncate/truncate_database.php?table_name="+tname, true);
                xhttp.send();
   }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="../aasets/js/dashboard.js"></script></body>
</html>
