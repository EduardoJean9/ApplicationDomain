<?php

if(session_status() == false)
    session_start();



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
    	 echo "<td class=\"text-left\">";

    	 if ($record['Active'] == 0)
    	 	echo "<input type=\"checkbox\" name=\"checkboxList[]\" value=\"0\"/>";
    	 else
    	 	echo "<input type=\"checkbox\" name=\"checkboxList[]\" value=\"1\" checked=\"checked\" />";

    	 echo "</td>";
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

if (isset($_POST['saveButton'])){
    // Function variables
	$servername = "localhost";
    $username = "root";
    $password = "";
    $checkboxArray = $_POST['checkboxList'];

    // Database Connection
    $con = mysqli_connect($servername,$username,$password);
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    // Changes database values
    // For right now I'm trying to just edit account code 101.
    // Any help would be appreciated.
    if (!isset($checkboxArray) || isset($checkboxArray)){
        echo "IM IN HERE!!!";

        $sql  = 'UPDATE `chart_of_accounts` SET `Active` = \''.$checkboxArray[0].'\' WHERE `chart_of_accounts`.`Account Code` = 101';

        /*
        foreach($checkboxArray as $item){
            $sql  = 'UPDATE `chart_of_accounts` SET `Active` = \''.$item.'\' WHERE `chart_of_accounts`.`Account Code` = 101';
            mysqli_query($con, $sql);
        }*/
    }

    // Redirect Page
    header("refresh:2; url=/ApplicationDomain/ChartOfAccountsBasicPage.php");
}

if (isset($_POST['addAccountsButton'])){
    header("refresh:0; url=/ApplicationDomain/addAccountsPage.php");
}



?>
