<?php

function getLedgerLeft(){
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
  $sql = "SELECT * FROM `chart_of_accounts` WHERE `Normal Side` = \"Left\" ";
  $myData = mysqli_query($link,$sql);
	while($record = mysqli_fetch_array($myData)){
    $sql2 = "SELECT SUM(`\". $record['Account Name'] .\"`) FROM `ledger` ";
    while($record2 = mysqli_fetch_array($myData2)){
      echo "<tr>";
      echo "<td>".$record['Account Code']. $record2 ." </td>";
      echo "</tr>";
    }
	}
	mysqli_close($link);
  }
}

function getLedgerRight(){

}

 ?>
