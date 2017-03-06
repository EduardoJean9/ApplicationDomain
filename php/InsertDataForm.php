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
  $link = mysqli_connect($servername, $username, $password,"application_domain");
  // Check connection
  if($link ===false){
    die("Error: Could not connect." . mysqli_connect_error());
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

  $sql = "INSERT INTO `chart_of_accounts`(`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Active`, `Group`, `Event Log`, `Error Code`)VALUES('$AccountCode', '$AccountName', '$AccountType', '$NormalSide', '$InitialAmount', '$Order', '$Comment', '$AddedBy', '$Active', '$Group', '$EventLog', '$ErrorCode')";

  $stringDescription = "Added Account: " . $AccountName;

  $sql2 = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$AddedBy','$stringDescription')";

  if(mysqli_query($link, $sql) && mysqli_query($link,$sql2)){
      header( "Refresh: 1.5; url=/ApplicationDomain/ChartofAccountsBasicPage.php" );
      echo "Records inserted successfully.";
  } else{
      header( "Refresh: 1.5; url=/ApplicationDomain/AddAccountsPage.php" );
      echo "Account was not successfully added.";
      //Un-comment to view error incase;
      //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
  // Close connection
  mysqli_close($link);
?>
