<?php
   $connection = mysqli_connect("localhost", "root", null, "application_domain") 
   or die('Error connecting to MySQL server.');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/template.css" rel = "stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <div class="navbar">
      <ul class="navbar-container">
        <li><a href="#" class="left-underline nav-button brand-logo">Brand Logo</a></li>
        <li class="nav-item"><a href="#section-3" class="left-underline nav-button" data-scroll>Journal Entries</a></li>
        <li class="nav-item"><a href="ChartofAccountsBasicPage.php" class="left-underline nav-button" data-scroll>Chart of Accounts</a></li>
        <li class="nav-item active"><a href="HomePage.php" class="left-underline nav-button" data-scroll>Home</a></li>
      </ul>
    </div>

    <!-- Page Content -->
    <div class="container">

    <form action="login.php" method="POST">
    
    <label>User</label>
    <input type="text" name="myUsername">
    
    <label>Password</label>
    <input type="text" name="myPassword">

    <input type="submit" name="loginBTN" value="login">
    

    </form>

        
    </div>

    <!-- /.container -->


    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
