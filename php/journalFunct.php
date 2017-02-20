<?php

function loadBasicCOA(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	 
	$con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");
	$sql = "SELECT * FROM chart_of_accounts WHERE Account Type = ";
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
    	 echo "<tr>";
    	 echo "<td>" . $record['Journal ID'] . "</td>";
    	 echo "<td>" . $record['Date'] . "</td>";
    	 echo "<td>" . $record['Account Name'] . "</td>";
    	 echo "<td>" . $record['Type'] . "</td>";
    	 echo "<td>" . $record['Amount'] . "</td>";
    	 echo "</tr>";
	}
	mysqli_close($con);
}

?>