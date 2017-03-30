<?php

function loadEventLog(){
	// Local variables
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Establishes connection to database
	$con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");

	// SQL statement to retrieve data
	$sql = "SELECT * FROM event_log";
	$myData = mysqli_query($con,$sql); // Results from SQL query

	// Fills out table on page
	while($record = mysqli_fetch_array($myData)){
    	 echo "<tr>";
			echo "<td>" . $record['Event Log ID']. "</td>";
			echo "<td>" . $record['Date'] . "</td>";
			echo "<td>" . $record['Username'] . "</td>"; 
			echo "<td>" . $record['Description'] . "<td>";
		echo "</tr>";
	}

	// Closes the connection
	mysqli_close($con);
}
?>