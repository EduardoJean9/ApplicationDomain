<?php

function getEntries(){

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
  //$sql = "SELECT `Account Code`,`Account Name`,`Normal Side`,SUM(`Debit`-`Credit`) AS \"Total\" FROM `ledger` Group BY `Account Name` Order BY `Normal Side`";
  $sql = "SELECT p2.`Account Code`,p1.`Account Name`,p2.`Normal Side`,SUM(p1.`Debit`-p1.`Credit`) AS \"Total\" FROM `ledger`p1, `possible_accounts`p2 WHERE p1.`Account Name` = p2.`Account Name` Group BY `Account Name` Order BY `Normal Side`";
  $myData =  mysqli_query($link,$sql);
  $firstdeb = 0;
  $firstcred = 0;
  while($record = mysqli_fetch_array($myData)){
    echo "  <tr>";
    echo    "<td>";
    echo $record['Account Name'];
    echo    "</td>";
    echo    "<td>";
    //Nothing goes here as this is the column only for the total.
    echo    "</td>";
    if($record['Normal Side'] == "Left"){
      echo    "<td>";
      if($firstdeb ==0){
        echo "$";
        $firstdeb = $firstdeb +1;
      }
      if($record['Total'] < 0){
        echo "(";
      }
      echo number_format((float)abs($record['Total']), 2, '.', ',');
      if($record['Total'] < 0){
        echo ") ";
      }
      echo    "</td>";
      echo    "<td>";

      echo    "</td>";
    }
    else{
      echo    "<td>";

      echo    "</td>";
      echo    "<td>";
      if($firstcred ==0){
        echo "$";
        $firstcred = $firstcred +1;
      }
      if($record['Total'] < 0){
        echo "(";
      }
      echo number_format((float)abs($record['Total']), 2, '.', ',');
      if($record['Total'] < 0){
        echo ")";
      }
      echo    "</td>";
    }
    echo  "</tr>";
  }

}

function getDebitSum(){
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
  $sql = "SELECT SUM(p1.`Debit`-p1.`Credit`) AS \"Total\", p1.`Account Name`,p2.`Normal Side` FROM `ledger`p1, `possible_accounts`p2 WHERE `Normal Side` = \"Left\" AND p1.`Account Name` = p2.`Account Name` GROUP BY `Normal Side`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  echo number_format((float)abs($record['Total']), 2, '.', ',');


}

function getCreditSum(){
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
  $sql = "SELECT SUM(p1.`Debit`-p1.`Credit`) AS \"Total\", p1.`Account Name`,p2.`Normal Side` FROM `ledger`p1, `possible_accounts`p2 WHERE `Normal Side` = \"Right\" AND p1.`Account Name` = p2.`Account Name` GROUP BY `Normal Side`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  echo number_format((float)abs($record['Total']), 2, '.', ',');
}

 ?>
