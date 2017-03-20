<?php
if(session_status() == true){
  //Do nothing
}
else{
  session_start();
}


function getSelectOptions()
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  // Create connection
  $link = mysqli_connect($servername, $username, $password,"application_domain");
  // Check connection
  if($link ===false){
    die("Error: Could not connect." . mysqli_connect_error());
  }
  else{
  $sql = "SELECT a.`Account Name`,a.`Account Code` FROM `possible_accounts` a WHERE `Account Name` NOT IN (SELECT `Account Name` FROM `chart_of_Accounts` b)";

  $myData = mysqli_query($link,$sql);
	while($record = mysqli_fetch_array($myData)){
      echo "<option value = " . $record['Account Code'] . ">". $record['Account Name'] . "  </option>";

	}
	mysqli_close($link);
  }




}

function insertAccount(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  // Create connection
  $link = mysqli_connect($servername, $username, $password,"application_domain");
  $accountCode= $_POST['AccountCode'];
  // Check connection
  if($link ===false){
    die("Error: Could not connect." . mysqli_connect_error());
  }else{
  $sql = "SELECT * FROM `possible_accounts` WHERE `Account Code` = '" . $accountCode . "'";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  $AccountName = $record['Account Name'];
  //include account code from from
  $AccountType = $record['Account Type'];
  $NormalSide = $record['Normal Side'];
  $InitialAmount = $_POST['InitialAmount'];
  $Order = $record['Order'];
  $Comment = $_POST['comment'];
  $AddedBy= $_SESSION['logged_in_as'];
  $Active = $_POST['Active'];
  $Group = $record['Group'];

  $sqlInsert = "INSERT INTO `chart_of_accounts`(`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Active`, `Group`)VALUES('$accountCode', '$AccountName', '$AccountType', '$NormalSide', '$InitialAmount', '$Order', '$Comment', '$AddedBy', '$Active', '$Group')";

  $stringDescription = "Added Account: " . $AccountName;

  $sqlELInsert= "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$AddedBy','$stringDescription')";

  if(mysqli_query($link, $sqlInsert) && mysqli_query($link,$sqlELInsert)){
      echo "Account was inserted successfully.";
  } else{
      echo "Account was not successfully added.";
      //Un-comment to view error incase;
      //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }


  // Close connection
  mysqli_close($link);
}
}

?>
