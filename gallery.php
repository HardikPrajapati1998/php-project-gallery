
<?php
include_once 'header.php';
 ?> 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
 
 
 <style>
body {
 
  font-family: "Asap", sans-serif;
  color:#989898;
  margin:10px;
  font-size:16px;
}
     
#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }
.edit{
 
    background: #000;
    padding: 5px 30px;
    text-decoration: none;

    display: none;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.thumb:hover .zoom {
  opacity: 1; 
}
.thumb:hover .middle {
  opacity: 1;
}

     </style>



<div class="page-wrapper  p-t-10 p-b-10 font-poppins" style="background-color: black">
    <!-- Page Content -->
  
   <div class="container page-top" >



        <div class="row">


        <?php

//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:login.php');
}
 
$email = $result['email'];

include_once('User.php');

$user = new User();

//fetch user data
$sql ="SELECT * FROM image WHERE email = '$email'";
$result = $user->file_details($sql);

foreach($result as $row) {

    echo " 
    <div class='col-lg-3 col-md-4 col-xs-6 thumb'>
        <a href='$row[fname]$row[image]' target='_blank' rel='ligthbox'>
            <img  src='$row[fname]$row[image]' class='zoom img-fluid '  alt=''> 
            <div class='middle'>
            <div class='edit'> <a href='Delete.php?id=".$row['id']."'>Delete</a></div>
            <div class='edit'> <a href='update.php?id=".$row['id']."'>Edit</a></div>
          </div>
          <div class='middle'>
          
          
         
        </div>    
        </a>
    </div>
    ";
}
?>
            
           
           
       </div>

     
      
</div>
    </div>
    <script>
        $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    $(".zoom").hover(function(){
		
		$(".edit").css('display','block');
	});
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});
});
    
        </script>

