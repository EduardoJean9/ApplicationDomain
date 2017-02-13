<?php

function printCOAdata(){
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_close($conn);  
$con = mysqli_connect("localhost","root","");
if(!$con){
    die("Can not connect: " . mysql_error());
}
mysqli_select_db($con,"Chart_of_Accounts");
$sql = "SELECT * FROM CoAAccounts";
$myData = mysqli_query($con,$sql);
while($record = mysqli_fetch_array($myData)){
     echo "<tr>";
     echo "<td>" . $record['Account Code'] . "</td>";
     echo "<td>" . $record['Account Name'] . "</td>";
     echo "<td>" . $record['Account Type'] . "</td>";
     echo "<td>" . $record['Normal Side'] . "</td>";
     echo "<td>" . $record['Initial Balance'] . "</td>";
     echo "<td>" . $record['Order1'] . "</td>";
     echo "<td>" . $record['Active'] . "</td>";
     echo "<td>" . $record['Group1'] . "</td>";
     echo "<td>" . $record['Added By'] . "</td>";
     echo "<td>" . $record['Added On'] . "</td>";
     echo "<td>" . $record['Event Log Id'] . "</td>";
     echo "<td>" . $record['Error Code Id'] . "</td>";
     echo "<td>" . $record['Comment'] . "</td>";
     echo "</tr>";
}
mysqli_close($con);
}

?>

