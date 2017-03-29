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
	while($record = mysqli_fetch_array($myData)){

    	echo "<tr>";
    	echo "<td class=\"text-left\">" . $record['Account Code'] . "</td>";
    	echo "<td class=\"text-left\">" . $record['Account Name'] . "</td>";
    	echo "<td class=\"text-left\">" . $record['Account Type'] . "</td>";
    	echo "<td class=\"text-left\">" . $record['Normal Side'] . "</td>";
    	echo "<td class=\"text-left\">" . $record['Initial Balance'] . "</td>";
    	echo "<td class=\"text-left\">";
    	if ($record['Active'] == 0){
            echo "<input type=\"checkbox\" name=\"checkboxActiveList[]\" value=\"" . $record['Account Name'] . "\"/>";
        }
    	else{
            echo "<input type=\"checkbox\" name=\"checkboxActiveList[]\" value=\"" . $record['Account Name'] . "\" checked=\"checked\"/>";
        }
    	echo "</td>";
        echo "<td><button type=\"button\" name=\"activateSaveModal\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#editModal" . $record['Account Code'] . "\" data-whatever=\"@getbootstrap\">Edit</button></td>" .
             "<div class=\"modal fade\" id=\"editModal" . $record['Account Code'] . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editModalLabel\" aria-hidden=\"true\">" .
                 "<div class=\"modal-dialog\" role=\"document\">" .
                     "<div class=\"modal-content\">" .
                         "<div class=\"modal-header\">" .
                             "<h3 class=\"modal-title\" id=\"editModalLabel\">Edit an Account</h3>" .
                             "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">" .
                                 "<span aria-hidden=\"true\">&times;</span>" .
                             "</button>" .
                         "</div>" .
                         "<div class=\"modal-body\">" .
                             "<form name=\"editAccountModalForm\" action=\"php/ChartofAccountsfunc.php\" method=\"POST\" class=\"navbar-center\">" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Name</label>" .
                                     "</br>" .
                                     "<label>" . $record['Account Name'] . "</label>" .
                                     "<input type=\"hidden\" name=\"AccountCode\" value=\"" . $record['Account Code'] . "\"/>" .
                                     "<input type=\"hidden\" name=\"AccountName\" value=\"" . $record['Account Name'] . "\"/>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Order</label>" .
                                     "</br>" .
                                     "<input id='orderInput' name='orderInput' type='number' value='" . $record['Order'] . "'/>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Is the acccount active?</label></br>";
                                     if ($record['Active'] == 0){
                                        echo "<input type=\"checkbox\" name=\"modalCheckbox\" value=\"0\"/>";
                                     } else {
                                        echo "<input type=\"checkbox\" name=\"modalCheckbox\" value=\"1\" checked=\"checked\"/>";
                                     }
                                echo "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Group</label> </br>" .
                                     "<input id='groupText' name='GroupText' type='text' value='" . $record['Group'] . "'/>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Comments</label></br>" .
                                     "<textarea id='commentText' name='CommentText' type='text'>" . $record['Comment'] . "</textarea>" .
                                 "</div>" .
                                 "</br>" .
                                 "<input type=\"submit\" value=\"Save\" class=\"btn btn-primary\" id=\"updateAccountInfo\" name=\"updateAccountInfo\">" .
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
        echo "<td class=\"text-left\">";
    	if ($record['Active'] == 0){
            echo "<input type=\"checkbox\" name=\"checkboxActiveList[]\" value=\"" . $record['Account Name'] . "\"/>";
        }
        else{
            echo "<input type=\"checkbox\" name=\"checkboxActiveList[]\" value=\"" . $record['Account Name'] . "\" checked=\"checked\"/>";
        }
        echo "</td>";
    	echo "<td>" . $record['Group'] . "</td>";
    	echo "<td>" . $record['Comment'] . "</td>";
        echo "<td><button type=\"button\" name=\"activateSaveModal\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#editModal" . $record['Account Code'] . "\" data-whatever=\"@getbootstrap\">Edit</button></td>" .
             "<div class=\"modal fade\" id=\"editModal" . $record['Account Code'] . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editModalLabel\" aria-hidden=\"true\">" .
                 "<div class=\"modal-dialog\" role=\"document\">" .
                     "<div class=\"modal-content\">" .
                         "<div class=\"modal-header\">" .
                             "<h3 class=\"modal-title\" id=\"editModalLabel\">Edit an Account</h3>" .
                             "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">" .
                                 "<span aria-hidden=\"true\">&times;</span>" .
                             "</button>" .
                         "</div>" .
                         "<div class=\"modal-body\">" .
                             "<form name=\"editAccountModalForm\" action=\"php/ChartofAccountsfunc.php\" method=\"POST\" class=\"navbar-center\">" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Name</label>" .
                                     "</br>" .
                                     "<label>" . $record['Account Name'] . "</label>" .
                                     "<input type=\"hidden\" name=\"AccountCode\" value=\"" . $record['Account Code'] . "\"/>" .
                                     "<input type=\"hidden\" name=\"AccountName\" value=\"" . $record['Account Name'] . "\"/>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Order</label>" .
                                     "</br>" .
                                     "<input id='orderInput' name='orderInput' type='number' value='" . $record['Order'] . "'/>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Is the acccount active?</label></br>";
                                     if ($record['Active'] == 0){
                                        echo "<input type=\"checkbox\" name=\"modalCheckbox\" value=\"0\"/>";
                                     } else {
                                        echo "<input type=\"checkbox\" name=\"modalCheckbox\" value=\"1\" checked=\"checked\"/>";
                                     }
                                echo "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Group</label> </br>" .
                                     "<input id='groupText' name='GroupText' type='text' value='" . $record['Group'] . "'/>" .
                                 "</div>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Account Comments</label></br>" .
                                     "<textarea id='commentText' name='CommentText' type='text'>" . $record['Comment'] . "</textarea>" .
                                 "</div>" .
                                 "</br>" .
                                 "<input type=\"submit\" value=\"Save\" class=\"btn btn-primary\" id=\"updateAccountInfo\" name=\"updateAccountInfo\">" .
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

if (isset($_POST['saveButton'])){
    // Function variables
	$servername = "localhost";
    $username = "root";
    $password = "";
    $edditedBy = $_SESSION['logged_in_as'];
    $pageName = $_POST['pageName'];

    // Database Connection
    $con = mysqli_connect($servername,$username,$password);
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    // Gather data before changes
    $sqlTest = "SELECT `Account Name` FROM `chart_of_accounts` WHERE `Active` = '1'";
    $dataTest = mysqli_query($con, $sqlTest);


    //Case 1: Where all accounts are deactivated
    if ( (!isset($_POST['checkboxActiveList']) && (!empty($recordBefore = mysqli_fetch_array($dataTest)))) ){

        $sqlBefore  = "SELECT `Account Name` FROM `chart_of_accounts` WHERE `Active` = '1'";
        $dataBefore = mysqli_query($con, $sqlBefore);

        while ($record = mysqli_fetch_array($dataBefore, MYSQLI_ASSOC)){
            $stringDescription = "Eddited Account: " . $record['Account Name'] . " is now deactive.";
            $sqlDesc = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$edditedBy','$stringDescription')";
            mysqli_query($con, $sqlDesc);
        }

        $sql1  = "UPDATE `chart_of_accounts` SET `Active` = '0' WHERE `chart_of_accounts`.`Active` = '1'";
        mysqli_query($con, $sql1);

        header("refresh:0; url=/ApplicationDomain/" . $pageName);

    } else if ( (isset($_POST['checkboxActiveList']) && (!empty($recordBefore = mysqli_fetch_array($dataTest)))) ) { //Case 2: Where some are active and some are not


        $sqlBefore  = "SELECT * FROM `chart_of_accounts`";
        $dataBefore = mysqli_query($con, $sqlBefore);

        while ($record = mysqli_fetch_array($dataBefore, MYSQLI_ASSOC)){
            // Subcase 1: Account was deactive before now is active
            if ( ($record['Active'] == 0) && (in_array($record['Account Name'], $_POST['checkboxActiveList'])) ){
                $stringDescription = "Eddited Account: " . $record['Account Name'] . " is now active.";
                $sqlDesc = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$edditedBy','$stringDescription')";
                mysqli_query($con, $sqlDesc);

                $sqlChange = "UPDATE `chart_of_accounts` SET `Active` = '1' WHERE `chart_of_accounts`.`Account Name` = '" . $record['Account Name'] . "'";
                mysqli_query($con, $sqlChange);
            } else if ( ($record['Active'] == 1) && (!in_array($record['Account Name'], $_POST['checkboxActiveList'])) ){ //Subcase 2: Account was active before now is deactive
                $stringDescription = "Eddited Account: " . $record['Account Name'] . " is now deactive.";
                $sqlDesc = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$edditedBy','$stringDescription')";
                mysqli_query($con, $sqlDesc);

                $sqlChange = "UPDATE `chart_of_accounts` SET `Active` = '0' WHERE `chart_of_accounts`.`Account Name` = '" . $record['Account Name'] . "'";
                mysqli_query($con, $sqlChange);
            }
        }

        header("refresh:0; url=/ApplicationDomain/" . $pageName);

    } else if ( (isset($_POST['checkboxActiveList']) && (empty($recordBefore = mysqli_fetch_array($dataTest)))) ) { //Case 3: Where acounts are active when none were acive before
        for ($i = 0; $i < sizeof($_POST['checkboxActiveList']); $i++){

            $stringDescription = "Eddited Account: " . $_POST['checkboxActiveList'][$i] . " is now active.";
            $sqlDesc = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$edditedBy','$stringDescription')";
            mysqli_query($con, $sqlDesc);

            $sqlChange = "UPDATE `chart_of_accounts` SET `Active` = '1' WHERE `chart_of_accounts`.`Account Name` = '" . $_POST['checkboxActiveList'][$i] . "'";
            mysqli_query($con, $sqlChange);
        }

        header("refresh:0; url=/ApplicationDomain/" . $pageName);
    }
}

// Saves updated information to database using modal
if ( isset($_POST['updateAccountInfo']) ){
    // Funciton variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $edditedBy = $_SESSION['logged_in_as'];

    // Connection to database
    $con = mysqli_connect($servername, $username, $password, "application_domain");
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    //Receive variables from form
    $AccountName = $_POST['AccountName'];
    $AccountCode = $_POST['AccountCode'];
    $Order = $_POST['orderInput'];
    $Comment = $_POST['CommentText'];
    $Group = $_POST['GroupText'];
    $Active = 0;
    if ( isset($_POST['modalCheckbox']) )
        $Active = 1;

    $sql = "UPDATE `chart_of_accounts` SET `Order` = '$Order', `Comment` = '$Comment', `Group` = '$Group', `Active` = '$Active' WHERE `chart_of_accounts`.`Account Code` = '$AccountCode'";

    $stringDescription = "Eddited Account: $AccountName";

    $sql2 = "INSERT INTO `event_log`(`Username`, `Description`) VALUES ('$edditedBy','$stringDescription')";

    if(mysqli_query($con, $sql) && mysqli_query($con, $sql2)){
        header( "Refresh: .5; url=/ApplicationDomain/ChartOfAccountsBasicPage.php" );
        echo "Account was eddited successfully.";
    } else {
        header( "Refresh: .5; url=/ApplicationDomain/ChartOfAccountsBasicPage.php" );
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
