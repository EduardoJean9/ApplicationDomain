<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chart of Accounts </title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        html{
            background-color: #337ab7;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

        td, th {
            border: 1px solid black;
            text-align: left;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: white;
        }
        th{
            background: #dddddd;
        }
    </style>

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <a class="navbar-brand" href="index.html">Accounting Software</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="MainSummary.html"></i> Main Summary</a>
                    </li>
                    <li>
                        <a href="ChartofAccounts.html"></i> Chart Of Accounts</a>
                    </li>
                    <li>
                        <a href="BalanceSheets.html"></i> Balance Sheets</a>
                    </li>
                    <li>
                        <a href="RetainedEarnings.html"></i> Retained Earnings</a>
                    </li>
                    <li>
                        <a href="JournalHistory.html"></i> Journal History</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Chart of Accounts
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <!-- Content wilil go here -->
                
                <div class="col-sm-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Current Chart of Accounts</h3>
                            </div>
                            <div class="panel-body">
                               <!-- Table Start -->
          
<table>
 <tr>
    <th>Account Code</th>
    <th>Account Name</th>
    <th>Type</th>
    <th>Normal Side</th>
    <th>Initial Balance</th>
    <th>Order</th>
    <th>Active</th>
    <th>Group</th>
    <th>Added By</th>
    <th>Added On</th>
    <th>Event Log ID</th>
    <th>Error Code ID</th>
    <th>Comment</th>
    <th><!-- Add button will go here --></th>
  </tr>
    <tr>
    <?php 
        include 'coa.php'; 
        printCOAdata();
    ?>
    </tr>
  <tr>
      <form action ="insertData.php" method ="post">
          <td><input type="text" name ="AccountCode" placeholder="101"></td>
    <td>
        <select  name ="AccountName">
            <option value = "cash">Cash</option>
            <option value ="petty cash">Petty Cash</option>
            <option value = "notes receivable">Notes Recievable</option>
            <option value = "accounts receivable">Accounts Receivable</option>
            <option value = "merchandise Inventory">Merchandise Inventory</option>
        </select>
    </td>
    <td>
        <select  name="AccountType">
            <option value = "asset">Asset</option>
            <option value = "liability">Liability</option>
            <option value = "owners equity">Owners Equity</option>
            <option value = "revenue">Revenue</option>
            <option value = "operating expenses">Operating Expense</option>
        </select>
    </td>
    <td>
        <select name="NormalSide">
            <option>Left</option>
            <option>Right</option>
        </select>
    </td>
    <td><input type ="text" placeholder="0.00" name =  "InitialBalance"></td>
    <td><input type = "text" placeholder="1" name ="Order"></td>
    <td>
        <select placeholder="N/A" name="Active">
            <option value = "Yes">Yes</option>
            <option value = "No">No</option>
        </select>      
    </td>
    <td><input  name="Group" placeholder="group"</td>
    <td><input type="text" placeholder="Enter Name Here" name ="AddedBy"</td>
    <td><input type = "text" placeholder="YYYY-MM-DD" name="AddedOn"></td>
    <td><input type = "text" placeholder="111" name ="EventLogId"</td>
    <td><input type = "text" placeholder="222" name="ErrorCodeId"</td>
    <td> <textarea  name="Comments"></textarea></td>
    <td><input type="submit" name="AddBtn" value="Add" /></td>
    </form>
      
  </tr>


</table>
                                <!-- Table End -->
                                <div align="right">

                    <input value = "Refresh" type="submit" class="btn btn-success" name="RefreshBtn">
                    <input value = "Edit" type="submit" class="btn btn-danger" name ="EditBtn">

                            </div>
                        </div>
                    </div>
    
            </div>
                
                
                
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
