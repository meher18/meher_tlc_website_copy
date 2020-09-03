<?php
    include('../config/config.php');
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['email'])) {
        header('Location: ../admin/index.php');
    }
    $email = $_SESSION['email'];
    $add = $_SESSION['add'];
    $_SESSION['event_thumbnail']='';
    $_SESSION['added_guests']='';
    $stat = $_SESSION['stat'];
    $_SESSION['testimonial_added']='';


  //  $query1="select * from events order by id desc";
  // $exec=mysqli_query($con,$query1);
  // $row=mysqli_fetch_array($exec);
   
  // $current_event_id=$row['id'];
  //  $query2="select * from event_thumbnails where event_id=$current_event_id";
  // $exec2=mysqli_query($con,$query2);
  // $thumbnai_array=mysqli_fetch_all($exec2);

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

<div class="container-fluid" >
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
            <hr style="background-color: white;">
            <a class="nav-link active" href="../admin_event/event.php">
              <span data-feather="event"></span>
              ADD EVENT<span class="sr-only">(current)</span>
            </a>
            <ul style="list-style:decimal;color: white;">
             <li><a class="nav-link" href="addEventThumbnailsOnly.php">Add Event Thumbnails</a></li>
             <li><a class="nav-link" href="addEventGuestsOnly.php">Add Event Guests</a></li>
             <li><a class="nav-link" href="addEventTestimonialsOnly.php">Add Event Testimonials</a></li>
            </ul>
            <hr style="background-color: white;">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_blog/blog.php">
              <span data-feather="blog"></span>
             ADD BLOG 
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="../admin_intresting_facts/fact.php">
              <span data-feather="facts"></span>
             ADD INTERESTING FACTS
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="../admin_member/member.php">
              <span data-feather="tlc member"></span>
             ADD TLC MEMBER
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_videos/index.php">
              <span data-feather="add video"></span>
             ADD VIDEOS FOR EVENTS(GALLERY)
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_podcasts/index.php">
              <span data-feather="add podcast"></span>
            ADD PODCASTS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_partners/media_partner.php">
              <span data-feather="add collaborator"></span>
             ADD MEDIA PARTNER/COLLABORATOR
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_inbox/inbox.php">
              <span data-feather="inbox"></span>
          INBOX
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin_users/users.php">
              <span data-feather="users"></span>
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
    
    <main  role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add an event</h1>
      </div>
      <!-- Form to add blogs into the database -->
      <div class="container text-center" style="margin: auto;">
        <div class="card" style="background-color: #3274B6  !important;">
            <h1 class="display-4" >New event</h1>
            <?php
                if($add == 'added'){
            ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Event added!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                } else{
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Unable to add the event!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                }
               
            ?>
         
            <div class="card-body" >
                <form action="add_event.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="ename" name="ename" placeholder="Event name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="start_date" >Event start date</label>
                        <input type="date" id="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="end_date" >Event end date</label>
                        <input type="date" id="date" name="end_date" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="ephoto" >Enter a display image!</label>
                      <input type="file" name="ephoto" id="ephoto" class="form-control input-lg" placeholder="Insert Resume" required>
                    </div>
                    <div class="form-group">
                      <label for="etype" >Event Type:</label>
                      <select class="form-control" id="etype" name="etype" placeholder="Event Type" required>
                        <option value="upcoming">Upcoming</option>
                        <option value="completed">Completed</option>
                        <option value="sscorner">Students Corner</option>
                        <option value="media">Media Partner Events</option>
                      </select>
                    </div>
                    <div class="form-group">
                      
                        <textarea name="edetails" id="edetails" cols="30" rows="10" class="form-control" placeholder="Event Details" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tagline" >Add a tagline for event</label>
                        <textarea name="tagline" id="tagline" cols="30" rows="5" class="form-control" placeholder="Event TAGLINE"  required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="video_link">Link for the video</label>

                        <input name="video_link" id="video_link"  class="form-control"  placeholder="eg : https://www.youtube.com/embed/Vufba_ZcoR0"></input>
                    </div>
                    <div class="form-group">
                      <label for="playlist_link" style="color: #ffffff !important;">Link for video playlist</label>

                        <input name="playlist_link" id="playlist_link"  class="form-control"  
                         placeholder="eg : https://www.youtube.com/embeded/playlist?list=PLmy3R7UgHboi0tTPEE4QmIJurjq1RW1xu"></input>
                    </div>
                    <div class="form-group">
                      <label for="other_link" style="color: #ffffff !important;">Other Link("optional") ,like for drive</label>

                        <input name="other_link" id="other_link"  class="form-control"  
                         placeholder="Any Other Link"></input>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Post</button>
                </form>
                
              
            </div>
     

        </div>
        <!-- end of card -->

          

      </div>
</main>
<br>
        


      <!-- To display the events entered into the database -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">TLC Events</h1>
      </div>
      <?php
        if($stat == 'Edited') {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Event edited!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <?php
        } else {
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Failed to edit event!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      <?php
        }
      ?>
      <?php
        $events = "SELECT * FROM events";
        $result = mysqli_query($con,$events) or die(mysqli_error($con));
        while($row = mysqli_fetch_assoc($result)) {
            $pid = $row['id'];
      ?>
      <div class="card">
        <div class="card-body">
            <h5 class="card-title">Event Id <?php echo $row['id'] ;?></h5>
            <h5 class="card-title"><?php echo $row['ename'] ;?></h5>
            <p class="text-muted">Started on :<?php echo $row['start_date']; ?></p>
            <p class="text-muted">Event Status : <?php echo $row['etype']; ?></p>
            <p class="card-text "><?php echo $row['edetails']; ?></p>
            <p class="card-text ">Other Link -> <?php echo $row['other_link']; ?></p>
            <a href="event_edit.php?pid=<?php echo $pid; ?>" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Edit</a>
            <a href="delete.php?pid=<?php echo $pid; ?>" class="btn btn-danger" style="background-color:  #ffcccb !important;color: red;">Delete</a>
            <form action="../Event_Details/event_details.php" method="POST" enctype="multipart/form-data">
              <button name="event_id" value="<?php echo $pid; ?>" class=" right btn btn-success" style="background-color: white!important;color: blue;">View Event</a>
            </form>
        </div>
        </div>
      <?php
      $_SESSION['id'] = $pid;
        }
      ?>

      <button class="btn btn-dark" onclick="erase('events')">ERASE DATABASE</button>
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


