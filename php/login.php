<?php
// <<<<<<< Updated upstream
//=======
   session_start()!= false or die('Could not start session');
//>>>>>>> Stashed changes

   // Get values passed from form in HomePage.php file
   $Username = $_POST['MyUsername'];
   $Password = $_POST['MyPassword'];
   $message ="";

   // Connection to database
   $connection = mysqli_connect("localhost", "root", null, "application_domain") 
   or die('Error connecting to MySQL server.');

   // To prevent mysql injection
   $Username = stripcslashes($Username);
   $Password = stripcslashes($Password);
   $Username = mysqli_real_escape_string($connection, $Username);
   $Password = mysqli_real_escape_string($connection, $Password);

   $result = mysqli_query($connection, "SELECT * FROM `login_info` WHERE `Username` = '$Username' AND `Password` = '$Password'")
      or die("Failed to query database ".mysqli_error($connection));

   $row = mysqli_fetch_array($result);
   if ($row['Username'] == $Username && $row['Password'] == $Password){
      $_SESSIONS['logged_in_as'] = $Username;
      header( "Refresh: 2; url=/ApplicationDomain/ChartOfAccountsBasicPage.php" );
      echo "Successful login. You'll be redirected in about 2 secs.";
   } else {
      header( "Refresh: 2; url=/ApplicationDomain/HomePage.php");
      echo "Failed to login. You'll be redirected in about 2 secs.";
<<<<<<< Updated upstream
//>>>>>>> Stashed changes
=======

>>>>>>> Stashed changes
   }
?>