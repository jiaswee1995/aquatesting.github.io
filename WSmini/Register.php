<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<title>User provide login information</title>
</head>

<style>
.table1{
	margin: auto;
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

<body style = "font-family: arial, sans-serif;
background-color: lightgreen">
<div align="center" style="margin-top: 5cm;">
<form name="aqua4" method = "post" action = "registerHandler.php" style = "font-size: 10pt">
<table id="table1">
	<h2>Foresight Travel Registration</h2>
		<tr>
		<td><strong>Username:</strong></td>
		<td><input type = "text" name = "uname" required></td>
		</tr>
		<tr>
		<td><strong>Password:</strong></td>
		<td><input type = "password" name = "pword" required></td>
		</tr>
		<tr>
		<td><strong>Email:</strong></td>
		<td><input type = "text" name = "email" required></td>
		</tr>
		<tr>
		<td><strong>First Name:</strong></td>
		<td><input type = "text" name = "firstname" required></td>
		</tr>
		<tr>
		<td><strong>Last Name:</strong></td>
		<td><input type = "text" name = "lastname" required></td>
		</tr>
</table>
<input type = "submit" value = "Register"
		style = "background-color: #FOE86C; color: navy;
		font-weight: bold" >
		<input type = "reset" value = "Reset" >
</form>

</div>
</body>
</html>