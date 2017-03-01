<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Application Domain</title>

    <!-- Bootstrap Core CSS -->
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
                          "<li><a href="."'AddAccountsPage.php'".">Add Accounts</a></li>".
                          "<li><a href="."'ChartofAccountsBasicPage.php'".">Chart Of Accounts Basic</a></li>".
                          "<li><a href="."'ChartofAccountsDetailedPage.php'".">Chart Of Accounts Detailed</a></li>".
                        "</ul>".
                    "</li>".
                    "<li>".
                        "<a href="."'JournalPage.php'".">Journal</a>".
                    "</li>".
                    "<li>".
                        "<a href="."'#'".">Placeholder</a>".
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
<?php
     $today = date("Y-m-d");
    $fromAccount = $_GET["fromAccount"];
    $toAccount = $_GET["toAccount"];
    $type = $_GET["type"];
    $type1 = $_GET["type1"];
    $amount = $_GET["amount"];
    $amount1 = $_GET["amount1"];
    $debit = "Debit";
    $credit= "Credit";


    echo("<p>Thank you for registering as a tutor, confirmation email message successfully sent! You are now eligible to provide tutor service within your specified availability.</p>");


   echo "<table style='width:80%' align='center'><tr><th>Date</th>
               <th>Account</th><th>Debit</th><th>Credit</th></tr>";


    if ($type == $debit){
    echo "\r\n <tr><td>$today</td>" .
                  "<td>$fromAccount</td>" .
                    "<td>$amount</td>" . "<td></td>" . "</tr><tr></tr> ";

    echo "\r\n <tr><td>$today</td>" .
                  "<td>$toAccount</td>" .
                    "<td></td>" . "<td>$amount1</td>" . "</tr><tr></tr> ";
            echo "</table>";
    } else {
    echo "\r\n <tr><td>$today</td>" .
                  "<td>$fromAccount</td>" .
                    "<td></td>" . "<td>$amount</td>" . "</tr><tr></tr> ";

    echo "\r\n <tr><td>$today</td>" .
                  "<td>$toAccount</td>" .
                    "<td>$amount1</td>" . "<td></td>" . "</tr><tr></tr> ";
            echo "</table>";
    }

	$con = new mysqli("localhost","root","", "application_domain");
	if ($con->connect_error)
    {
 	   die("Can not connect: " . $con->connect_error);
	}
	$query = mysqli_prepare($con,
				"INSERT INTO journal (Date, Account_Name, Type, Amount) VALUES (?, ?, ?, ?)")
					or die("Error: ". mysqli_error($con));
			mysqli_stmt_bind_param ($query, "ssss", $today, $fromAccount, $type, $amount);

			mysqli_stmt_execute($query)
				or die("Error. Could not insert into the table."
                   . mysqli_error($con));
	$query = mysqli_prepare($con,
			"INSERT INTO journal (Date, Account_Name, Type, Amount) VALUES (?, ?, ?, ?)")
					or die("Error: ". mysqli_error($con));
			mysqli_stmt_bind_param ($query, "ssss", $today, $toAccount, $type1, $amount1);


			mysqli_stmt_execute($query)
				or die("Error. Could not insert into the table."
                   . mysqli_error($con));

			mysqli_stmt_close($query);


?>
<!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
