<?php

function loadJournal(){
	$servername = "localhost";
	$username = "root";
	$password = "";

	$con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");
	$sql = "SELECT Date, Account, Debit, Credit FROM journaltemp";
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
    	 echo "<tr>";
    	 echo "<td class=\"text-left\">" . $record['Date'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record["Account"] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Debit'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Credit'] . "</td>";
    	 echo "</tr>";
	}
	mysqli_close($con);
}

?>