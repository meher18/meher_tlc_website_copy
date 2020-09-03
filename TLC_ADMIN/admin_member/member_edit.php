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
    <title>Team Members Page</title>

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
            <a class="nav-link active" href="../admin_member/member.php">
              <span data-feather="view blogs"></span>
             ADD TLC MEMBER / EDIT<span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_videos/index.php">
              <span data-feather="view blogs"></span>
             ADD VIDEOS FOR EVENTS(GALLERY)
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
        <h1 class="h2">Edit the event</h1>
      </div>
      <?php
        $data = "SELECT * FROM members WHERE id='$pid'";
        $data_result = mysqli_query($con,$data) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($data_result);
        $_SESSION['id'] = $pid;
      ?>
      <!-- Form to edit blogs into the database -->
      <div class="container text-center">
        <div class="card" style="background-color: #3274B6 !important;">
            <h1 class="display-4" style="color: #ffffff !important;">Edit Event</h1>
            <div class="card-body">
            <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="mname" name="mname" value="<?php echo $row['mname']; ?>" placeholder="Member name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="bio" name="bio" class="form-control" value="<?php echo $row['bio']; ?>" placeholder="Members short intro" required>
                    </div>
                    <div class="form-group">
                      <label for="image" style="color: #ffffff !important;">Enter a display image!</label>
                      <input type="file" name="image" id="image" class="form-control input-lg" required>
                    </div>
                    <div class="form-group">
                      <label for="designation" style="color: #ffffff !important;">Members Designation</label>
                      <input type="text" class="form-control" name="designation" value="<?php echo $row['designation'] ?>" placeholder="update the designation" >
                    </div>
                      <div class="form-group">
                      <label for="facebook" style="color: #ffffff !important;">Enter Facebook link</label>
                      <input type="text" name="facebook" id="facebook" class="form-control input-lg" 
                      value="<?php echo $row['facebook_link']; ?>" >
                    </div>
                     <div class="form-group">
                      <label for="twitter" style="color: #ffffff !important;">Enter Twitter link</label>
                      <input type="text" name="twitter" id="twitter"
                       value="<?php echo $row['twitter_link']; ?>" class="form-control input-lg" >
                    </div>
                     <div class="form-group">
                      <label for="linkedin" style="color: #ffffff !important;">Enter Linkedin link</label>
                      <input type="text" name="linkedin" id="linkedin" 
                      value="<?php echo $row['linkedin_link']; ?>" class="form-control input-lg" >
                    </div>
                     <div class="form-group">
                      <label for="instagram" style="color: #ffffff !important;">Enter Instagram link</label>
                      <input type="text" name="instagram" id="instagram" class="form-control input-lg" 
                      value="<?php echo $row['instagram_link']; ?>" >
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
