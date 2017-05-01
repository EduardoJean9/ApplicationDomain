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
  $sql = "SELECT p1.`Account Name`, SUM(p1.`Debit`)-SUM(p1.`Credit`) AS \"Total\" FROM `ledger`p1, `possible_accounts`p2 WHERE p1.`Account Name` = p2.`Account Name` AND p2.`Account Type` = \"Revenue\" GROUP BY `Account Name` Order BY `Order`";
  $myData =  mysqli_query($link,$sql);
  $first = 0;
  while($record = mysqli_fetch_array($myData)){
  echo "  <tr>";
  echo    "<td>";

  echo    "</td>";
  echo    "<td>";
  echo $record['Account Name'];
  echo    "</td>";
  echo    "<td>";
  if($first ==0){
    echo "$";
    $first = $first+1;
  }
        if($record['Total'] < 0){
          echo "(";
        }

  echo number_format((float)abs($record['Total']), 2, '.', ',');

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
  $sql = "SELECT SUM(p1.`Debit`- p1.`Credit`) as \"Total\" FROM `ledger`p1, `possible_accounts`p2 WHERE p1.`Account Name` = p2.`Account Name` AND p2.`Account Type` = \"Revenue\" GROUP BY `Account Type`";
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
  echo number_format((float)abs($exp), 2, '.', ',');
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
  $sql = "SELECT p1.`Account Name`, SUM(p1.`Debit`)-SUM(p1.`Credit`) AS \"Total\" FROM `ledger`p1, `possible_accounts`p2 WHERE p1.`Account Name` = p2.`Account Name` AND p2.`Account Type` = \"Operating Expenses\" GROUP BY `Account Name` Order BY `Order`";
  $myData =  mysqli_query($link,$sql);
  $first = 0;
  while($record = mysqli_fetch_array($myData)){
  echo "  <tr>";
  echo    "<td>";

  echo    "</td>";
  echo    "<td>";

  echo $record['Account Name'];
  echo    "</td>";
  echo    "<td>";
  if($first ==0){
    echo "$";
    $first = $first+1;
  }
        if($record['Total'] < 0){
          echo "(";
        }

  echo number_format((float)abs($record['Total']), 2, '.', ',');

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
  $sql = "SELECT SUM(p1.`Debit`- p1.`Credit`) as \"Total\" FROM `ledger`p1, `possible_accounts`p2 WHERE p1.`Account Name` = p2.`Account Name` AND p2.`Account Type` = \"Operating Expenses\" GROUP BY `Account Type`";
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
  echo number_format((float)abs($exp), 2, '.', ',');
  if($exp<0){
    echo " )";
  }
}

function calcTotalIncome(){
  $revs = sumRevenue();
  $exps = sumExpenses();
  $total = abs($revs) - abs($exps);
  return $total;
}

function printTotalIncome(){
  $total= calcTotalIncome();
  if($total<0){
    echo "$ ( ";
  }
  echo number_format((float)abs($total), 2, '.', ',');
  if($total<0){
    echo " )";
  }
}

 ?>
