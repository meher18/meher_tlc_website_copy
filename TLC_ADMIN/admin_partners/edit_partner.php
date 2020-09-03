
<?php 
 
session_start();
include("../config/config.php");

$pid=$_GET['pid'];


          $query="select * from media_partners where partner_id=$pid";
          $exec=mysqli_query($con,$query);
          $row=mysqli_fetch_array($exec)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit partner</title>

       <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

</head>
<body style="padding: 40px 0px;background-color:#275686">

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron bg-dark" style="color:white">
            <h1>Update the collaborator details</h1>
            <form action="./edit.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="partner_details">Enter Partner details</label>
                    <textarea rows="5" type="text" name="partner_details" class="form-control"  ><?php echo $row['partner_details'] ;?></textarea>
                </div>
                <div class="form-group">
                    <label for="old_image">Partner old image 
                        <br>
                          <img src="partner_images/<?php echo $row['partner_image'] ;?>" alt="" width="300" >
                    </label>
                    <input type="text" name="old_image" value="<?php echo $row['partner_image'] ;?>" class="form-control" readonly style="visibility: hidden;">
                    <label for="partner_details">Enter Partner photo</label>
                    <input type="file" name="partner_image" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="partner_details">Enter  link</label>
                    <input type="text" name="partner_link" class="form-control" value="<?php echo $row['partner_url'] ;?>">
                </div>
                <button name="id" value="<?php echo $pid ?>" class="btn btn-info">UPDATE</button>
            </form>
        </div>
    </div>

 
    

           <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</body>
</html>