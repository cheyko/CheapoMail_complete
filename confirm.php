<?php
				include('connecting.php');
				$find = ("SELECT * FROM  user WHERE username = '$uname' AND password_digest = '$digest'");		
			    $search = mysql_query($find);
				$bingo = mysql_fetch_assoc($search);
				$_SESSION['SESS_USERID'] = $bingo['id'];
		        $_SESSION['SESS_UNAME'] = $uname; 
				$_SESSION['SESS_DIGEST'] = $digest;
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>WELCOME PAGE</title>
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen"-->
		<link rel="stylesheet" type="text/css" href="styles/confirm.css"> 
	</head>
	<body>
	<div class="container">
      <div id = "header">
        <h1>WELCOME !!!!!!!!!!</h1>
        <p>New User</p>
      </div>
	  
		<div id = "homapage">
		<form name="newuser" action="Homepage.php">
		<fieldset>
	    <label><input type="submit" name="homepage" value="Go to Homepage"/> </label>
		</fieldset>
		</form>
		</div>
		
		<hr>
			<h3>You have officially created a new user to "AJAX" Cheapomail system </h3>
			<h3> Below the horizontal rule are the details of the new user </h3>
			<table class ="table1" > 
			<tr class = "header-row" >
			<th class = "man"> First Name </th>  <th class = "man"> Last Name </th>  <th class = "man"> User Name </th> <th> Digest </th> 
			</tr>
	
			<tr class = "item-row">
			<td> <?= $fname; ?> </td> <td> <?= $lname; ?> </td>  <td> <?= $uname; ?> </td>  <td class = "quan"> <?= $digest; ?></td>  
			
			<!-- write php code to recieve all datafrom form database and print them in order -->
			<td>   -   </td>  <td>     -    </td>  <td>      -      </td> <td class = "quan"> - </td>
			</tr>
			</table>
	
		<hr>

		  <div id = "footer">
		   <p class="text-muted"> AJAX GROUP ..... ("A" for Ariel, "J" for Jalan and "AX" for AleX)  <br> </br>INFO2180 Group Project Copyright &copy; 2016 </p>
		  </div>
    </div>
	</body>
</html>