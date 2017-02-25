<?php
   session_start()!= false or die('Could not start session');
   include 'php/sessions.php';

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

    <title>Main Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/homepage.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="HomePage.php">Application Domain</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Chart Of Accounts <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="AccountsPage.php">Accounts</a></li>
          <li><a href="ChartOfAccountsBasicPage.php">Chart Of Accounts Basic</a></li>
          <li><a href="ChartOfAccountsDetailedPage.php">Chart Of Accounts Detailed</a></li>
        </ul>
      </li>
                    <li>
                        <a href="JournalPage.php">Journal</a>
                    </li>
                    <li>
                        <a href="#">Placeholder</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- PASTE CONTENT HERE -->

                <div id="loginForm" class="container">

                    <form action="php/login.php" method="POST">
                    <br>
                    <label>User</label><br>
                    <input type="text" id="MyUsername" name="MyUsername">
                    <label>Password</label>
                    <input type="password" id="MyPassword" name="MyPassword">
                    <input type="submit" id="btn" value="Login">

                    <?php if (isset($_SESSION['logged_in_as']))
                    {
                        echo "<label>Hello " . $_SESSION['logged_in_as'] . "</label>";
                        }
                    ?>

                    </form>

                    <?php
                    /*if(isset($_SESSIONS['logged_in'])){
                        $log = $_POST['logged_in'];
                        echo "<p>" . $log . "</p>";
                    }*/
                    ?>



                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
