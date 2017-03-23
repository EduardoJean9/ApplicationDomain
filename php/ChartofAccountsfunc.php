<?php
//Loads a
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
    $i = 0;
	while($record = mysqli_fetch_array($myData)){
    	echo "<tr>";
    	echo "<td class=\"text-left\">" . $record['Account Code'] . "</td>";
    	echo "<td class=\"text-left\">" . $record['Account Name'] . "</td>";
    	echo "<td class=\"text-left\">" . $record['Account Type'] . "</td>";
    	echo "<td class=\"text-left\">" . $record['Normal Side'] . "</td>";
    	echo "<td class=\"text-left\">" . $record['Initial Balance'] . "</td>";
    	echo "<td class=\"text-left\">";
    	if ($record['Active'] == 0){
            echo "<input type=\"checkbox\" name=\"checkboxList[]\" value=\"0\"/>";
        }
    	else{
            echo "<input type=\"checkbox\" name=\"checkboxList[]\" value=\"1\" checked=\"checked\" />";
        }
    	echo "</td>";
        echo "<td><button type=\"button\" value=" . $record['accountCode'] . "name=\"activateSaveModal\"class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#editModal\" data-whatever=\"@getbootstrap\">Edit</button></td>" .
             "<div class=\"modal fade\" id=\"editModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editModalLabel\" aria-hidden=\"true\">" .
                 "<div class=\"modal-dialog\" role=\"document\">" .
                     "<div class=\"modal-content\">" .
                         "<div class=\"modal-header\">" .
                             "<h3 class=\"modal-title\" id=\"editModalLabel\">Edit an Account</h3>" .
                             "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">" .
                                 "<span aria-hidden=\"true\">&times;</span>" .
                             "</button>" .
                         "</div>" .
                         "<div class=\"modal-body\">" .
                             "<form name=\"editAccountModalForm\" action=\"ChartofAccountsfunc.php\" method=\"POST\" class = \"navbar-center\">" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Name</label>" . 
                                     "</br>" .
                                     "<label>" . $record['Account Name'] . "</label>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Order</label>" .
                                     "</br>" .
                                     "<input id='orderInput' name='orderInput' type='number' value='" . $record['Order'] . "'/>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Is the acccount active?</label></br>" .
                                     "<input class = \"radio-inline\" type = \"radio\" name=\"Active\" value=\"Yes\" />Yes" .
                                     "<input class = \"radio-inline\" type = \"radio\" name=\"Active\" value=\"No\" />No" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Group</label> </br>" .
                                     "<input id='groupText' name='GroupText' type='text' value='" . $record['Group'] . "'/>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Comments</label></br>" .
                                     "<textarea id='commentText' name='CommentText' type='text'>" . $record['Comment'] . "</textarea>" .
                                 "</div>" .
                                 "</br>" .
                                 "<input type=\"submit\" value=\"Save\" class=\"btn btn-primary\" name= \"saveAccountInfo\">" .
                             "</form>" .
                         "</div>" .
                         "<div class=\"modal-footer\">" .
                         "</div>" .
                     "</div>" .
                 "</div>" .
             "</div>";
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

    $checkboxArrayValues;
    // Database Connection
    $con = mysqli_connect($servername,$username,$password);
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    // Changes database values
    // For right now I'm trying to just edit account code 101.
    // Any help would be appreciated.
    if ( isset($checkboxArray) ){
        echo "IM IN HERE!!!";
        echo " ".print_r($checkboxArray);

        $sql  = 'UPDATE `chart_of_accounts` SET `Active` = \'';

        if (isset($checkboxArray) && ($checkboxArray[0] == "1")) {
             $sql .= "1";
            } else {
             $sql .= "0";
            }

        $sql .= '\' WHERE `chart_of_accounts`.`Account Code` = 101';

    }
    // Redirect Page
    //header("refresh:5; url=/ApplicationDomain/ChartOfAccountsBasicPage.php");
}

if ( isset($_POST['activateSaveModal'])){
    $_SESSION['currentlyActiveEdit'] = activateSaveModal;
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

if (isset($_POST['addAccountsButton'])){
    header("refresh:0; url=/ApplicationDomain/addAccountsPage.php");
}

if ( isset($_POST['editButton']) ){
    $_SESSION['accountCode'] = $_POST['editButton'];
    header("refresh:0; url=/ApplicationDomain/EditPage.php");

}



?>
