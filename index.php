<?php 
session_start();
?>

<script>
var status = "<?php echo $_SESSION['STATUS']; ?>";
var username = "<?php echo $_SESSION['SESS_MEMBER_USERNAME'] ?>";
 window.onload = function () 
{
	if (status==true)
	{
		document.getElementById("signLogin").href = "logout.php";
		document.getElementById("signLogin").innerHTML = "Log out";
		document.getElementById("greeting").innerHTML = "hi, "+username+"!";
	}
}
</script>


<!DOCTYPE html>
<title>
HOME PAGE
</title>
<style>
body{
	
	background-image: url("image/1.jpg");
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center; 
	background-color: #66c2ff;
}
.div1{
	background-color:#99ccff;
	margin: auto;
    width: 80%;
    border: 3px solid #73AD21;
    padding: 10px;
	margin-top:3cm;
}

.table1{
	background-color:white;
	
	margin: auto;
    width: 60%;
    padding: 10px;

}
h1{
	font-weight:bold;
	font-size:32px;
	
}
th{
	font-weight:bold;
	font-size:20px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

lli {
    float: right;
	color: white;
	text-align: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
th{
background-color:rgba(0,0,255,0.3);
}
</style>


<html>
<body>
	<ul>
		<li><a class="active" href="ddd.php">Home</a></li>
		<li><a href="Viewevent.php">My Event</a></li>
		<li><a href="About.php">About</a></li>
		<li><a id="signLogin" href="login.php">Login</a></li>
		<lli id="greeting"></lli>
	</ul>
	
	<form name="aqua" action="SearchResult.php" method="post">
	  <div class ="div1">
		<h1>
			<i>WELCOME TO FORESIGHT TRIP ADVISOR</i>
		</h1>
		<table class ="table1", cellpadding="10">
			<tr>
			<div class = "div2">
			<th>LOCATION</th>
			<th>DATE</th>
			<th>OVERNIGHT?</th>
			<th></th>
			</div>
			</tr>
			
			<tr>
			<td><input type ="text" name = "location" required></td>
			<td><input type ="date" name = "date" required>
			<td><input type ="radio" name = "yes/no" value = "yes" required>YES<br>
				<input type ="radio" name = "yes/no" value = "no" required>NO
			</td>
			<td>
				<input type ="submit" value ="SUBMIT">
			</td>
			</tr>
			
		</table>
		
		
	</div>
	</form>
</body>
</html>
