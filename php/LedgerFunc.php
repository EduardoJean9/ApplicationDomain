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
  $sql = "SELECT * FROM ledger ORDER BY `ID`";
  $myData =  mysqli_query($link,$sql);
  while($record = mysqli_fetch_array($myData)){
    echo "<tr>";
    echo"  <td>";
      echo $record['Account Code'];
    echo"  </td>";
    echo"  <td>";
      echo $record['Account Name'];
    echo"  </td>";
    echo"  <td>";
      if($record['Debit'] != 0){
        echo $record['Debit'];
      }
    echo"  </td>";
    echo"  <td>";
      if($record['Credit'] != 0){
        echo $record['Credit'];
      }
    echo"  </td>";
    echo"</tr>";
  }
  mysqli_close($link);

}

function sumCredit(){

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
  $sql = "SELECT SUM(`Credit`) AS `CREDIT` FROM ledger";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  echo $record['CREDIT'];

  mysqli_close($link);

}
function sumDebit(){

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
  $sql = "SELECT SUM(`Debit`) AS `DEBIT` FROM ledger";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  echo $record['DEBIT'];

  mysqli_close($link);

}

 ?>
