
<?php
//including the database connection file
include_once 'Conn.php';
include_once 'header.php';

if(isset($_POST['submit'])) {  

    $fname = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
print_r($fname);
    include_once('User.php');
     
    $user = new User();
     
    if(isset($_POST['submit'])){
        $fname = $user->escape_string($_POST['name']);
        $email = $user->escape_string( $_POST['email']);
        $phone =$user->escape_string ($_POST['phone']);
        $message = $user->escape_string ($_POST['message']);
        
     
        $auth = $user->contact($fname,$email,$phone,$message);
        
        if(!$auth){
            $_SESSION['message'] = 'Invalid email or message';
            header('location:index.php');
        }
        else{
            $_SESSION['user'] = $auth;
            header('location:login.php');
        }
    }
    else{
        $_SESSION['message'] = 'You need to login first';
        header('location:login.php');
    }
      

}

?>
