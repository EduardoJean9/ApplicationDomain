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
	$sql = "SELECT ID, Date, Account, Debit, Credit FROM journaltemp";
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
        $Debit = number_format($record['Debit'],2);
        $Credit = $record['Credit'];  
        

        if($Credit == 0.00)
        { 
    	 echo "<tr>";
         echo "<td style=\"display:none;\" class=\"text-left\">" . $record['ID'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record['Date'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record["Account"] . "</td>";
    	 echo "<td class=\"text-left\">" . number_format($record['Debit'],2) . "</td>";
    	 echo "<td class=\"text-left\">"   ."</td>";
        }
        else
        {
            
             echo "<tr>";
         echo "<td style=\"display:none;\" class=\"text-left\">" . $record['ID'] . "</td>";
    	 echo "<td class=\"text-right\">" . $record['Date'] . "</td>";
    	 echo "<td class=\"text-right\">" . $record["Account"] . "</td>";
    	 echo "<td class=\"text-right\">" . "</td>";
    	 echo "<td class=\"text-right\">" . number_format($record['Credit'],2) . "</td>";
            
            
        }
    
         echo "<td><button type=\"button\" name=\"activateSaveModal\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#editModal" . $record['ID'] . "\" data-whatever=\"@getbootstrap\">Edit</button></td>" .
             "<div class=\"modal fade\" id=\"editModal" . $record['ID'] . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editModalLabel\" aria-hidden=\"true\">" .
                 "<div class=\"modal-dialog\" role=\"document\">" .
                     "<div class=\"modal-content\">" .
                         "<div class=\"modal-header\">" .
                             "<h3 class=\"modal-title\" id=\"editModalLabel\">Edit an Account</h3>" .
                             "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">" .
                                 "<span aria-hidden=\"true\">&times;</span>" .
                             "</button>" .
                         "</div>" .
                         "<div class=\"modal-body\">" .
                             "<form name=\"editJournal\" action=\"php/journalFunct.php\" method=\"POST\" class=\"navbar-center\">" .
                                "<label>" . $record['Account'] . "</label>" .
                                 "<div class = \"form-group\">" .
                                     "<label>Debit</label> </br>" .
                                     "<input type=\"hidden\" name=\"ID\" value=\"" . $record['ID'] . "\"/>" .
                                     "<input id='groupText' name='Debit' type='text' value='" . $record['Debit'] . "'/>" .
                                 "</div>" .
                               "<div class = \"form-group\">" .
                                     "<label>Credit</label> </br>" .
                                     "<input id='groupText' name='Credit' type='text' value='" . $record['Credit'] . "'/>" .
                                 "</div>" .
                                 "</br>" .
                                 "<input type=\"submit\" value=\"Save\" class=\"btn btn-primary\" id=\"updateJournal\" name=\"updateJournal\">" .
             
                             "</form>" .
                         "</div>" .
                         "<div class=\"modal-footer\">" .
                         "</div>" .
                     "</div>" .
                 "</div>" .
             "</div>";
 echo "<td><form name=\"deleteFunct\" action=\"php/journalFunct.php\" method=\"POST\" class=\"navbar-center\">" .
                                 "<div class = \"form-group\">" .
                                     "<input type=\"hidden\" name=\"ID\" value=\"" . $record['ID'] . "\"/>" .
                                 "</div>" .
                                 "<input type=\"submit\" value=\"Delete\" class=\"btn btn-primary\" id=\"deleteFunct\" name=\"deleteFunct\">" .
             
                             "</form></td>";
    	 echo "</tr>";
        
       
        
	}
    
	mysqli_close($con);
}


if ( isset($_POST['deleteFunct']) ){
    // Funciton variables
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Connection to database
    $con = mysqli_connect($servername, $username, $password, "application_domain");
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    //Receive variables from form
    $ID = $_POST['ID'];
    
    if(isset($_POST["deleteFunct"]) )
                {

    $sql = "DELETE FROM `journaltemp` WHERE `ID` = '$ID'";

   
    if(mysqli_query($con, $sql)){
        header( "Refresh: .5; url=/ApplicationDomain/JournalPage.php" );
        echo "Journal Entry has been deleted successfully.";
    } else {
        header( "Refresh: .5; url=/ApplicationDomain/JournalPage.php" );
        echo "Journal Entry was not deleted successfully.";
    }
}
}
    
    if ( isset($_POST['updateJournal']) ){
    // Funciton variables
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Connection to database
    $con = mysqli_connect($servername, $username, $password, "application_domain");
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    //Receive variables from form
    $Debit = $_POST['Debit'];
    $Credit = $_POST['Credit'];
    $ID = $_POST['ID'];
    
    if(isset($_POST["updateJournal"]) )
                {

    $sql = "UPDATE `journaltemp` SET `Debit` = '$Debit', `Credit` = '$Credit' WHERE `ID` = '$ID'";

   
    if(mysqli_query($con, $sql)){
        header( "Refresh: .5; url=/ApplicationDomain/JournalPage.php" );
        echo "Journal Entry has been updated successfully.";
    } else {
        header( "Refresh: .5; url=/ApplicationDomain/JournalPage.php" );
        echo "Journal Entry was not updated successfully.";
    }
}
        
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
    
    if (empty($Max1) && empty($Min1))
    {
        echo "There no Journal Entries to view!";
    }
    else{            
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
        $sql1 = "SELECT `ID`,`Journal ID`,`Date`, `Account Name`, `Debit`, `Credit`,`Active` FROM `journal_transaction` WHERE `Journal ID` =$x";   
        $myData = mysqli_query($con,$sql1);
            
        $sql2 = "SELECT `Date`, `Journal ID` FROM `journal_transaction` WHERE `Journal ID` =$x";   
        $myData2 = mysqli_query($con,$sql2);
           
         
         echo "<table width=\"75%\">";
         echo "<tr>";
            if($record = mysqli_fetch_array($myData2))
                    {
                        $Date= "Date: " . $record['Date'];
                 echo "<th>" . $Date . "</th>";
                        $JID= "Journal: " . $record['Journal ID'];
                 echo "<th>" . $JID . "</th>";
                    };
         echo  "</tr>";
            
         echo "<table width=\"75%\">";
         echo "<tr>";
         echo  "<th>Account Name</th>";
         echo  "<th></th>";
         echo  "<th></th>";
         echo  "<th></th>";
 
         echo  "</tr>";
                
            while($record = mysqli_fetch_array($myData))
            {
         $Debit = $record['Debit'];
         $Credit = $record['Credit'];  
         

                 if($Credit == 0.00)
        { 
    	 echo "<tr>";
         echo "<td style=\"display:none;\" class=\"text-left\">" . $record['ID'] . "</td>";
    	 echo "<td class=\"text-left\">" . $record["Account Name"] . "</td>";
    	 echo "<td class=\"text-middle\">" . number_format($record['Debit'],2) . "</td>";
    	 echo "<td class=\"text-left\">"   ."</td>";
        }
        else
        {
            
             echo "<tr>";
         echo "<td style=\"display:none;\" class=\"text-left\">" . $record['ID'] . "</td>";
    	 echo "<td class=\"text-right\">" . $record["Account Name"] . "</td>";
    	 echo "<td class=\"text-right\">" . "</td>";
    	 echo "<td class=\"text-left\">" . number_format($record['Credit'],2) . "</td>";
            
            
        }
            
         $Active= $record['Active'];
         $StatusActive = "Approved";
         $StatusDisabled = "Rejected";
         $StatusPending = "Pending";

     
                
                
         $Active= $record['Active'];
         $ID = $record['Journal ID'];    
            }
        
            
          if($Active == 0)
          {
            echo "</tr>";
         echo "<td><form name=\"deleteFunct\" action=\"php/journalFunct.php\" method=\"POST\" class=\"navbar-center\">" .
                                 "<div class = \"form-group\">" .
                                     "<input type=\"hidden\" name=\"ID\" value=\"" . $ID . "\"/>" .
                                 "</div>" .
                                 "<input type=\"submit\" value=\"Rejected\" class=\"btn btn-danger disabled\" name=\"disableEntry\">" .
             
                             "</form></td>"; 
         
          }
            elseif($Active == 2) 
            {
                echo "</tr>";
                 echo "<td><form name=\"deleteFunct\" action=\"php/journalFunct.php\" method=\"POST\" class=\"navbar-center\">" .
                                 "<div class = \"form-group\">" .
                                     "<input type=\"hidden\" name=\"ID\" value=\"" . $ID . "\"/>" .
                                 "</div>" .
                                 "<input type=\"submit\" value=\"Approved\" class=\"btn btn-success disabled\" name=\"enableEntry\">" .
             
                             "</form></td>";
                
            }
            else
            {
                            echo "</tr>";
                   echo "<td><form name=\"deleteFunct\" action=\"php/journalFunct.php\" method=\"POST\" class=\"navbar-center\">" .
                                 "<div class = \"form-group\">" .
                                     "<input type=\"hidden\" name=\"ID\" value=\"" . $ID . "\"/>" .
                                 "</div>" .
                                 "<input type=\"submit\" value=\"Reject Journal Entry\" class=\"btn btn-danger\" id=\"disableEntry\" name=\"disableEntry\">" .
             
                             "</form>";  
         
         echo "<form name=\"deleteFunct\" action=\"php/journalFunct.php\" method=\"POST\" class=\"navbar-center\">" .
                                 "<div class = \"form-group\">" .
                                     "<input type=\"hidden\" name=\"ID\" value=\"" . $ID . "\"/>" .
                                 "</div>" .
                                 "<input type=\"submit\" value=\"Approve Journal Entry\" class=\"btn btn-success\" id=\"enableEntry\" name=\"enableEntry\">" .
             
                             "</form></td>";
            }
         
            
            
            echo "<td><form name=\"uploadDoc\" action=\"upload.php\" method=\"POST\" enctype=\"multipart/form-data\">" .
                                 "<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" />" .
                                 "<input type=\"submit\" value=\"Save\" class=\"btn btn-primary\" id=\"uploadFile\" name=\"uploadFile\">" .
             
                        "</form></td>";
           echo "<td><form action=\"comment.php\" id=\"usrform\" enctype=\"multipart/form-data\">" .
                                 "<textarea rows=\"5\" cols=\"35\" name=\"comment\" form=\"usform\" />" .
                                 "Enter Commnet here... </textarea>";
             
                        "</form></td>";
        
            echo "</table>";
            echo "<hr>";
        } 
           
            
	mysqli_close($con);


}
}
if ( isset($_POST['disableEntry']) ){
    // Funciton variables
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Connection to database
    $con = mysqli_connect($servername, $username, $password, "application_domain");
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    //Receive variables from form
    $ID = $_POST['ID'];
    
    if(isset($_POST["disableEntry"]) )
                {

    $sql = "UPDATE `journal_transaction` SET `Active`=0 WHERE `Journal ID` = '$ID'";

   if(mysqli_query($con, $sql)){
        header( "Refresh: .5; url=/ApplicationDomain/journalView.php" );
        echo "Journal Entry has been updated successfully.";
    } else {
        header( "Refresh: .5; url=/ApplicationDomain/journalView.php" );
        echo "Journal Entry was not updated successfully.";
    }

}
}

if ( isset($_POST['enableEntry']) ){
    // Funciton variables
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Connection to database
    $con = mysqli_connect($servername, $username, $password, "application_domain");
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    //Receive variables from form
    $ID = $_POST['ID'];
    
    if(isset($_POST["enableEntry"]) )
                {

    $sql = "UPDATE `journal_transaction` SET `Active`=2 WHERE `Journal ID` = '$ID'";

   if(mysqli_query($con, $sql)){
        header( "Refresh: .5; url=/ApplicationDomain/journalView.php" );
        echo "Journal Entry has been updated successfully.";
    } else {
        header( "Refresh: .5; url=/ApplicationDomain/journalView.php" );
        echo "Journal Entry was not updated successfully.";
    }

}
}

if ( isset($_POST['uploadFile']) ){
    // Funciton variables
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Connection to database
    $con = mysqli_connect($servername, $username, $password, "application_domain");
    if(!$con){
       die("Can not connect: " . mysql_error());
    }
    mysqli_select_db($con,"application_domain");

    //Receive variables from form
    $ID = $_POST['ID'];
    
    if(isset($_POST["uploadFile"]) )
                {

    $sql = "INSERT INTO `journal_transaction` SET `Active`=2 WHERE `Journal ID` = '$ID'";

   if(mysqli_query($con, $sql)){
        header( "Refresh: .5; url=/ApplicationDomain/journalView.php" );
        echo "Journal Entry has been updated successfully.";
    } else {
        header( "Refresh: .5; url=/ApplicationDomain/journalView.php" );
        echo "Journal Entry was not updated successfully.";
    }

}
}


?>