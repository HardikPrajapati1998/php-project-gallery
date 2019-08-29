<?php
include_once('Conn.php');
 
class Forgotpassword extends Conn{
 
    public function __construct(){
 
        parent::__construct();
    }
 
    public function forgot($email, $password){
       
        $sql = "SELECT email FROM student WHERE email='$email'";
           $result = mysqli_query($this->connection, $sql);
           $count = mysqli_num_rows($result);
     
           if ($count == 1)
           {
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
            $mail->addAddress($email);     // Add a recipient
                          // Name is optional
            $mail->addReplyTo('collegeconnection2019@gmail.com');
           
            
           // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
           // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            
            $mail->Subject = 'your Password';
            $mail->Body    = '<h1 style="color:green;">Forgot Password successful</h1>"';
            $mail->AltBody ='echo  $password' ;
            
            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }




            $sql = "UPDATE student SET password='$password' WHERE email='$email'";
            echo "<script>
            alert('Forgot successful');
            window.location.href='login.php';
            </script>";
          if ($this->connection->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $this->connection->error;
            }
           }
           else
           {
            echo "<script>
            alert('invalide Email ID');
            window.location.href='forgot.php';
            </script>"; 
           }
    }
    public function escape_string($value){
        return $this->connection->real_escape_string($value);
    }
}