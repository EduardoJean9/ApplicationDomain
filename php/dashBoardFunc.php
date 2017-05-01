<?php

function generatePanel(){
  //generates the tpo of the panel
  echo "<div class = \"panel panel-primary\">
          <div class = \"panel-heading\">
            <h4>Dashboard</h4>
          </div>
          <div class =\"panel-body\">
            <table class = \"table\">";

generateTableHeader("Profitability Ratios");
generateTableHeader("Liquity Ratios");
echo "<tr>
  <td>
  Current Ratio
  </td>
  <td>". calcCurrentRatio() ."

  </td>
</tr>";
generateTableHeader("Leverage Ratios");
generateTableHeader("Activity Ratios");
echo "<tr>
  <td>
  Total Assets Turnover
  </td>
  <td>". calcTotalAssetsTurnover() ."

  </td>
</tr>";



//Generates the bottom of the panel
  echo "            </table>
            </div>
          </div>";
}

function generateTableHeader($content){
    echo "<tr>
            <td colspan=\"2\">";

    echo $content;

    echo    "</td>
          </tr>";



}

function calcCurrentRatio(){
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
  $sql = "SELECT p1.`Account Name`, SUM(p1.`Debit` - p1.`Credit`) as \"Total\", p2.`Group` FROM `ledger`p1, `possible_accounts`p2 WHERE `Group` = \"Current Asset\" AND p1.`Account Name` = p2.`Account Name` GROUP BY `Group`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  $assets = $record['Total'];
  mysqli_close($link);

  $link2 = mysqli_connect($servername,$username,$password);
  if(!$link2){
     die ("Can not connect: " . mysql_error());
  }
  // Establishes connection to database
  mysqli_select_db($link2,"application_domain");
  // SQL statement and query to get all info for just selected account
  $sql = "SELECT p1.`Account Name`, SUM(p1.`Debit` - p1.`Credit`) as \"Total\", p2.`Group` FROM `ledger`p1, `possible_accounts`p2 WHERE `Group` = \"Current Liability\" AND p1.`Account Name` = p2.`Account Name` GROUP BY `Group";
  $myData =  mysqli_query($link2,$sql);
  $record = mysqli_fetch_array($myData);
  $rev = $record['Total'];
  mysqli_close($link2);

  $final = $rev / $assets;
  return number_format((float)$final, 2, '.', ',');
}

function calcTotalAssetsTurnover(){
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
  $sql = "SELECT p1.`Account Name`, SUM(p1.`Debit` - p1.`Credit`) as \"Total\", p2.`Account Type` FROM `ledger`p1, `possible_accounts`p2 WHERE `Account Type` = \"Asset\" AND p1.`Account Name` = p2.`Account Name` GROUP BY `Account Type`";
  $myData =  mysqli_query($link,$sql);
  $record = mysqli_fetch_array($myData);
  $assets = $record['Total'];
  mysqli_close($link);

  $link2 = mysqli_connect($servername,$username,$password);
  if(!$link2){
     die ("Can not connect: " . mysql_error());
  }
  // Establishes connection to database
  mysqli_select_db($link2,"application_domain");
  // SQL statement and query to get all info for just selected account
  $sql = "SELECT p1.`Account Name`, SUM(p1.`Debit` - p1.`Credit`) as \"Total\", p2.`Account Type` FROM `ledger`p1, `possible_accounts`p2 WHERE `Account Type` = \"Revenue\" AND p1.`Account Name` = p2.`Account Name` GROUP BY `Account Type`";
  $myData =  mysqli_query($link2,$sql);
  $record = mysqli_fetch_array($myData);
  $rev = $record['Total'];
  mysqli_close($link2);

  $final = $rev / $assets;
  return number_format((float)$final, 2, '.', ',');
}




 ?>
