<?php
  if(session_status() == false){
    session_start();}
    // Connection to database
    $connection = mysqli_connect("localhost", "root", null, "application_domain")
      or die('Error connecting to MySQL server.');
    // Included php functions
    include 'php/EditPageFunc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Account Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/tables.css" rel="stylesheet">
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
            <?php
                if (isset($_SESSION['logged_in_as'])){
                    echo "<div class="."'collapse navbar-collapse'"." id="."'bs-example-navbar-collapse-1'".">".
                         "<ul class="."'nav navbar-nav'".">".
                         "<li class="."'dropdown'"."><a class="."'dropdown-toggle'"." data-toggle="."'dropdown'"." href="."'#'".">Chart Of Accounts <span class="."'caret'"."></span></a>".
                         "<ul class="."'dropdown-menu'".">".
                          "<li><a href="."'AccountsPage.php'".">Accounts</a></li>".
                          "<li><a href="."'ChartofAccountsBasicPage.php'".">Chart Of Accounts Basic</a></li>".
                          "<li><a href="."'ChartofAccountsDetailedPage.php'".">Chart Of Accounts Detailed</a></li>".
                        "</ul>".
                    "</li>".
                    "<li>".
                        "<a href="."'JournalPage.php'".">Journal</a>".
                    "</li>".
                    "<li>".
                        "<a href=". "'EventLogPage.php'".">Event Log</a>".
                    "</li>".
                "</ul>";
                }
            ?>
                <!-- user-info -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello
                    <?php
                        if (isset($_SESSION['logged_in_as'])){
                            echo $_SESSION['logged_in_as'];
                        }
                    ?>
                    </a></li>
                    <li><a href="/ApplicationDomain/php/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
                <!-- /.user-info -->
            </div>




            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <h1>Edit Account</br><small>Detailed View</small></h1>
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Form -->
                    <form action="/ApplicationDomain/php/EditPageFunc.php" method="POST">
                        <!-- Table -->
                        <table>
                          <thead>
                            <tr>
                              <th>Code</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Normal Side</th>
                              <th>Initial Balance</th>
                              <th>Order</th>
                              <th>Added By</th>
                              <th>Added On</th>
                              <th>Active</th>
                              <th>Group</th>
                              <th>Event Log</th>
                              <th>Error Code</th>
                              <th>Comment</th>
                            </tr>
                          </thead>
                          <tbody class = "table-hover">
                          <?php
                            loadAccount();
                          ?>
                          </tbody>
                        </table>

                        <!-- Back Button -->
                        <button id="backButton" class="btn btn-primary" onclick="history.go(-1);">Back </button>

                        <!-- Save Changes Button -->
                        <button type="submit" class="btn btn-primary" id="saveButton" name="saveButton">Save</button>
                    </form>

            </div>
        </div>


    </div>
        <!-- /.row -->
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Black Bird Accounting</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
</div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
