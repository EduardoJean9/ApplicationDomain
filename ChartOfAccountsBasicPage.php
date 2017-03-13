<?php
    if(session_status() == true){
      //Do nothing
    }
    else{
      session_start();
    }
    include 'php/ChartofAccountsfunc.php';
    include 'php/AddAccountsFunc.php';
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
    <link href="css/tables.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="AddAccounts.js" ></script>
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    h1{
      text-align: center;
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
                          "<li><a href="."'AddAccountsPage.php'".">Add Accounts</a></li>".
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
        <h1>Chart of Accounts</br><small>Basic View</small></h1>
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- PASTE CONTENT HERE -->

                <div class="well">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add an Account</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Add an Account</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form name="journalInput" action="JournalPage.php" method="POST" class = "navbar-center">

                  <div class = "form-group">
                      <label>Account Name</label>
                      <select class="form-control">
                        <?php
                          getSelectOptions();
                         ?>
                      </select>
                      <small>*If account is not listed, the account is already created.</small>
                  </div>
                  <div class = "form-group">
                    <label>Initial Account Balance</label>
                    <input type = "text" class="form-control"/>
                  </div>
                  <div class = "form-group">
                    <label>Is the acccount active?</label></br>
                    <input class = "radio-inline" type = "radio" name="Active" value="Yes" />Yes
                    <input class = "radio-inline" type = "radio" name="Active" value="No" />No
                  </div>
                  <div class = "form-group">
                    <label>Comment</label>
                    <input type = "text" class="form-control"/>
                  </div>
                  </br>



                <input type="submit" value="Submit" class="btn btn-primary" name= "submitBTN">
                </form>
                </div>
                <div class="modal-footer">
                </div>
                </div>
                </div>
                </div>
                </div>

                <?php
                if(isset($_POST["submitBTN"])){
                    insertAccount();
                }
                 ?>

                <div>
                    <!-- Form -->
                    <form action="/ApplicationDomain/php/ChartofAccountsfunc.php" method="POST">
                        <!-- Table -->
                        <table class = "table-fill">
                          <thead>
                            <tr>
                              <th>Code</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Normal Side</th>
                              <th>Initial Balance</th>
                              <th>Active</th>
                              <th> </th>
                            </tr>
                          </thead>
                          <tbody class = "table-hover">
                            <?php
                              loadBasicCOA();
                            ?>
                          </tbody>
                        </table>

                        <!-- Back Button -->
                        <button id="backButton" class="btn btn-primary" onclick="history.go(-1);">Back </button>

                        <!-- Save Changes Button -->
                        <button type="submit" class="btn btn-primary" id="saveButton" name="saveButton">Save</button>

                        <!-- Add Account Button -->
                        <button type="submit" class="btn btn-primary" name="addAccountsButton">Add Account</button>
                    </form>
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
