
<?php 
 
session_start();
include("../config/config.php")


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partners</title>

       <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

</head>
<body style="padding: 40px 0px; background-color:#275686;color: white;" >
    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron bg-dark" style="color:white">
            <h1>Enter the collaborator details</h1>
            <form action="./add_partner.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="partner_details">Enter Partner details</label>
                    <textarea type="text" name="partner_details" class="form-control" rows="5" ></textarea>
                </div>
                <div class="form-group">
                    <label for="partner_details">Enter Partner photo</label>
                    <input type="file" name="partner_image" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="partner_details">Enter  link</label>
                    <input type="text" name="partner_link" class="form-control" >
                </div>
                <button class="btn btn-primary">POST</button>
            </form>
        </div>
    </div>
   <div class="container">
       <h1 >Below are the collaborator's</h1>
   </div>
     <div class="container" style="display: flex;
     flex-direction: row;
     flex-wrap: wrap;
     align-content: center;
     align-items: center;
     justify-content: space-evenly;">
      
         <?php
         
          
          $query="select * from media_partners ";
          $exec=mysqli_query($con,$query);
          while($row=mysqli_fetch_array($exec))
          {
            $pid=$row['partner_id'];
         ?>
          <div class="card" style="width: 400px;">
        <div class="card-body" >
         
            <img src="partner_images/<?php echo $row['partner_image'] ;?>" alt="" width="300" height="300" >
            <h5 class="card-title" style="color: black;"><?php echo $row['partner_details'] ;?></h5>
            
            <a class="card-text" href="<?php echo $row['partner_url']; ?>" target="_blank"><?php echo $row['partner_url']; ?></a>
           <br>
            <a href="edit_partner.php?pid=<?php echo $pid; ?>" class="btn btn-primary" style="background-color: #ADD8E6 !important;color: #005b8f !important;">Edit</a>
            <a href="delete.php?pid=<?php echo $pid; ?>" class="btn btn-danger" style="background-color:  #ffcccb !important;color: red;">Delete</a>
            
          </div>
        </div>

        <?php } ?>
     </div>
     <div class="container">

       <button  class="btn btn-dark " onclick="erase('media_partners')">ERASE DATABASE</button>
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