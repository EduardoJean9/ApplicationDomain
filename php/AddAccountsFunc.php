<?php
if(session_status() == false){
  session_start();
}

// Fills out the add acount from in ChartOfAccountsBasicPage.php
function getSelectOptions4Insert()
{
  // Local variables
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $link = mysqli_connect($servername, $username, $password,"application_domain");

  // Check connection
  if($link === false){
    die("Error: Could not connect." . mysqli_connect_error());
  } else {

  // SQL statement to get accounts that are not already used in Chart of Accounts
  $sql = "SELECT a.`Account Name`,a.`Account Code` FROM `possible_accounts` a WHERE `Account Name` NOT IN (SELECT `Account Name` FROM `chart_of_Accounts` b)";
  $myData = mysqli_query($link,$sql); // Retreives data from the database

  // Cycles through each row in table 'possible_accounts' and creates an option for the form
  while($record = mysqli_fetch_array($myData)){
      echo "<option value = " . $record['Account Code'] . ">". $record['Account Name'] . "  </option>";
  }

  mysqli_close($link); // Closes the connection
  }
}

function getSelectOptions4Display(){
  // Local variables
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Creates connection
  $con = mysqli_connect($servername,$username,$password);
  if(!$con){ // Checks connection
     die("Can not connect: " . mysql_error());
  }

  mysqli_select_db($con,"application_domain"); // Establishes connection to database

  // Retrieves all account names form 'chart_of_accounts'
  $sql = "SELECT `Account Name` FROM chart_of_accounts WHERE `Account Name`  = `Account Name`";
  $result = mysqli_query($con,$sql); // Data from SQL query

  while ($row = mysqli_fetch_array($result)){ // Fills out options in form
    echo "<option value= '". $row['Account Name'] ."'>" .$row['Account Name'] ."</option>" ;
  }

  mysqli_close($con); // Closes the connection
}


function insertAccount(){
  // Local variables
  $servername = "localhost";
  $username = "root";
  $password = "";
  $accountCode = $_POST['AccountCode']; // Variable from form after submit

  // Create connection to database
  $link = mysqli_connect($servername, $username, $password,"application_domain");

  // Check connection
  if($link === false){
    die("Error: Could not connect." . mysqli_connect_error());
  } else {

    // SQL statement to retrieve account code from 'possible_accounts' that match what was posted from form
    $sql = "SELECT * FROM `possible_accounts` WHERE `Account Code` = '" . $accountCode . "'";
    $myData =  mysqli_query($link, $sql); // Creates query
    $record = mysqli_fetch_array($myData); // Creates array of results from query (1 row)

    // Variables to be used for inserting to 'chart_of_accounts'
    $AccountName = $record['Account Name'];
    // Include account code from from submition '$accountCode'
    $AccountType = $record['Account Type'];
    $NormalSide = $record['Normal Side'];
    $InitialAmount = $_POST['InitialAmount']; // From form
    $Order = $record['Order'];
    $Comment = $_POST['comment']; // From form
    $AddedBy= $_SESSION['logged_in_as'];
    if (isset ($_POST['insertCheckbox']))
      $Active = 1;
    else
      $Active = 0;
    $Group = $record['Group'];

    // SQL statement to insert new account to 'chart_of_accounts'
    $sqlInsert = "INSERT INTO `chart_of_accounts`(`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Active`, `Group`) VALUES ('$accountCode', '$AccountName', '$AccountType', '$NormalSide', '$InitialAmount', '$Order', '$Comment', '$AddedBy', '$Active', '$Group')";

    // String description for event log
    $stringDescription = "Added Account: " . $AccountName;

    // SQL statement to insert into event log
    $sqlELInsert= "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$AddedBy','$stringDescription')";

    if(mysqli_query($link, $sqlInsert) && mysqli_query($link,$sqlELInsert)){
        echo "Account was inserted successfully.";
    } else {
        echo "Account was not successfully added.";
        //Un-comment to view error incase;
        //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)";
    }

    // Close connection
    mysqli_close($link);
  }
}

function getAcccountInfo($accountName){
  // Local variables
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Establishes connection
  $link = mysqli_connect($servername,$username,$password);
  if(!$link){
     die ("Can not connect: " . mysql_error());
  }

  // Establishes connection to database
  mysqli_select_db($link,"application_domain");

  // SQL statement and query to get all info for just selected account
  $sql = "SELECT * FROM chart_of_accounts WHERE `Account Name` = '" . $accountName . "'";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);

  // Retreives data from database and puts them in a table
  echo "<table align=\"center\" class=\"table-fill\">" .
          "<thead>" .
            "<tr>" .
              "<th> </th>" .
              "<th> </th>" .
            "</tr>" .
          "</thead>" .
          "<tbody class=\"tabel-hover\">" .
            "<tr>" .
              "<td class=\"text-left\">Account Name:    </td>" .
              "<td class=\"text-left\">" . $record['Account Name'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Account Code:    </td>" .
              "<td class=\"text-left\">" . $record['Account Code'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Account Type:    </td>" .
              "<td class=\"text-left\">" . $record['Account Type'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Normal Side:    </td>" .
              "<td class=\"text-left\">" . $record['Normal Side'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Initial Amount:    </td>" .
              "<td class=\"text-left\">" . $record['Initial Balance'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Order:    </td>" .
              "<td class=\"text-left\">" . $record['Order'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Comments:    </td>" .
              "<td class=\"text-left\">" . $record['Comment'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Added By:    </td>" .
              "<td class=\"text-left\">" . $record['Added By'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Active:    </td>" .
              "<td class=\"text-left\">";
               if ( $record['Active'] == 1 )
                echo "Yes </td>";
              else
                echo "No </td>";
            echo "<tr>" .
              "<td class=\"text-left\">Group:    </td>" .
              "<td class=\"text-left\">" . $record['Group'] . "</td>" .
            "</tr>" .
            "<tr>" .
              "<td class=\"text-left\">Accessed by:    </td>" .
              "<td class=\"text-left\">" . $_SESSION['logged_in_as'] . "</td>" .
            "</tr>" .
          "</tbody>" .
        "</table>";

  // Creates SQL statement for event log
  $stringDescription = $_SESSION['logged_in_as'] . " accessed acount: " . $record['Account Name'];

  // Inserts event into event log
  $sqlDesc = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('" . $_SESSION['logged_in_as'] . "','$stringDescription')";
  mysqli_query($link, $sqlDesc);
}
?>
