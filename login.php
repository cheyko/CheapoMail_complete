<?php
	session_start();
	include('connecting.php');

		$theuname = $thepword = $hideval= $digest = $sql = $results = "";//$newsalt = $newdigest = $newtrack = "";
  

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$theuname = test_input($_POST["username"]);
			$thepword = test_input($_POST["password"]);
			$hideval = test_input($_POST["hide"]);
			$digest = md5($thepword);
			//$track = date("Y/m/d");
			//$thetime = date ("h:i:sa");
			//date_default_timezone_set("America/Jamaica");
			//$track = date("Y-m-d h:i:sa");
			$sql = ("SELECT * FROM  user WHERE username = '$theuname' AND password_digest = '$digest'");		
			$results= mysql_query($sql);
			
		if ($results){
			if(mysql_num_rows($results) > 0){
				session_regenerate_id();
				$one = mysql_fetch_assoc($results);
				$_SESSION['SESS_DIGEST'] = $one['password_digest'];
				$_SESSION['SESS_UNAME'] = $one['username'];
				$_SESSION['SESS_USERID'] = $one['id'];
				session_write_close();
				header("Location: Homepage.php");
				exit();
			}else {
				include_once('login.html');
				die("<br><br>1)Username or password invalid <br>PLease try again or GO BACK ");
				exit();
			}
		}else{
			die("<br><br> 2)Please enter a username and a password. <br>PLease try again or GO BACK (<--");
			header('login.html');	
		}	
			mysql_close($database);
		
	}	
		function test_input($data) {
			if (empty($data)) {
				echo "missing data <br>";
				//include_once 'restart.php';
				//break;
				
			} else {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		}
		
		//function signup(){
			//include_once 'newuser.html';
		//}
?>