<?php

function getRevenueEntries(){
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
  $sql = "SELECT `Account Name`, SUM(`Debit`)-SUM(`Credit`) AS \"Total\" FROM `ledger` WHERE `Account Type` = \"Revenue\" GROUP BY `Account Name` Order BY `Order`";
  $myData =  mysqli_query($link,$sql);
  while($record = mysqli_fetch_array($myData)){
  echo "  <tr>";
  echo    "<td>";

  echo    "</td>";
  echo    "<td>";
  echo $record['Account Name'];
  echo    "</td>";
  echo    "<td>";
        if($record['Total'] < 0){
          echo "(";
        }

  echo number_format((float)abs($record['Total']), 2, '.', '');

        if($record['Total'] < 0){
          echo ")";
        }
  echo    "</td>";
  echo    "<td>";

  echo    "</td>";
  echo  "</tr>";
  }
  mysqli_close($link);

}
function sumRevenue(){
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
  $sql = "SELECT SUM(Debit-Credit) as \"Total\" FROM `ledger` WHERE `Account Type` = \"Revenue\" GROUP BY `Account Type`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  return $record['Total'];
  mysqli_close($link);
}
function printSumRevenue(){
  $exp = sumRevenue();
  if($exp<0){
    echo "( ";
  }
  echo number_format((float)abs($exp), 2, '.', '');
  if($exp<0){
    echo " )";
  }
}

function getExpenseEntries(){
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
  $sql = "SELECT `Account Name`, SUM(`Debit`)-SUM(`Credit`) AS \"Total\" FROM `ledger` WHERE `Account Type` = \"Operating Expenses\" GROUP BY `Account Name` Order BY `Order`";
  $myData =  mysqli_query($link,$sql);
  while($record = mysqli_fetch_array($myData)){
  echo "  <tr>";
  echo    "<td>";

  echo    "</td>";
  echo    "<td>";
  echo $record['Account Name'];
  echo    "</td>";
  echo    "<td>";
        if($record['Total'] < 0){
          echo "(";
        }

  echo number_format((float)abs($record['Total']), 2, '.', '');

        if($record['Total'] < 0){
          echo ")";
        }
  echo    "</td>";
  echo    "<td>";

  echo    "</td>";
  echo  "</tr>";
  }
  mysqli_close($link);
}

function sumExpenses(){
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
  $sql = "SELECT SUM(Debit-Credit) as \"Total\" FROM `ledger` WHERE `Account Type` = \"Operating Expenses\" GROUP BY `Account Type`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  return $record['Total'];
  mysqli_close($link);
}
function printSumExpenses(){
  $exp = sumExpenses();
  if($exp<0){
    echo "( ";
  }
  echo number_format((float)abs($exp), 2, '.', '');
  if($exp<0){
    echo " )";
  }
}

function calcTotalIncome(){
  $revs = sumRevenue();
  $exps = sumExpenses();
  $total = $revs - $exps;
  return $total;
}

function printTotalIncome(){
  $total= calcTotalIncome();
  if($total<0){
    echo "( $ ";
  }
  echo number_format((float)abs($total), 2, '.', '');
  if($total<0){
    echo " )";
  }
}

 ?>
