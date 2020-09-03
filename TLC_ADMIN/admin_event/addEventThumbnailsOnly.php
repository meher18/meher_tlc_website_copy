<?php 
  
  include("../config/config.php");
  session_start();
   $email=$_SESSION['email'];
    if(!isset($_SESSION['email'])) {
      header('Location: ../admin/index.php');
    }
  $added_thumbnail=$_SESSION['event_thumbnail'];
  $query="SELECT id from events order by id desc";
  $exec=mysqli_query($con,$query);
  $row=mysqli_fetch_array($exec);
  

  

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.css" rel="stylesheet">
</head>
<body style="background-color:#275686">
    

    <div class="container">
      
             <?php
                if( $added_thumbnail==='added')
                {
            ?>
               <div >
                    Thumbnail added successfully
                </div>
            <?php
            
                }
                
            ?>

      <div role="main" class="card jumbotron bg-dark" style="padding: 20px;margin-top:20vh;color:white">
           <h3 class="header">ADD EVENT THUMBNAILS HERE</h3>
              <h4>Enter thumbnails for the event (required min 4)</h4>
                <form action="add_thumbnail.php" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                      <label for="thumbnail_event_id">Select event id for thumbnail : select the event id and number of thumbnails automatically fills</label>
                      <input type="number" onchange="fillthethumbnailno(this)" min="1" max="<?php if($row[0]>0) echo $row['id'];else echo 1; ?>" id="thumbnail_event_id" value="<?php echo $current_event_id ;?>" name="thumbnail_event_id" class="form-control" >
                    </div>
                     <div class="form-group">
                      <label for="thumbnail_count">No of thumbnails added : select the event id to see how many thumnails are added</label>
                      <input type="number" id="thumbnail_count" value="<?php echo count($thumbnai_array) ;?>" name="thumbnail_count" class="form-control" readonly>
                    </div>
                        
                        
                    <div class="form-group">
                        <label for="event_thumbnail">Select thumbnail</label>
                        <input type="file" id="event_thumbnail" name="event_thumbnail" placeholder="Select image " class="form-control" required>
                    </div>
                    <button class="btn btn-primary">ADD THUMBNAIL</button>
                </form>

           </div>
           <button class="btn btn-dark" onclick="erase('event_thumbnails')">ERASE DATABASE</button>
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
        <script>
            function fillthethumbnailno(e){
             
              var xmhttp = new XMLHttpRequest();
              xmhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                
                    if(Number(this.responseText)>0)
                    {
                        document.getElementById("thumbnail_count").value=this.responseText;

                    }else{
                        document.getElementById("thumbnail_count").value=0;
                    }


                 
                  // alert(this.responseText);
                }
              };
              xmhttp.open("POST", "getThumbnailCount.php", true);
              xmhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xmhttp.send("event_id="+e.value);
                
            }
        </script>
</body>
</html>