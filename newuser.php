<?php
		session_start();
		include ('connecting.php');
		
		// defining the variables and set they were set to empty values
		$fname = $lname = $uname = $pword = $seek = $digest = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$fname = test_input($_POST["firstname"]);
			$lname = test_input($_POST["lastname"]);
			$uname = test_input($_POST["username"]);
			$pword = test_input($_POST["password"]);
			$seek = test_input($_POST["hide"]);
			$digest = md5($pword);	
			
			mysql_query("INSERT INTO user(firstname, lastname, username, password_digest) VALUES ('$fname', '$lname', '$uname', '$digest')");
			
			//last_login, value -> $track
			mysql_close($database);
			
			include_once 'confirm.php';
			
		}
		function test_input($data) {
			if (empty($data)) {
				echo "missing data <br>";
				include_once 'restart.php';
				
			} else {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		}
?> 
