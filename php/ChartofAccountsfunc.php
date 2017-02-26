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
	$sql = "SELECT * FROM chart_of_accounts";
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
    	 echo "<tr>";
    	 echo "<td class=\"text-left\">" . $record['Account Code'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Account Name'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Account Type'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Normal Side'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Initial Balance'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Active'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Comment'] . "</td>";
    	 echo "</tr>";
	}
	mysqli_close($con);
}

function loadDetailedCOA(){
	$servername = "localhost";
	$username = "root";
	$password = "";

	$con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");
	$sql = "SELECT * FROM chart_of_accounts";
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
    	 echo "<tr>";
    	 echo "<td>" . $record['Account Code'] . "</td>";
    	 echo "<td>" . $record['Account Name'] . "</td>";
    	 echo "<td>" . $record['Account Type'] . "</td>";
    	 echo "<td>" . $record['Normal Side'] . "</td>";
    	 echo "<td>" . $record['Initial Balance'] . "</td>";
    	 echo "<td>" . $record['Order'] . "</td>";
    	 echo "<td>" . $record['Added By'] . "</td>";
    	 echo "<td>" . $record['Added On'] . "</td>";
    	 echo "<td>" . $record['Active'] . "</td>";
    	 echo "<td>" . $record['Group'] . "</td>";
    	 echo "<td>" . $record['Event Log'] . "</td>";
    	 echo "<td>" . $record['Error Code'] . "</td>";
    	 echo "<td>" . $record['Comment'] . "</td>";
    	 echo "</tr>";
	}
	mysqli_close($con);
}


?>
