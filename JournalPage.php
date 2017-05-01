<?php
    if(!session_status() == true){
      session_start();
    }

 include 'php/journalFunct.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Journal Page</title>

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
        <a class="navbar-brand" href="HomePage.php">Black Bird Accounting</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <!-- Appears after login -->
      <?php
        if (isset($_SESSION['logged_in_as'])){
          echo "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>".
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
                        "<li><a href="."'JournalView.php'".">View Journals</a></li>".
                          "<li><a href="."'JournalPage.php'".">Add a Journal</a></li>".
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

      <?php
      if ( isset($_SESSION['logged_in_as'])){
        echo "</div>";
      }
      ?>

    <!-- /.navbar-collapse -->
    </div>

  <!-- /.container -->
  </nav>

 <!-- Page Content -->
  <div class="container">
    <h1>Add a Journal Entry</h1>
      <div class="row">
        <div class="col-lg-12 text-center">

        <!-- PASTE CONTENT HERE -->
          <div class="well">

                  <div class="modal-body">
                    <form name="journalInput" action="JournalPage.php" method="POST">
                      <table>
                        <tr>
                          <th>Account</th>
                          <th>Debit</th>
                          <th>Credit</th>
                        </tr>
                        <tr>
                          <td>
                            <select class="form-control" name="Account">
                              <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";

                                $con = mysqli_connect($servername,$username,$password);

                                if(!$con){
                                  die("Can not connect: " . mysql_error());
                                }

                                mysqli_select_db($con,"application_domain");

                                $sql = "SELECT `Account Name` FROM chart_of_accounts WHERE `Account Name`  = `Account Name`";
                                $result = mysqli_query($con,$sql);

                                while ($row = mysqli_fetch_array($result)){
                                  echo "<option value= '". $row['Account Name'] ."'>" .$row['Account Name'] ."</option>" ;
                                }

                                 mysqli_close($con);
                              ?>
                            </select>
                          </td>
                          <td>
                            <input class="form-control" name="amountD" id="" type="number" placeholder="0.00" width="48" height="48">
                          </td>
                          <td>
                            <input  class="form-control" name="amountC" id="" type="number" placeholder="0.00" width="48" height="99">
                          </td>
                        </tr>
                      </table>
                      <input type="submit" value="Submit" class="submit btn btn-primary" name= "submitBTN">
                    </form>

          </div>
<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
    $con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
    mysqli_select_db($con,"application_domain");

                if(isset($_POST["submitBTN"]) )
                {

    $Account = $_POST["Account"];
    $Debit = $_POST["amountD"];
    $Credit = $_POST["amountC"];
    $Date = date("Y-m-d");

    mysqli_select_db($con,"application_domain");
    $sql1 = "SELECT DISTINCT(`Account`) FROM `journaltemp` WHERE `Account` = '$Account'";
	$myData = mysqli_query($con,$sql1);
        if(!$myData){printf("Error: %s\n", mysqli_error($con)); exit();}
	while($record = mysqli_fetch_array($myData))
    	 $CheckAccount = $record['Account'];

    if ((empty($CheckAccount)))
    {
        if ((empty($Account) && empty($Debit) && empty($Credit))||(empty($Debit) && empty($Credit))|| empty($Account) )
    {
    echo 'Enter a valid entry!';
    }
    else
    {
     mysqli_select_db($con,"application_domain");
      $query = mysqli_prepare($con,
				"INSERT INTO journaltemp (Account, Debit, Credit, Date) VALUES (?, ?, ?, ?)")
					or die("Error: ". mysqli_error($con));
			mysqli_stmt_bind_param ($query, "ssss", $Account, $Debit, $Credit, $Date);

			mysqli_stmt_execute($query)
				or die("Error. Could not insert into the table."
                   . mysqli_error($con));
                }
    }
    else
    {
                    if($CheckAccount == $Account)
                    {


         if ((empty($Account) && empty($Debit) && empty($Credit))||(empty($Debit) && empty($Credit)) )
    {
    echo 'Enter a valid entry!';
    }
    else
    {
        if (empty($Debit))
        {
            $query ="UPDATE `journaltemp` SET `Debit`= `Credit` + '$Credit' Where `Account` = '$Account'";
       mysqli_query($con, $query)
				or die("Error. Could not insert into the table."
                   . mysqli_error($con));
                }
        elseif(empty($Credit))
        {
            $query ="UPDATE `journaltemp` SET `Debit`= `Debit` + '$Debit' Where `Account` = '$Account'";
       mysqli_query($con, $query)
				or die("Error. Could not insert into the table. "
                   . mysqli_error($con));

        }
                else
                {

                }
                    }}
    }

                }

   mysqli_close($con);


?>
                      </div>


   <form name="journalInput" action="JournalPage.php" method="POST">

                   <table class = "table-fill" width = "75%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Account Name</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class = "table-hover">
                    <?php
                      loadJournaltemp();
                    ?>
                  </tbody>
               </table>
                <input class="btn btn-primary" name= "validateBTN" type="submit" value="Submit" id= "submit">
<form action='JournalView.php'>
    <input type="submit" value="View Journal" class="btn btn-primary"/>
</form>
                </form>

                 <?php

    $new="new";

	$con = new mysqli("localhost","root","", "application_domain");
	if ($con->connect_error)
    {
 	   die("Can not connect: " . $con->connect_error);
	}


        if(isset($_POST['validateBTN']))
            {
            $editedBy = $_SESSION['logged_in_as'];

    $query = mysqli_prepare($con,
				"INSERT INTO JournalCounter (Name) VALUES (?)")
					or die("Error: ". mysqli_error($con));
			mysqli_stmt_bind_param ($query, "s", $new);

			mysqli_stmt_execute($query)
				or die("Error. Could not insert into the table."
                   . mysqli_error($con));

    mysqli_select_db($con,"application_domain");
	$sql = "SELECT ID FROM journalcounter ORDER BY id DESC LIMIT 1";
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData))
    	 $ID= $record['ID'];
         $Active = 1;


	mysqli_select_db($con,"application_domain");
	$sql = "SELECT SUM(`Debit`) As Debit FROM `journaltemp`";
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData))
    	 $Debit= $record['Debit'];


    $sql= "SELECT SUM(`Credit`) As Credit FROM `journaltemp`";
    $myData= mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData))
    	 $Credit= $record['Credit'];

    if (empty($Account) &&  empty($Debit) && empty($Credit))
    {
    echo 'There is no Journal Entry to sumbit, please add a Journal Entry!';
    }
    else
    {

      if($Debit == $Credit)
      {
         $query = mysqli_prepare($con,
                "INSERT INTO `journal_transaction` (`Journal ID`,`Account Name`,`Debit`,`Credit`,`Date`,`Active`) SELECT $ID, `Account`,`Debit`,`Credit`,`Date`,$Active FROM `journaltemp`")
				or die("Error. Could not insert into the table.". mysqli_error($con));

          mysqli_stmt_execute($query)
				or die("Error. Could not insert into the table."
                   . mysqli_error($con));

          $query = mysqli_prepare($con,
				"TRUNCATE TABLE `journaltemp`")
					or die("Error: ". mysqli_error($con));

echo "<div class='alert alert-dange'>
                    <strong> Successful Journal Entry.</strong>
                </div>";


			mysqli_stmt_execute($query)
				or die("Error. Could not insert into the table."
                   . mysqli_error($con));

      }

       else
       {
           echo "<div class='alert alert-dange'>
                    <strong>Your Journal Entry is not balanced. Edit then try again.</strong>
                </div>";
       }

            $stringDescription = "Journal Entry " . $ID ." added";

    $sql2 = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$editedBy','$stringDescription')";

    mysqli_query($con, $sql2);
    }

            }
?>



            <button id="backButton" class="btn btn-primary" onclick="history.go(-1);">Back </button>


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
