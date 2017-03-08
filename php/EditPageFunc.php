<?php
if(session_status() == false)
    session_start();

$accountCode = 0;

if ( isset($_SESSION['accountCode']) ){
$accountCode = $_SESSION['accountCode'];}

function loadAccount (){
	echo "<tr>";
    	 echo "<td>" . $accountCode . "</td>";
    	 echo "</tr>";
}
?>