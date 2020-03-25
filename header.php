<?php
 ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--  meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Icons font CSS-->
    <link href="colorlib-regform-3/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-3/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- colorlib-regform-3/vendor CSS-->
    <link href="colorlib-regform-3/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-3/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="colorlib-regform-3/css/main.css" rel="stylesheet" media="all">
</head>

<body>
<?php if(isset($_SESSION['user'])){?>
  <?php
include_once 'header.php';
include_once('User.php');

$user = new User();

$email = $_SESSION['user'];
//fetch user data
$sql ="SELECT * FROM student WHERE email='$email'";
$result = $user->con_details($sql);

 ?>
<?php	} ?>
 

    
    <nav class="navbar navbar-expand-lg navbar-light ">
    <?php if(isset($_SESSION['user'])){?>
      <a class="navbar-brand" href="#"><?php echo $result['fname']?></a>
<?php	}else{?>
 
        <a class="navbar-brand active  text-right" href="#">Admin</a>
  
<?php }?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="gallery.php">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="contact.php">Contact us</a>
      </li>
     <?php if(isset($_SESSION['user'])){?>
      <li class="nav-item">
        <a class="nav-link active  text-right" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
      <form action="upload.php" method="Post" enctype="multipart/form-data">
    <input type="text" class="custom-file-input" value="<?php echo $result['email']?>" name="email" id="inputGroupFile02" hidden>

      <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="fileToUpload[]" id="inputGroupFile02" multiple="true">
    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
  </div>
  <div class="input-group-append">
    <span class="input-group-text" id=""><input type="submit" value="Upload" name="submit"></span>
  </div>
</div>    
</form>
</li>
<?php	}else{?>
  <li class="nav-item">
        <a class="nav-link active  text-right" href="login.php">Login</a>
      </li>
<?php }?>
     
    </ul>
 
  </div>
</nav>
   

    <!-- Jquery JS-->
    <script src="colorlib-regform-3/vendor/jquery/jquery.min.js"></script>
    <!-- colorlib-regform-3/vendor JS-->
    <script src="colorlib-regform-3/vendor/select2/select2.min.js"></script>
    <script src="colorlib-regform-3/vendor/datepicker/moment.min.js"></script>
    <script src="colorlib-regform-3/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="colorlib-regform-3/js/global.js"></script>
 
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
