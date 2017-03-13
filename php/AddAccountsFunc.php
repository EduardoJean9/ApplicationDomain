<?php

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
  $sql = "SELECT a.`Account Name` FROM `possible_accounts` a WHERE `Account Name` NOT IN (SELECT `Account Name` FROM `chart_of_Accounts` b)";

  $myData = mysqli_query($link,$sql);
	while($record = mysqli_fetch_array($myData)){
      echo "<option value = " . $record['Account Name'] . ">". $record['Account Name'] . "  </option>";

	}
	mysqli_close($con);
  }




}

function insertAccount(){



}

?>
