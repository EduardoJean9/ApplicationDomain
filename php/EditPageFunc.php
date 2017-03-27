<?php
if(session_status() == false)
    session_start();

$accountCode = 0;

if ( isset($_SESSION['accountCode']) ){
	$accountCode = $_SESSION['accountCode'];
	}

function loadAccount(){
	// Funciton variables
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Connection to database
	$con = mysqli_connect($servername,$username,$password);
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");

	// SQL Statement to retrieve account 
	$sql  = 'SELECT * FROM `chart_of_accounts` WHERE `Account Code` = 101';
	$myData = mysqli_query($con, $sql);

	// Fills the table in EditPage.php
	// The only changable fields are Active, Group and Comments.
	while($record = mysqli_fetch_array($myData)){
    	 echo "<tr>";
    	 echo "<td class=\"text-left\">" . $record['Account Code'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Account Name'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Account Type'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Normal Side'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Initial Balance'] . "</td>";
    	 echo "<td><input id='orderInput' name='orderInput' type='number' value='".$record['Order']."'/></td>";
    	 echo "<td class=\"text-left\">" . $record['Added By'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Added On'] . "</td>";
    	 echo "<td class=\"text-left\">";

    	 if ($record['Active'] == 0){
            echo "<input type=\"checkbox\" name=\"checkboxList[]\" value=\"0\"/>";
         }
    	 else{
            echo "<input type=\"checkbox\" name=\"checkboxList[]\" value=\"1\" checked=\"checked\" />";
         }

    	 echo "</td>";
    	 echo "<td><input id='groupText' name='GroupText' type='text' value='".$record['Group']."'/></td>";
    	 echo "<td>" . $record['Event Log'] . "</td>";
    	 echo "<td>" . $record['Error Code'] . "</td>";
    	 echo "<td><textarea id='commentText' name='CommentText' type='text'>".$record['Comment']."</textarea></td>";
    	 echo "</tr>";
	}

	// Closes the connection to the database
	mysqli_close($con);
}

// Saves updated information to database
if ( isset($_POST['saveAccountInfo']) ){
	// Funciton variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$edditedBy= $_SESSION['logged_in_as'];

	// Connection to database
	$con = mysqli_connect($servername, $username, $password, "application_domain");
	if(!$con){
 	   die("Can not connect: " . mysql_error());
	}
	mysqli_select_db($con,"application_domain");

	//Receive variables from form
	$Order = $_POST['orderInput'];
	$Comment = $_POST['CommentText'];
	$Group = $_POST['GroupText'];

	$sql = "UPDATE `chart_of_accounts` SET `Order` = '$Order', `Comment` = '$Comment', `Group` = '$Group' WHERE `chart_of_accounts`.`Account Code` = 101";

	$stringDescription = "Eddited Account: Cash";

	$sql2 = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$edditedBy','$stringDescription')";

	if(mysqli_query($con, $sql) && mysqli_query($con, $sql2)){
		header( "Refresh: 3; url=/ApplicationDomain/HomePage.php" );
		echo "Account was eddited successfully.";
	} else {
		header( "Refresh: 3; url=/ApplicationDomain/EditPage.php" );
		echo "Account was not successfully eddited.";
	}
}
?>