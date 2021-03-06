<?php

function loadLedgerAccountInfo($chosen){

            echo "     <h2>Ledger: ".$chosen."</h2>";
            echo "      <h4>Black Bird Acccounting</h4>
                  <h4>";
                  getCurrentDate();
            echo"      </h4>
                  <table class = \"table-fill\">
                    <thead>
                      <tr>
                        <th>Account Number</th>
                        <th>Account Name</th>
                        <th>Debit</th>
                        <th>Credit</th>
                      </tr>
                    </thead>
                    <tbody class = \"table-hover\">";
                    getEntries($chosen);
            echo"          <tr>
                        <td>
                        </td>
                        <td>
                        Total:
                      </td>
                        <td>
                          <span class = \"doubleUnderline\">
                            $";
                            sumDebit($chosen);
            echo"              </span>
                        </td>
                        <td>
                          <span class = \"doubleUnderline\">
                            $";
                        sumCredit($chosen);
            echo "            </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>";
            echo "<h2>Total Account: </h2>";
            echo "<h2>". getAccountTotal($chosen) ."</h2>";
}


function getEntries($chosen){
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
  if($chosen == "All"){
    $sql = "SElECT p2.`Account Code`, p1.`Account Name`,p1.`Debit`,p1.`Credit` FROM `ledger` p1, `possible_accounts` p2 WHERE p1.`Account Name` = p2.`Account Name`";

  }
  else{
    $sql = "SElECT p2.`Account Code`, p1.`Account Name`,p1.`Debit`,p1.`Credit` FROM `ledger` p1, `possible_accounts` p2 WHERE p1.`Account Name` = p2.`Account Name` AND p1.`Account Name` =\"". $chosen."\"";

  }
  $firstdeb = 0;
  $firstcred = 0;
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
        if($firstdeb==0){
          echo "$";
        }
        echo number_format((float)abs($record['Debit']), 2, '.', ',');
        $firstdeb = $firstdeb + 1;
      }
    echo"  </td>";
    echo"  <td>";
      if($record['Credit'] != 0){
        if($firstcred ==0){
          echo "$";
        }
        echo number_format((float)abs($record['Credit']), 2, '.', ',');
        $firstcred = $firstcred + 1;
      }
    echo"  </td>";
    echo"</tr>";
  }
  mysqli_close($link);

}

function sumCredit($chosen){

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
  if($chosen == "All"){
      $sql = "SELECT SUM(`Credit`) AS `CREDIT` FROM ledger";
  }
  else{
      $sql = "SELECT SUM(`Credit`) AS `CREDIT` FROM ledger WHERE `Account Name` =\"". $chosen."\"";
  }


  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  echo number_format((float)abs($record['CREDIT']), 2, '.', ',');

  mysqli_close($link);

}
function sumDebit($chosen){

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
  if($chosen == "All"){
      $sql = "SELECT SUM(`Debit`) AS `DEBIT` FROM ledger";
  }
  else{
      $sql = "SELECT SUM(`Debit`) AS `DEBIT` FROM ledger WHERE `Account Name` =\"". $chosen."\"";
  }

  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  echo number_format((float)abs($record['DEBIT']), 2, '.', ',');

  mysqli_close($link);

}
function getAccountTotal($chosen){
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
    if($chosen == "All"){
        $sql = "SELECT SUM(`Debit`) AS `DEBIT` FROM ledger";
        $sql2 = "SELECT SUM(`Credit`) AS `CREDIT` FROM ledger";
    }
    else{
        $sql = "SELECT SUM(`Debit`) AS `DEBIT` FROM ledger WHERE `Account Name` =\"". $chosen."\"";
        $sql2 = "SELECT SUM(`Credit`) AS `CREDIT` FROM ledger WHERE `Account Name` =\"". $chosen."\"";
    }
    $myData =  mysqli_query($link,$sql);
    $myData2 = mysqli_query($link,$sql2);
    $record = mysqli_fetch_array($myData);
    $totaldebit = $record['DEBIT'];
    $record2 = mysqli_fetch_array($myData2);
    $totalcredit = $record2['CREDIT'];
    $finaltotal = $totaldebit - $totalcredit;
    echo number_format((float)$finaltotal, 2, '.', ',');
}

 ?>
