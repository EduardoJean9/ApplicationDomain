<?php
    session_start();
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
                          <li><a href="ChartofAccountsBasicPage.php">Chart Of Accounts Basic</a></li>
                          <li><a href="ChartofAccountsDetailedPage.php">Chart Of Accounts Detailed</a></li>
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
            <div class="col-lg-12">
                <h3> Journalizing </h3>
                
<!-- Input Here--> 
<!-- PHP START-->
<?php
$account = $_GET["Account Name"];

$query = mysqli_prepare($con, 
				"SELECT FROM Chart_0f_accounts (`Account Name`) VALUES (?)")
					or die("Error: ". mysqli_error($con));
			mysqli_stmt_bind_param ($query, "s", $account);
			                
<div class="well">
<form id="myForm" action="journalFunct.php" method="GET">

<table style="width:100%">
    <tr>
    <th></th>
    <th></th> 
    <th></th>
  </tr>
  <tr>
  <td> <label for="account"></label>

echo'<select class="form-control" id="fromAccount" name="fromAccount">';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo <option value="'.$row['something'].'">$row['something']</option>
    }
    <option></option>
    <option></option>
    <option></option>
 echo '</select>';
 </td>
     <td> <label for="Amount"></label>
  <input class="form-control" name="amount" id="amount" type="text" placeholder="0.00" /></td>
  </tr>
  <tr>
  <td> <label for="account1"></label>
  <select class="form-control" id="toAccount" name="toAccount">
    <option>Liabilities</option>
    <option></option>
    <option></option>
    <option></option>
  </select></td>
     <td> <label for="Amount1"></label>
  <input  class="form-control" name="amount1" id="amount1" type="text" placeholder="0.00" /></td>
      <td>  <input class="btn btn-success" type="submit" value="SUBMIT" id="btnSubmit"></td> 

  </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>    
</table>  
    </form>



                







            </div>
         
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
?>
</body>

</html>
