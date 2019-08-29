<?php 

include_once('Conn.php');   

class Delete extends Conn{
 public $email;
 public $image;
 
    public function __construct(){
 
        parent::__construct();
    
    }
 
    public function delete($email){
        
            $sql = "DELETE FROM student WHERE email = '$email'"; 
            
            if (mysqli_query($this->connection, $sql)) {
                mysqli_close($this->connection);
                header('Location: table.php'); 
                exit;
            }
            
            else {
                echo "Error deleting record";
            }
    }

    public function image($id){
        print_r($id);

        $sql = "DELETE FROM image WHERE id = '$id'"; 
        
        if (mysqli_query($this->connection, $sql)) {
            mysqli_close($this->connection);
            header('Location: gallery.php'); 
            exit;
        }
        
        else {
            echo "Error deleting record";
        }
}
public function remove(){
    if($_GET['email']){
        $email = $_GET['email'];
        echo "$email";
        
         $this->delete($email);
    }
    else{
        $id = $_GET['id'];
        $file = "uploads/$image";
       
            $this->image($id);
        
        
    }
  
}
   
}
$delete = new Delete();

$delete->remove();
?>