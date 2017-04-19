<?php
  if(session_status() == true){
    //Do nothing
  }
  else{
    session_start();
  }
  include 'php/GeneralFunc.php';
  include 'php/TrialBalanFunc.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Application Domain</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/tables.css" rel="stylesheet">
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
                <a class="navbar-brand" href="HomePage.php">Black Bird Accounting</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                if (isset($_SESSION['logged_in_as'])){
                    echo "<div class="."'collapse navbar-collapse'"." id="."'bs-example-navbar-collapse-1'".">".
                          "<ul class="."'nav navbar-nav'".">".
                              "<li class="."'dropdown'"."><a class="."'dropdown-toggle'"." data-toggle="."'dropdown'"." href="."'#'".">Chart Of Accounts<span class="."'caret'"."></span></a>".
                                 "<ul class="."'dropdown-menu'".">".
                                   "<li><a href="."'AccountsPage.php'".">Accounts</a></li>".
                                   "<li><a href="."'ChartofAccountsBasicPage.php'".">Chart Of Accounts Basic</a></li>".
                                   "<li><a href="."'ChartofAccountsDetailedPage.php'".">Chart Of Accounts Detailed</a></li>".
                                 "</ul>".
                             "</li>".
                             "<li class="."'dropdown'"."><a class="."'dropdown-toggle'"." data-toggle="."'dropdown'"." href="."'#'".">Journals<span class="."'caret'"."></span></a>".
                                "<ul class="."'dropdown-menu'".">".
                                  "<li><a href="."'JournalPage.php'".">Add a Journal</a></li>".
                                  "<li><a href="."'#'".">View Journals</a></li>".
                                "</ul>".
                            "</li>".
                            "<li>".
                                "<a href=". "'LedgerPage.php'".">Ledger</a>".
                            "</li>".
                             "<li class="."'dropdown'"."><a class="."'dropdown-toggle'"." data-toggle="."'dropdown'"." href="."'#'".">Financial Statements<span class="."'caret'"."></span></a>".
                               "<ul class="."'dropdown-menu'".">".
                                 "<li><a href="."'TrialBalancePage.php'".">Trial Balance</a></li>".
                                 "<li><a href="."'IncomeStatementPage.php'".">Income Statement</a></li>".
                                 "<li><a href="."'BalanceSheetPage.php'".">Balance Sheet</a></li>".
                                 "<li><a href="."'RetainedEarningsPage.php'".">Retained Earnings</a></li>".
                               "</ul>".
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

        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- PASTE CONTENT HERE -->
                <h2>Trial Balance</h2>
                <h4>Black Bird Acccounting</h4>
                <h4><?php getCurrentDate(); ?></h4>
                <table class = "table-fill">
                  <thead>
                    <tr>
                      <th>Account Title</th>
                      <th></th>
                      <th>Debit</th>
                      <th>Credit</th>
                    </tr>
                  </thead>
                  <tbody class = "table-hover">
                      <?php getEntries(); ?>
                      <tr>
                        <td>

                        </td>
                        <td>
                          Total:
                        </td>
                        <td>
                          <span class = "doubleUnderline">
                            $ <?php getDebitSum(); ?>
                          </span>
                        </td>
                        <td>
                          <span class = "doubleUnderline">
                            $ <?php getCreditSum(); ?>
                          </span>
                        </td>
                      </tr>
                  </tbody>
                </table>











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
