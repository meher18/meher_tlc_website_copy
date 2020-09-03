<?php
    include('../config/config.php');
    session_start();
  
    if(!isset($_SESSION['email'])) {
        header('Location: ../admin/index.php');
    }
    $email = $_SESSION['email'];
 
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Comments</title>

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
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
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
            <a class="nav-link " href="../admin_videos/index.php">
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
              <span data-feather="view comments"></span>
           TLC USERS 
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link active" href="../admin_comments/index.php">
              <span data-feather="view comments"></span>
              VIEW COMMENTS <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Blog and Event Comments</h1>
      </div>
      <!-- Form to add blogs into the database -->
      <div class="container text-center">
         <div class="table-responsive-sm">
            
            <table class="table table-bordered table-hover table-dark">
                <thead>
                    <tr>
                    <th colspan="5" scope="col"><h1>Blog Comments</h1></th>
                    </tr>
                    <tr>
                    <th scope="col">sl no.</th>
                    <th scope="col">blog id</th>
                    <th scope="col">comment </th>
                    <th scope="col">user id</th>
                    <th scope="col">Delete Comment</th>
                    </tr>
                </thead>
                <tbody>
              <?php
                  $blog_comments = "SELECT * FROM blog_comments";
                  $blog_comment_count=0;
                  $blog_comments_result = mysqli_query($con,$blog_comments) or die(mysqli_error($con));
                  while($row = mysqli_fetch_assoc($blog_comments_result)) {
                  $blog_comment_count++;
                ?>
                   <tr>
                    <th scope="row"><?php echo $blog_comment_count; ?></th>
                    <td><?php echo $row['blog_id']; ?></td>
                    <td><?php echo $row['blog_comment']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                  
                    <td><i class="fa fa-trash-alt fa-2x" style="color: #aaa;cursor: pointer;" onclick="deleteBlogComment(<?php echo $row['id']; ?>)"></i> </td>
                    </tr>
           <?php } 
            if($blog_comment_count<=0)
            {
              echo "<tr ><td colspan='7'><h1>No blog Comments</h1></td></tr>";
            }
           ?>
                </tbody>
                </table>
         </div>
          <button class="btn btn-dark" onclick="erase('blog_comments')">ERASE ALL COMMENTS FROM BLOGS</button>
      </div>
      <!-- Form to add blogs into the database -->
      <div class="container text-center" style="margin-top: 10vh;">
         <div class="table-responsive-sm">
            
            <table class="table table-bordered table-hover table-dark">
                <thead>
                    <tr>
                    <th colspan="5" scope="col"><h1>Event Comments</h1></th>
                    </tr>
                    <tr>
                    <th scope="col">sl no.</th>
                    <th scope="col">event id</th>
                    <th scope="col">Comment </th>
                    <th scope="col">user id</th>
                    <th scope="col">Delete Comment</th>
                    </tr>
                </thead>
                <tbody>
              <?php
                  $event_comments = "SELECT * FROM event_comments";
                  $event_comment_count=0;
                  $event_comments_result = mysqli_query($con,$event_comments) or die(mysqli_error($con));
                  while($row = mysqli_fetch_assoc($event_comments_result)) {
                  $event_comment_count++;
                ?>
                   <tr>
                    <th scope="row"><?php echo $event_comment_count; ?></th>
                    <td><?php echo $row['event_id']; ?></td>
                    <td><?php echo $row['event_comment']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                  
                    <td><i class="fa fa-trash-alt fa-2x" style="color: #aaa;cursor: pointer;" onclick="deletEventComment(<?php echo $row['comment_id']; ?>)"></i> </td>
                    </tr>
           <?php } 
            if($event_comment_count<=0)
            {
              echo "<tr ><td colspan='7'><h1>No Event Comments</h1></td></tr>";
            }
           ?>
                </tbody>
                </table>
         </div>
          <button class="btn btn-dark" onclick="erase('event_comments')">ERASE ALL COMMENTS FROM EVENTS</button>
      </div>
        
</main><br>


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
<script>
   function deleteBlogComment(id)
   {  
         var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                 
                   if(this.responseText.match("deleted"))
                   {
                     
                       document.location.reload();
                   }
                  }
                };
                xhttp.open("GET", "delete_blog_comment.php?id="+id, true);
                xhttp.send();
   }
   function deletEventComment(id)
   {  
         var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                 
                   if(this.responseText.match("deleted"))
                   {
                       
                       document.location.reload();
                   }
                  }
                };
                xhttp.open("GET", "delete_event_comment.php?id="+id, true);
                xhttp.send();
   }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="../asets/js/dashboard.js"></script></body>

        <script>
       
        </script>
</html>
