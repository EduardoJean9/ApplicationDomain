<?php

function loadEventLog(){
	$servername = "localhost";
	$username = "root";
	$password = "";

	$con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");
	$sql = "SELECT * FROM event_log";
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
    	 echo "<tr>";

			 echo "<td>" . $record['Event Log ID']. "</td>";
			 echo "<td>" . $record['Date'] . "</td>";
			 echo "<td>" . $record['Username'] . "</td>"; 
			 echo "<td>" . $record['Description'] . "<td>";
			 echo "</tr>";
	}
	mysqli_close($con);
}




?>
