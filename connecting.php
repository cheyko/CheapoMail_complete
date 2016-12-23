<?php
	$mysql_hostname = "localhost";

	$mysql_user = "root";

	$mysql_password = "";

	$mysql_database =  "cheapomail";


	//echo phpinfo();

	$database = mysql_connect ($mysql_hostname, $mysql_user, $mysql_password) or die ("Database could not be connected");
	mysql_select_db($mysql_database, $database) or die ("Database is not found");

?>
