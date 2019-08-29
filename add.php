<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once 'Conn.php';
include_once 'header.php';

if(isset($_POST['submit'])) {  

    $fname = $_POST['name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
 
    session_start();
 
    include_once('User.php');
     
    $user = new User();
     
    if(isset($_POST['submit'])){
        $fname = $user->escape_string($_POST['name']);
        $birthday =$user->escape_string( $_POST['birthday']);
        $gender =$user->escape_string ($_POST['gender']);
        $email = $user->escape_string( $_POST['email']);
        $phone =$user->escape_string ($_POST['phone']);
        $password = $user->escape_string ($_POST['password']);
        
     
        $auth = $user->registration($fname, $birthday,$gender,$email,$phone,$password);
        
        if(!$auth){
            $_SESSION['message'] = 'Invalid email or password';
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
</body>
</html>