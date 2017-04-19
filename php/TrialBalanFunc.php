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
  $sql = "SELECT `Account Code`,`Account Name`,`Normal Side`,SUM(`Debit`-`Credit`) AS \"Total\" FROM `ledger` Group BY `Account Name` Order BY `Normal Side`";
  $myData =  mysqli_query($link,$sql);
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
      if($record['Total'] < 0){
        echo "( ";
      }
      echo number_format((float)abs($record['Total']), 2, '.', '');
      if($record['Total'] < 0){
        echo " ) ";
      }
      echo    "</td>";
      echo    "<td>";

      echo    "</td>";
    }
    else{
      echo    "<td>";

      echo    "</td>";
      echo    "<td>";
      if($record['Total'] < 0){
        echo "( ";
      }
      echo number_format((float)abs($record['Total']), 2, '.', '');
      if($record['Total'] < 0){
        echo " )";
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
  $sql = "SELECT SUM(`Debit`-`Credit`) AS \"Total\", `Account Name`,`Normal Side` FROM `ledger` WHERE `Normal Side` = \"Left\" GROUP BY `Normal Side`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  echo $record['Total'];


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
  $sql = "SELECT SUM(`Debit`-`Credit`) AS \"Total\", `Account Name`,`Normal Side` FROM `ledger` WHERE `Normal Side` = \"Right\" GROUP BY `Normal Side`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  echo $record['Total'];
}

 ?>
