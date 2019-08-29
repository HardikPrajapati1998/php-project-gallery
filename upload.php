<?php

include_once 'Conn.php';

    include_once('User.php');
     
    $user = new User();
     
    if(isset($_POST['submit'])){
       
            $target_dir = "uploads/";
            $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
            $newfilename = time().'_phpproject.'.$imageFileType ;
            $target_file = $target_dir . $newfilename ;
            
            $uploadOk = 1;
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
           /* if (file_exists($target_file)) {
                echo "
                <script>
                alert('Sorry, file already exists.');
                 window.location.href='gallery.php';
                 </script>";
                $uploadOk = 0;
            }*/
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                echo "<script>
                alert('Sorry, your file is too large.');
                 window.location.href='gallery.php';
                 </script>"; 
               
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
               
                echo "<script>
                alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                 window.location.href='gallery.php';
                 </script>"; 
                
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<script>
                alert('Sorry, your file was not uploaded.');
                 window.location.href='gallery.php';
                 </script>"; 
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "<script>
                alert(' successful file upload');
                 window.location.href='gallery.php';
                 </script>"; 
                   
                    $fname = $user->escape_string($target_dir);
                    $image =$user->escape_string($newfilename );
                    $email = $user->escape_string($_POST['email']);
                    $auth = $user->fileToUpload($fname,$image,$email);
                    

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            

        }

?>