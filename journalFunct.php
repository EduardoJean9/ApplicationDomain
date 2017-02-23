<?php

function journalFunct(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	
    $today = date("m/d/y");
			
			$fromAccount = $_GET["fromAccount"];
			$toaccount = $_GET["toAccount"];
			$type = $_GET["type"];
			$type1 = $_GET["type1"];
			$amount = $_GET["amount"];
            $amount1 = $_GET["amount1"];

    
	$con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");
	$query = mysqli_prepare($con, 
				"INSERT INTO journal (Date , Account_Name, Type, Amount) VALUES (?, ?, ?, ?")
					or die("Error: ". mysqli_error($conn));
			mysqli_stmt_bind_param ($query, "ssss", $today, $fromAccount, $type, $amount);
			
			mysqli_stmt_execute($query)
				or die("Error. Could not insert into the table." 
                   . mysqli_error($con));
	$query = mysqli_prepare($con, 
			"INSERT INTO journal (Date , Account_Name, Type, Amount) VALUES (?, ?, ?, ?")
					or die("Error: ". mysqli_error($conn));
			mysqli_stmt_bind_param ($query, "ssss", $today, $toAccount, $type1, $amount1);
    
    
			mysqli_stmt_execute($query)
				or die("Error. Could not insert into the table." 
                   . mysqli_error($con));
			
			mysqli_stmt_close($query);
			
	mysqli_close($con);
}

?>