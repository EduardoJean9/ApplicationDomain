<?php
    if(session_status() == false){
      session_start();
    }
   session_destroy();
   session_abort();
   
   echo 'You have cleaned session';
   header('Refresh: 2; url=/ApplicationDomain/HomePage.php');
?>