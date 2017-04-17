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
  $sql = "SELECT * FROM WHERE 'Account Type' = \"Revenue\" ORDER BY 'Order'";
  $myData =  mysqli_query($link,$sql);
  while($record = mysqli_fetch_array($myData)){
  echo "  <tr>";
  echo    "<td>";

  echo    "</td>";
  echo    "<td>";

  echo    "</td>";
  echo    "<td>";

  echo    "</td>";
  echo    "<td>";

  echo    "</td>";
  echo  "</tr>";
  }
  mysqli_close($link);

}
function sumRevenue(){

}
function getExpenseEntries(){

}
function sumExpenses(){

}


 ?>
