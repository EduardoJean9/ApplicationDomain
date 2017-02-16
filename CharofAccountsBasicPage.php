<?php
    include 'php/ChartofAccountsfunc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Basic Chart of Accounts Page</title>

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
        <li class="nav-item"><a href="#section-3" class="left-underline nav-button" data-scroll>PlaceHolder1</a></li>
        <li class="nav-item"><a href="#section-2" class="left-underline nav-button" data-scroll>PlaceHolder 2</a></li>
        <li class="nav-item active"><a href="#section-1" class="left-underline nav-button" data-scroll>Placeholder3</a></li>
      </ul>
    </div>

    <!-- Page Content -->
    <div class="container">

   <table>
       <tr>
            <th>Code</th>
           <th>Account Name</th>
           <th>Account Type</th>
           <th>Normal Side</th>
           <th>Active</th>
           <th>Comment</th>
       </tr>
       <?php
        loadBasicCOA();
       ?>
   </table>

        
        
    </div>

    <!-- /.container -->


    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
