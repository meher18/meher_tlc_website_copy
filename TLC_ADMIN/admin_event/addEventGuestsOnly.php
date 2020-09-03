
<?php 
  include("../config/config.php");
  session_start();
   $email=$_SESSION['email'];
    if(!isset($_SESSION['email'])) {
      header('Location: ../admin/index.php');
    }
  $added_guest=$_SESSION['added_guests'];
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
                if( $added_guest==='added')
                {
            ?>
              <div  >
                    <strong>Guest added Congratulation!</strong>
                   
                </div>
            <?php
            
                }
                
            ?>
       <!-- Guests form -->
            <div  class="card jumbotron bg-dark" style="margin-top: 10vh;color:white">
            <h3>ADD GUESTS</h3>
              <h4>Enter Guests for the event (Optional)</h4>
              <form action="add_event_guest.php" method="POST" enctype="multipart/form-data">
                      
                   <div class="form-group">
                            
                      <label for="guest_event_id">Enter Guests for event id : </label>
                      <input type="number" id="guest_event_id" min="1" max="<?php if($row[0]>0) echo $row['id'];else echo 1; ?>" value="<?php echo $current_event_id ; ?>" name="guest_event_id"  class="form-control" >
                    </div>
                        
                    <div class="form-group">
                      <label for="guest_name">Enter guest name</label>
                      <input type="text" id="guest_name" name="guest_name" placeholder="Enter guest name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="guest_name">Enter guest details</label>
                        <textarea type="text" id="guest_details" name="guest_details" placeholder="Event guest details" class="form-control" required></textarea>

                    </div>
                        
                    <div class="form-group">
                         <label for="guest_name">Enter guest details</label>
                          <input type="file" id="guest_photo" name="guest_photo"  class="form-control" required>
                    </div>
                    <button class="btn btn-primary">ADD GUEST</button>
              </form>
            </div>


            <button class="btn btn-dark" onclick="erase('event_guests')">ERASE DATABASE</button>
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
</body>
</html>