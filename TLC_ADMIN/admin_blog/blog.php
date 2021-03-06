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
    <title>Event Page</title>

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
            <a class="nav-link active" href="../admin_blog/blog.php">
              <span data-feather="blog"></span>
             ADD BLOG <span class="sr-only">(current)</span>
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
            <a class="nav-link" href="../admin_inbox/inbox.php">
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
        <h1 class="h2">Add a Blog</h1>
      </div>
      <!-- Form to add blogs into the database -->
      <div class="container text-center">
        <div class="card" style="background-color: #3274B6  !important;">
            <h1 class="display-4" style="color: #ffffff !important;">New Blog</h1>
            <?php
                if($add == 'added') {
            ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Blog Added!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                } else {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Failed to add blog!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                }
            ?>
            <div class="card-body">
                <form action="add_blog.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="bname" name="bname" placeholder="Blog name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="aname" style="color: #ffffff !important;">Add author name</label>
                        <input type="text" class="form-control" id="aname" name="aname" placeholder="Author Name" required>
                    </div>
                    <div class="form-group">
                          <label for="aname" style="color: #ffffff !important;">Author image (optional)</label>
                        <input  type="file" class="form-control" id="aimage" name="aimage" placeholder="Author image" >
                    </div>
                    <div class="form-group">
                      
                          <label for="date" style="color: #ffffff !important;">Blog Date</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                   <label for="brief" style="color: #ffffff !important;"> Brief description (optional)</label>
                        <input type="text" id="brief" name="brief" class="form-control" placeholder="Description (optional)" >
                    </div>
                    <div class="form-group">
                      <label for="image" style="color: #ffffff !important;">Enter a display image!</label>
                      <input type="file" name="image" id="image" class="form-control input-lg" placeholder="Please select the image for blog" required>

                    </div>
                    <div class="form-group">
                        <textarea name="content" placeholder="fill this area with blog content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Post</button>
                </form>
            </div>
        </div>
      </div>
</main><br>
      <!-- To display the blogs entered into the database -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">TLC Blogs</h1>
      </div>
      <?php
        if($stat == 'Edited') {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Blog edited!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <?php
        } else {
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Failed to edit blog!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <?php
        }
      ?>
      <?php
        $blogs = "SELECT * FROM blog";
        $result = mysqli_query($con,$blogs) or die(mysqli_error($con));
        while($row = mysqli_fetch_assoc($result)) {
            $pid = $row['id'];
      ?>
      <div class="card">
        <div class="card-body">
          <p>blog top status </p>
          <p id="top_status<?php echo $pid; ?>"><?php echo $row['top_blog_status'] ;?> </p>
            <h5 class="card-title"><?php echo $row['bname'] ;?></h5>
            <p class="text-muted">By : <?php echo $row['aname']; ?></p>
            <p class="text-muted"><?php echo $row['date']; ?></p>
            <p class="card-text"><?php echo $row['brief']; ?></p>
            <a href="blog_edit.php?pid=<?php echo $pid; ?>" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Edit</a>
            <a href="delete.php?pid=<?php echo $pid; ?>" class="btn btn-danger" style="background-color:  #ffcccb !important;color: red;">Delete</a>
            <button onclick="set_as_top_blog(<?php echo $pid; ?>)" class="btn btn-primary">Set as top blog</button>
            <button onclick="remove_as_top_blog(<?php echo $pid; ?>)" class="btn btn-dark">remove as top blog</button>
          </div>
        </div>
      <?php
      $_SESSION['id'] = $pid;
        }
      ?>
     <button class="btn btn-dark" onclick="erase('blog')">ERASE DATABASE</button>
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

        <script>
         
         function set_as_top_blog(blog_id)
         {
              var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("top_status"+blog_id).innerHTML = this.responseText;
                  }
                };
                xhttp.open("GET", "set_top_blog.php?blog_id="+blog_id, true);
                xhttp.send();
         }
         function remove_as_top_blog(blog_id)
         {
               var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("top_status"+blog_id).innerHTML = this.responseText;
                  }
                };
                xhttp.open("GET", "remove_top_blog.php?blog_id="+blog_id, true);
                xhttp.send();
         }

        </script>
</html>
