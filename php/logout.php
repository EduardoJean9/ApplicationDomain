<?php
	if(session_status() == false)
		session_start();

	// Clears the session
	session_destroy();
	session_abort();

	// Sends confirmation
	echo 'You have cleaned session';
	header('Refresh: 1.5; url=/ApplicationDomain/HomePage.php');
?>