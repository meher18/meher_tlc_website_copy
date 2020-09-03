<?php
    include('../config/config.php');
    session_start();
    $email=$_SESSION['email'];
    if(!isset($_SESSION['email'])) {
      header('Location: ../admin/index.php');
    }
    $pid = $_GET['pid'];
    $_SESSION['event_id']=$pid;
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Edit Event Page</title>

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
                <hr style="background-color: white;">
            <a class="nav-link active" href="../admin_event/event.php">
              <span data-feather="event"></span>
              ADD EVENT / EDIT<span class="sr-only">(current)</span>
               </a>
             <ul style="list-style:decimal;color:white">
              <li ><a class="nav-link" href="addEventThumbnailsOnly.php">Add Event Thumbnails</a></li>
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
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit the event</h1>
      </div>
      <?php
        $data = "SELECT * FROM events WHERE id='$pid'";
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
                        <input type="text" id="ename" name="ename" placeholder="Event name" value="<?php echo $row['ename']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="date" style="color: #ffffff !important;">Change Starting date of event</label>
                    
                        <input type="date" id="date" name="date" class="form-control" value="<?php echo $row['start_date']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="end_date" style="color: #ffffff !important;">Change ending date of event</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo $row['end_date']; ?>" required>
                    </div>
                    <div class="form-group">
                      Current image -> 
                      <img src="./event/<?php echo $row['ephoto']; ?>" alt="" style="width:50px;height:50px">
                      <label for="ephoto" style="color: #ffffff !important;">Update the image!</label>
                      
                      <input style="visibility:hidden" type="text" name="eoldphoto" id="eoldphoto" class="form-control input-lg" placeholder="e photo" value="<?php echo $row['ephoto'] ?>" readonly>
                      <input type="file" name="ephoto" id="ephoto" class="form-control input-lg" placeholder="e photo" required>
                    </div>
                    <div class="form-group">
                      <label for="etype" style="color: #ffffff !important;">Event Type:</label>
                      <select class="form-control" id="etype" name="etype" value="<?php echo $row['etype']; ?>" placeholder="Event Type" required>
                        <option value="upcoming">Upcoming</option>
                        <option value="completed">Completed</option>
                        <option value="sscorner">Students Corner</option>
                        <option value="media">Media Partner Events</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <textarea name="edetails" id="edetails" cols="30" rows="10" class="form-control"><?php echo $row['edetails']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tagline">Update tagline </label>
                        <textarea name="tagline" id="tagline" cols="30" rows="5" class="form-control" placeholder="Event tagline" ><?php echo $row['etagline']; ?></textarea>
                    </div>

                     <div class="form-group">
                      <label for="event_video" style="color: #ffffff !important;">Update event video link !</label>
                      <input type="text" name="event_video" id="event_video" class="form-control input-lg" placeholder="Update event video" value="<?php echo $row['event_video']; ?>" required>
                    </div>
                     <div class="form-group">
                      <label for="event_playlist" style="color: #ffffff !important;">Update event playlist !</label>
                      <input type="text" name="event_playlist" id="event_playlist" class="form-control input-lg" placeholder="Update event playlist" value="<?php echo $row['event_playlist']; ?>" required>
                    </div>
                     <div class="form-group">
                      <label for="other_link" style="color: #ffffff !important;">Update other Link (optional)</label>
                      <input type="text" name="other_link" id="other_link" class="form-control input-lg" placeholder="Update other Link" value="<?php echo $row['other_link']; ?>" >
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;padding: 20px;">Edit Event</button>
                </form>
            </div>
           <!-- end of the edit form block -->
              
            <div style="margin: auto;color: white;margin-top: 10vh;"><h3>Below are your added guests and you can edit  them </h3></div>

            <div class=" jumbotron" style="display: flex;flex-direction: column;flex-wrap: wrap;padding: 20px;justify-content: space-evenly;">
              <?php
                $query1="select * from event_guests where event_id=$pid";
                $exec1=mysqli_query($con,$query1);
                while($row1=mysqli_fetch_array($exec1))
                {
                  
               ?>

              <form  action="update_guest.php" class="jumbotron" style="background-color:#005b8f ;padding: 20px;margin: 20px;" method="POST" enctype="multipart/form-data">
              
               
                  <img src="./eventGuests/<?php echo $row1['guest_photo']; ?>" alt="" style="width: 110px; height: 110px ;">
                <input type="text" value="<?php echo $row1['guest_photo']; ?>" name="old_image" class="form-control" readonly />
             
                <div class="form-group">
                  <label for="event_id" style="color: #ffffff !important;">For event id (EDITABLE) change carefully , if changed then guest will belong to other event</label>
                  <input type="number" name="event_id" id="event_id" class="form-control input-lg" placeholder="Event id" value="<?php echo $pid ?>" required>
                </div>
                <div class="form-group">
                  <label for="event_id" style="color: #ffffff !important;">Guest id (READ ONLY)</label>
                  <input type="number" name="guest_id" id="guest_id" class="form-control input-lg" placeholder="Guest id" value="<?php echo $row1['guest_id'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="guest_name" style="color: #ffffff !important;">Update Guest name !  (EDITABLE)</label>
                  <input type="text" name="guest_name" id="guest_name" class="form-control input-lg" placeholder="Update guest name" value="<?php echo $row1['guest_name']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="guest_details" style="color: #ffffff !important;">Update Guest details !  (EDITABLE)</label>
                  <textarea type="text" rows="5" name="guest_details" id="guest_details" class="form-control input-lg" placeholder="Update guest_details" required><?php echo $row1['guest_details']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="guest_photo" style="color: #ffffff !important;">Update Guest photo !  (EDITABLE)</label>
                  <input type="file" name="guest_photo" id="guest_photo" class="form-control input-lg" placeholder="Update guest name" value="<?php echo $row1['guest_photo']; ?>" required>
                </div>
                <button class="btn btn-primary">Edit Guest</button>
                <button onclick="deleteGuest(<?php echo $row1['guest_id'] ?>)" type="button" class="btn btn-danger">Delete Guest</button>
              </form>
               <?php
               
                }
               
               ?>

            </div>
            <!--end of guest card -->
            <div style="margin: auto;color: white;margin-top: 10vh;"><h3>Below are the thumbnails for this event and you can edit  them </h3></div>
          <div class="jumbotron container" style="padding: 10px;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-evenly;align-items: center;
          align-content: center;">
              <?php
                  $query2="select * from event_thumbnails where event_id=$pid";
                $exec2=mysqli_query($con,$query2);
                while($row2=mysqli_fetch_array($exec2))
                {
                  
              
              ?>
              <form class="card" style="padding: 25px;margin-top: 20px;" action="update_thumbnail.php" enctype="multipart/form-data" method="POST">
                 <img src="./eventThumbnails/<?php echo $row2['thumbnail_image']; ?>" alt="" style="width:100px;height:100px"> 
                <div class="form-group">
                   <input class="form-control" type="text" value="<?php echo $row2['event_thumbnail_id'] ?>" name="event_thumbnail_id" readonly>
                </div>
                <div class="form-group">
                   <input class="form-control" type="text" value="<?php echo $row2['thumbnail_image'] ?>" name="thumbnail_old_image" readonly>
                </div>
                <div class="form-group">
                   <label for="thumbnail_new_image">Update image of the thumbnail</label>
                   <input class="form-control" type="file" name="thumbnail_new_image" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary">Update thumbnail</button>
                  <button onclick="deletethumbnail(<?php echo $row2['event_thumbnail_id']; ?>,<?php echo $pid; ?>)" class="form-control btn btn-danger"type="button">Delete thumbnail</button>
                </div>
              </form>
               <?php }?>
            </div>
            <!-- end of thumbnail card -->


             <!--end of guest card -->
            <div style="margin: auto;color: white;margin-top: 10vh;"><h3>Below are the Testimonials of this event and you can edit them </h3></div>
          <div class="jumbotron container" style="padding: 10px;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-evenly;align-items: center;
          align-content: center;">
              <?php
                  $query3="select * from event_testimonials where event_id=$pid";
                $exec3=mysqli_query($con,$query3);
                while($row3=mysqli_fetch_array($exec3))
                {
                  
              
              ?>
              <form class="card" style="padding: 25px;margin-top: 20px;" action="update_testimonial.php" enctype="multipart/form-data" method="POST">
                 <img src="./eventTestimonial/<?php echo $row3['image']; ?>" alt="" style="margin: auto;width:100px;height:100px"> 
                <div class="form-group">
                   <input class="form-control" type="text" value="<?php echo $row3['testimonial_id'] ?>" name="testimonial_id" readonly>
                </div>
                <div class="form-group">
                   <input class="form-control" type="text" value="<?php echo $row3['image'] ?>" name="testimonial_old_image" readonly>
                </div>
                <div class="form-group">
                   <label for="testimonial_new_image">Update image of the testimonial</label>
                   <input class="form-control" type="file" name="testimonial_new_image" required>
                </div>
                <div class="form-group">
                   <label for="tauthor">Update Author Name</label>
                   <input class="form-control" type="text" name="tauthor" required value="<?php echo $row3['author']; ?>"> 
                </div>
                
                <div class="form-group">
                   <label for="testimonial_text">Update testimonial text</label>
                   <textarea rows="5" class="form-control"  name="testimonial_text" required><?php echo $row3['testimonial_text'] ?></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary">Update testimonial</button>
                  <button onclick="deleteTestimonial(<?php echo $row3['testimonial_id']; ?>,<?php echo $pid; ?>)" class="form-control btn btn-danger"type="button">Delete Testimonial</button>
                </div>
              </form>
               <?php }?>
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
        <!-- <script src="../aasets/js/dashboard.js"></script> -->
         <script>

             function deleteGuest(guestId)
            {
              var xmhttp = new XMLHttpRequest();
              xmhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  if (this.responseText.match("deleted")) {
                    window.location.reload();
                    alert("deleted guest");

                  }

                  // alert(this.responseText);
                }
              };
              xmhttp.open("POST", "delete_guest.php", true);
              xmhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xmhttp.send("guest_id="+guestId);
            
            }
             function deletethumbnail(thumbnail_id,event_id)
            {
              var xmhttp = new XMLHttpRequest();
              xmhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  if (this.responseText.match("deleted")) {
                    window.location.reload();
                    alert("deleted thumbnail");

                  }

                  // alert(this.responseText);
                }
              };
              xmhttp.open("POST", "delete_thumbnail.php", true);
              xmhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xmhttp.send("thumbnail_id="+thumbnail_id+"&event_id="+event_id);
            
            }
              function deleteTestimonial(testimonial_id,event_id)
            {
              var xmhttp = new XMLHttpRequest();
              xmhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  if (this.responseText.match("deleted")) {
                    window.location.reload();
                    alert("deleted thumbnail");

                  }

                  // alert(this.responseText);
                }
              };
              xmhttp.open("POST", "delete_testimonial.php", true);
              xmhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xmhttp.send("testimonial_id="+testimonial_id+"&event_id="+event_id);
            
            }
            
         </script>
        
      </body>
</html>


