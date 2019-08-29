<?php
include_once('Conn.php');
 
class User extends Conn{
 
    public function __construct(){
 
        parent::__construct();
    }
 public function registration($fname, $birthday,$gender,$email,$phone,$password){
    $sql = "SELECT email FROM student WHERE email='$email' ";

    $result = mysqli_query($this->connection, $sql);
    $count = mysqli_num_rows($result);
    
    if ($count == 1)
    {
      echo "<script>
             alert('email already exist');
             window.location.href='index.php';
             </script>"; 
             exit;
   }
    else
    {
        $result = mysqli_query($this->connection, "INSERT INTO  student (fname,birthday,gender,email,phone,password) VALUES('$fname','$birthday','$gender','$email','$phone','$password')");

        //display success message
        echo "<script>
        alert('Registration successful');
             window.location.href='login.php';
             </script>"; 
             exit;
      
        echo "<font color='green'>Data added successfully.";
    }

 }

    public function check_login($email, $password){
        $sql = "SELECT * FROM student WHERE email = '$email' AND password = '$password'";
        $query = $this->connection->query($sql);
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['email'];
        }
        else{
            return false;
        }
    }

  public function details($sql){
        $query = $this->connection->query($sql);
        $rows = [];
        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }      
        return $rows;       
    }   
    public function escape_string($value){
        return $this->connection->real_escape_string($value);
    }


    public function contact($fname,$email,$phone,$message){

        require 'PHPMailerAutoload.php';
            
        $mail = new PHPMailer;
        
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'collegeconnection2019@gmail.com';                 // SMTP username
        $mail->Password = 'college@123';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to      
        $mail->setFrom('collegeconnection2019@gmail.com', 'Hardik Prajapati');
        $mail->addAddress('hrp1501998@gmail.com');     // Add a recipient
                      // Name is optional
        $mail->addReplyTo('collegeconnection2019@gmail.com');
       // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'Collegeconnect';
        $mail->Body    = 'Hardik Prajapati';
        $mail->AltBody ='echo Mobile No:$phone; Message: echo  $message' ;
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

        $result = mysqli_query($this->connection, "INSERT INTO  contact (fname,email,phone,message) VALUES('$fname','$email','$phone','$message')");
    
            //display success message
            echo "<script>
            alert('Contact Us successful Send Email');
                 window.location.href='home.php';
                 </script>"; 
                 exit;
          
            echo "<font color='green'>Data added successfully.";
   
     }


       
  public function con_details($sql){
    $query = $this->connection->query($sql);
    $row = $query->fetch_assoc();     
    return $row;       
}   


public function fileToUpload($fname,$image,$email){
    
    $result = mysqli_query($this->connection,"INSERT INTO  image (fname,image,email) VALUES ('$fname','$image','$email')");

        return $result;     
}

public function file_details($sql){
    $query = $this->connection->query($sql);
    $rows = [];
    while ($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }      
    return $rows;       
} 

}