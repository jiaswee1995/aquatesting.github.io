<?php
/*
Filename: login.php
Purpose: Login interface.
*/
//Start session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.00 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<style>
.table1{
	margin: auto;
	margin-top: 3cm;
	background-color:#99ccff;
}
body{
	
	background-image: url("image/4.jpg");
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center; 
	background-size: cover;
	background-color: #66c2ff;
	font-weight: bold;
	font-size: 18px;
}
</style>

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<title>User provide login information</title>
</head>

<body style = "font-family: arial, sans-serif;
background-color: lightgreen">
<div align="center" style="margin-top: 5cm;">
	<h2>Click Login to save your session data.</h2>
	<form method = "post" action = "sessionHandler.php"
 		style = "font-size: 10pt">
		<table id="table1">
		<tr>
		<td><strong>Username:</strong></td>
		<td><input type = "text" name = "uname" required></td>
		</tr>
		<tr>
		<td><strong>Password:</strong></td>
		<td><input type = "password" name = "pword" required></td>	
		</tr>
		</table>
		<input type = "submit" value = "Login"
		style = "background-color: #FOE86C; color: navy;
		font-weight: bold" />
		<p>If you do not have an account, <a href="Register.php">register here</a>!</p>
	</form>
</div>
</body>
</html>