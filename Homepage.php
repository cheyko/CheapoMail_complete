<?php
	
	session_start();
	
	if( ( (!isset($_SESSION['SESS_USERID'])) || (trim($_SESSION['SESS_USERID']) == '')) && ( (!isset($_SESSION['SESS_UNAME'])) || (trim($_SESSION['SESS_UNAME']) == '') )) {
		header("location: login.html");
		exit();
	};
	
		require_once('connecting.php');
		$id=$_SESSION['SESS_USERID'];
		$result3 = mysql_query("SELECT * FROM user where id='$id'");
		$result4 = mysql_query("SELECT * FROM message where users_id='$id'");
		$result5 = mysql_query("SELECT * FROM message_read where readers_id='$id'");
		
		while($row3 = mysql_fetch_array($result3))
		{ 
			$fname=$row3['firstname'];
			$lname=$row3['lastname'];
			$uname=$row3['username'];
		}
		//	$allmessages = mysql_num_rows('$result4');
		//	$allmessage_reads = mysql_num_rows('$result5');		
?>

<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="styles/homepage.css"/>
</head>
<body>
	<div id = "header">
		<h1 style = "font-size:60px; font-family:Tahoma;"> Home Page </h1> <a href="logout.php" style="float:right;"><button style="background-color: #4CAF50; border: none; color: white;
    padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block;font-size: 16px;">Log Out</button></a>
		<br></br><br></br>
		<div style = "background-color:white; color:black; width = 100px; height = 50px;">
			<h3>WELCOME BACK &nbsp!!!!!!!!!!</h3>
		</div>
        <div style = "background-color:black; color:white; width = 100px; height = 50px;">
			<h2><?= $uname; ?> </h2>
		</div>
     </div>
	 
	<div id="inbox-outbox" >
		<form name = "email" method = "post" action="messaging.php">
		<fieldset style= "width = 800px;">
			
			<div id="inbox" style="float:left" >
			<h2>Inbox</h2>
				<?php	
				$sql="SELECT body,subject,users_id FROM message where recipients_id=$id";
				$result= mysql_query($sql) or die(mysql_error());
					
					echo '<body bgcolor="skyblue"> <center>';
					echo'<table 	style="border: 5px solid red;">','<tr>','<th style="border:2px solid blue; margin:2px;"> &nbsp&nbsp Received From &nbsp&nbsp </th>','<th style="border:2px solid blue;">&nbsp&nbsp Subject &nbsp&nbsp </th>','<th style="border:2px solid blue;"> &nbsp&nbsp  Message &nbsp&nbsp </th>','</tr>';
				
					while($row3=mysql_fetch_array($result)){	
					$user_id=$row3['users_id'];
					$subject=$row3['subject'];
					$body=$row3['body'];
					
					$sql_again="SELECT username FROM user where id = '$user_id'";
					$result_again = mysql_query($sql_again) or die(mysql_error);
						while($row_again = mysql_fetch_array($result_again))
						{
							$auname = $row_again['username'];
						}
						
					echo '<tr>','<td style="border-right:2px solid black; border-bottom:2px solid black; margin:2px;"> &nbsp&nbsp&nbsp&nbsp'.$auname. '&nbsp&nbsp&nbsp&nbsp</td>','&nbsp&nbsp&nbsp&nbsp <td style="border-right:2px solid black; border-bottom:2px solid black;"> '.$subject.'&nbsp&nbsp&nbsp&nbsp </td>&nbsp&nbsp&nbsp&nbsp ','&nbsp&nbsp&nbsp&nbsp <td style="border-bottom:2px solid black;"> &nbsp&nbsp&nbsp&nbsp '.$body.'&nbsp&nbsp&nbsp&nbsp  </td>','</tr>';
					}
						echo '</table>','<br>';
				?>
			</div>
			
			<br></br>
			
			<div id="outbox" style="clear:both;">
			<h2>Outbox</h2>
				<?php	
				$sql2="SELECT body,subject,recipients_id FROM message where users_id=$id";
				$result2= mysql_query($sql2) or die(mysql_error());
					
					echo '<body bgcolor="skyblue">';
					echo'<table 	style="border: 5px solid red;">','<tr>','<th style="border:2px solid blue;"> &nbsp&nbsp Sent To &nbsp&nbsp </th>','<th style="border:2px solid blue;">&nbsp&nbsp Subject &nbsp&nbsp </th>','<th style="border:2px solid blue;"> &nbsp&nbsp  Message &nbsp&nbsp </th>','</tr>';
				
					while($row33=mysql_fetch_array($result2)){	
					$rec_id2=$row33['recipients_id'];
					$subject2=$row33['subject'];
					$body2=$row33['body'];
					
					$sql_again2="SELECT username FROM user where id = '$rec_id2'";
					$result_again2 = mysql_query($sql_again2) or die(mysql_error);
						while($row_again2 = mysql_fetch_array($result_again2))
						{
							$auname2 = $row_again2['username'];
						}
						
					echo '<tr>','<td style="border-right:2px solid black; border-bottom:2px solid black;"> &nbsp&nbsp&nbsp&nbsp'.$auname2. '&nbsp&nbsp&nbsp&nbsp</td>','&nbsp&nbsp&nbsp&nbsp <td style="border-right:2px solid black; border-bottom:2px solid black;">'.$subject2.'&nbsp&nbsp&nbsp&nbsp </td>&nbsp&nbsp&nbsp&nbsp ','&nbsp&nbsp&nbsp&nbsp <td style="border-bottom:2px solid black;"> &nbsp&nbsp&nbsp&nbsp '.$body2.'&nbsp&nbsp&nbsp&nbsp  </td>','</tr>';
					}
						echo '</table>','<br>';
				?>
			</div>
			
			<div style="clear:both;"></div>
			<div id="compose" name="send"  >
			<h2>Compose New Message</h2>
				
				<label>Enter Username of recipient :&nbsp&nbsp<input type="text" size = "50" name="uname"  placeholder="Must be a cheapomail user, nuh stranger to the ting" required /><br></br> </label>
				<label>Subject :&nbsp&nbsp<input type="text" size = "50" name="subject"  placeholder="Enter Message Subject" required /><br></br> </label>
				<label>Body :&nbsp&nbsp <br><textarea rows = "10" cols="100" type="text" name="body" placeholder="Enter Message"/></textarea><br></br></label>
				<label><input type="submit" value="Submit"></label>
				
			</div>
				
		</fieldset>
		</form>
		
		
		
	</div>
    <div id = "footer">
	<p class="text-muted"> AJAX GROUP ..... ("A" for Ariel, "J" for Jalan and "AX" for AleX)  <br> </br>INFO2180 Group Project Copyright &copy; 2016 </p>
	</div>


</body>
</html>