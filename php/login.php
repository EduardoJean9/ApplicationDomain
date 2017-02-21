<?php
<<<<<<< Updated upstream
=======
   session_start()!= false or die('Could not start session');
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
      echo "Successful login";
      header("Refresh: 1 ; Location: /ApplicationDomain/HomePage.php"); 
   } else {
      echo "Failed to login";
      header("Refresh: 1 ; Location: /ApplicationDomain/HomePage.php"); 
=======
      $_SESSIONS['logged_in'] = $Username;
      header("Location: /ApplicationDomain/HomePage.php"); 
   } else {
      $_SESSIONS['logged_in'] = "Incorrect username or password";
      //header("Location: /ApplicationDomain/HomePage.php"); 
>>>>>>> Stashed changes
   }
?>