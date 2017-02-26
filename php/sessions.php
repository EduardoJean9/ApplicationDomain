<?php
	if(session_status() == true){
		//Do nothing
	}
	else{
		session_start();
	}
?>
