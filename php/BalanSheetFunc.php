<?php

function getBalanEntries($type1){
  $type = $type1;
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
  $sql = "SELECT p1.`Account Name`, SUM(p1.`Debit` - p1.`Credit`) as \"Total\" FROM `ledger`p1, `possible_accounts`p2 WHERE p1.`Account Name` = p2.`Account Name` AND p2.`Account Type` = \"" . $type . "\" Group BY `Account Name`";
  $myData =  mysqli_query($link,$sql);
  while($record = mysqli_fetch_array($myData)){
    echo "<tr>";
    echo "  <td>";

    echo "  </td>";
    echo "  <td>";
    echo $record['Account Name'];
    echo "  </td>";
    echo "  <td>";
    if($record['Total'] < 0){
      echo "(";
    }
    echo number_format((float)abs($record['Total']), 2, '.', ',');
    if($record['Total'] < 0){
      echo ")";
    }
    echo "  </td>";
    echo "</tr>";
  }
}

function sum4Balance($type){
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
  $sql = "SELECT SUM(p1.`Debit`- p1.`Credit`) as \"Total\" FROM `ledger` p1,`possible_accounts` p2 WHERE p1.`Account Name` = p2.`Account Name` AND p2.`Account Type` = \"".$type."\" GROUP BY `Account Type`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  if($record['Total'] < 0){
    echo "(";
  }
  echo number_format((float)abs($record['Total']), 2, '.', ',');
  if($record['Total'] < 0){
    echo ")";
  }
}


 ?>
