<?php
//including the database connection file
include_once 'conn.php';
session_start();
session_destroy();
header("location:login.php");
?>