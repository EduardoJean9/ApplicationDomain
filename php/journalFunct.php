<?php

function loadJournaltemp(){
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

function loadJournal(){
	$servername = "localhost";
	$username = "root";
	$password = "";

	$con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");
	$max = "SELECT MAX(`Journal ID`) AS `Journal ID` FROM `journal_transaction`";
	$myData = mysqli_query($con,$max);
	while($record = mysqli_fetch_array($myData))
    	 $Max1= $record['Journal ID'];
    
    
    	mysqli_select_db($con,"application_domain");
    $min = "SELECT MIN(`Journal ID`) AS `Journal ID` FROM `journal_transaction`";
	$myData = mysqli_query($con,$min);
	while($record = mysqli_fetch_array($myData))
    	 $Min1= $record['Journal ID'];
    
        
    
        for($x=$Min1;$x<=$Max1;$x++)
        {
            $servername = "localhost";
            $username = "root";
	        $password = "";

	       $con = mysqli_connect($servername,$username,$password);
	       if(!$con){
               die("Can not connect: " . mysql_error());
	                   }
        mysqli_select_db($con,"application_domain");               
        $sql1 = "SELECT `Journal ID`,`Date`, `Account Name`, `Debit`, `Credit` FROM `journal_transaction` WHERE `Journal ID` =$x";   
        $myData = mysqli_query($con,$sql1);
	   
            echo "<table>";
            while($record = mysqli_fetch_array($myData))
            {
    	 echo "<tr>";
         echo "<td class=\"text-left\">" . $record['Journal ID'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Date'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record["Account Name"] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Debit'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Credit'] . "</td>";
    	 echo "</tr>";
            }
            echo "<td>edit</td>";
            echo "<td>delete</td>";
            echo "</table>";
        } 
           
            
	mysqli_close($con);
}

?>