<?php
  if(session_status() == true){
    //Do nothing
  }
  else{
    session_start();
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  // Create connection
  $conn = new mysqli($servername, $username, $password);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //Receive variables from form
  $AccountCode = $_POST['AccountCode'];
  $AccountName = $_POST['AccountName'];
  $AccountType = $_POST['AccountType'];
  $NormalSide = $_POST['NormalSide'];
  $InitialAmount = $_POST['InitialAmount'];
  $Order = $_POST['Order'];
  $Comment = $_POST['Comment'];
  $AddedBy= $_SESSION['logged_in_as'];
  $Active = $_POST['Active'];
  $Group = $_POST['Group'];
  $EventLog = $_POST['EventLog'];
  $ErrorCode = $_POST['ErrorCode'];

  $sql = "INSERT INTO `chart_of_accounts`(`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`,`Active`, `Group`, `Event Log`,`Error Code`) VALUES (190, Patent,Asset, Left, 100.00, 19, No comment, Eduardo jean, Yes,urent Asset, 111, 111)";


/*
  "INSERT INTO `chart_of_accounts`(`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`,`Active`, `Group`, `Event Log`,`Error Code`) VALUES ($AccountCode, $AccountName, $AccountType, $NormalSide, $InitialAmount, $Order, $Comment, $AddedBy, $Active, $Group, $EventLog, $ErrorCode)";
*/
    if (mysqli_query($conn,$sql)){
        echo "Successfully entered.";
    }
    else{
        die('Error: ' . mysql_error());
    }

    /*
    INSERT INTO `chart_of_accounts`(`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Added On`, `Active`, `Group`, `Event Log`, `Error Code`) VALUES (190,"Patetns","asset","left",100.34,19,"Added","Eddy","Yes","current asset",1,2)
    */
?>
