<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    global $conn;
    // Create connection
   $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $accountCode =$_POST['AccountCode'];
    $accountName = $_POST['AccountName'];
    $accountType =$_POST['AccountType'];
    $normalSide=$_POST['NormalSide'];
    $iBalance = $_POST['InitialBalance'];
    $order = $_POST['Order'];
    $active = $_POST['Active'];
    $group = $_POST['Group'];
    $addedby = $_POST['AddedBy'];
    $addedOn =$_POST['AddedOn'];
    $eventLogID=$_POST['EventLogId'];
    $errorCodeID=$_POST['ErrorCodeId'];
    $comment=$_POST['Comments'];
    
    $sql = "INSERT INTO CoAAccounts('Account Code','Account Name','Account Type','Normal Side','Initial Balance','Order1','Comment','Added By','Added On','Active','Group1','Event Log Id','Error Code Id') VALUES ('$accountCode','$accountName','$accountType','$normalSide','$iBalance','$order','$comment','$addedby','$addedOn','$active','$group','$eventLogID','$errorCodeID')";
    echo $sql;
    
    $sql2 ="INSERT INTO CoAAccounts('Account Code','Account Name) VALUES('123','Cash')";
    if (mysqli_query($conn,$sql2)){
        echo "Successfully entered.";
    }
    else{
        die('Error: ' . mysql_error());
    }

?>