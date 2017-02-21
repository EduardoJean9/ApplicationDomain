<?php
	session_start()!= false or die('Could not start session');
	$_SESSIONS['two'] = "123";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="test.php">Click me!</a>
</body>
</html>