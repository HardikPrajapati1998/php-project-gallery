<?php
//start session
session_start();
 
include_once('User.php');
 
$user = new User();
 
if(isset($_POST['submit'])){
	$email = $user->escape_string($_POST['email']);
	$password = $user->escape_string($_POST['password']);
 
	$auth = $user->check_login($email, $password);
    
	if(!$auth){
		$_SESSION['message'] = 'Invalid email or password';
    	header('location:login.php');
	}
	else{
		
		$_SESSION['user'] = $auth;
            $_SESSION['start'] = time();
       
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
            // Storing session data
        
		header('location:home.php');
	}
}
else{
	$_SESSION['message'] = 'You need to login first';
	header('location:login.php');
}
?>