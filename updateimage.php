<?php 

include_once('Conn.php');
 
class updateimage extends Conn{
 
    public function __construct(){
 
        parent::__construct();
    }
 
    public function update($sql){
        $query = $this->connection->query($sql);
        $row = $query->fetch_assoc();
             
        return $row;       
    }
    public function upload($id,$c_image_temp,$c_image){
        $imageFileType = strtolower(pathinfo(basename($c_image),PATHINFO_EXTENSION));
        $newfilename = time().'_phpproject.'.$imageFileType ;
        $target_file = $target_dir . $newfilename ;

        move_uploaded_file($c_image_temp ,"uploads/$newfilename");

    $sql = "UPDATE image SET image='$newfilename' WHERE id='$id'";
    if ($this->connection->query($sql) === TRUE) {
        echo "<script>
        alert(' successful file update');
         window.location.href='gallery.php';
         </script>";
    } else {
        echo "Error updating record: " . $this->connection->error;
    }


           
    }

}

$updateimage = new updateimage();
if(isset($_POST['submit'])){
    $filename = $_POST['filename'];
    $id=$_POST['id'];
    $c_image= $_FILES['fileToUpload']['name'];
    $c_image_temp=$_FILES['fileToUpload']['tmp_name'];
    $file = "$filename";

   
        $updateimage->upload($id,$c_image_temp,$c_image);
  
    
}

?>