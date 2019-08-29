<!DOCTYPE html>
<html lang="en">

<head>
    <!--  meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Demo</title>

    <!-- Icons font CSS-->
    <link href="colorlib-regform-3/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-3/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- colorlib-regform-3/vendor CSS-->
    <link href="colorlib-regform-3/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-3/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="colorlib-regform-3/css/main.css" rel="stylesheet" media="all">
</head>

<body>
       
<?php
include_once 'header.php';
 ?>  
    <div class="page-wrapper  p-t-180 p-b-100 font-poppins" style="background-color: black">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST" action="add.php" class="was-validated">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="name" pattern="[a-zA-Z\s]{3,35}"
        title="Name should only contain uppercase & lowercase letters. e.g. Hardik" required>
                           
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Birthdate" name="birthday" required>
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gender" required>
                                    <option disabled="disabled" selected="selected">Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                                <div class="select-dropdown"></div>
                            
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email" required>
                           
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Phone" name="phone" pattern="[0-9]{10}"
        title="Phone should only contain Number. e.g. 0123456789" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password: (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)" required>
                           
                        </div>
                        <div class="p-t-10">
                         
                            <input class="btn btn--pill btn--green" value="submit" name="submit" type="submit">
                        </div>
                        <div class="p-t-10">
                        <input class="btn btn--pill btn--green"  type=button onClick="location.href='login.php'" value='Login'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="colorlib-regform-3/vendor/jquery/jquery.min.js"></script>
    <!-- colorlib-regform-3/vendor JS-->
    <script src="colorlib-regform-3/vendor/select2/select2.min.js"></script>
    <script src="colorlib-regform-3/vendor/datepicker/moment.min.js"></script>
    <script src="colorlib-regform-3/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="colorlib-regform-3/js/global.js"></script>
 
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->