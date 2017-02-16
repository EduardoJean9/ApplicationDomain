<?php
   $connection = mysqli_connect("localhost", "root", null, "application_domain")
      or die('Error connecting to MySQL server.');

   $myUsername = $_POST['myUsername'];
   $myPassword = $_POST['myPassword'];

   $sql = "SELECT * FROM `login_info` ";





mysqli_select_db($connection, "application_domain");
$myData = mysqli_query($connection, $sql);

while($record == mysqli_fetch_array($myData))
{
   if ($myUsername == $record['Username'] && $myPassword == $record['Password'])
   {
      echo "Logged in";
   }
   else
      echo "Failed";
}



           /* 
           if($_SERVER["REQUEST_METHOD"] == "POST") {

            
               
               $result = mysqli_query($connection,$sql);
               //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
               //$active = $row['active'];
      
               $count = mysqli_num_rows($result);
      
               // If result matched $myusername and $mypassword, table row must be 1 row
      
               if($count == 1) {
                  session_register("myusername");
                  $_SESSION['login_user'] = $myusername;
         
                  header("location: HomePage.php");
               }else {
                  echo "Your Login Name or Password is invalid";
               }
            }
            */
?>