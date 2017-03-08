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
    	 echo "</br>";
			 echo "Log ID: " . $record['Event Log ID']. " On: " . $record['Date'] . "By: " . $username . " Description: " . $Description;
	}
	mysqli_close($con);
}




?>
