   

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

<html>
<style>
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
body{
	
	background-image: url("image/1.jpg");
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center; 
	background-color: #66c2ff;
}
tr{
	font-weight: bold;
	font-size: 18px;
}
trr{
	font-weight: bold;
	font-size: 18px;
}
</style>
<body>
	<ul>
		<li><a class="active" href="ddd.php">Home</a></li>
		<li><a href="Viewevent.php">My Event</a></li>
		<li><a href="#about">About</a></li>
		<li><a id="signLogin" href="login.php">Login</a></li>
		<lli id="greeting"></lli>
	</ul>
	<div align="center" style="text-align:left;">
	<h1>-Objectives-</h1>
	<trr>1. To ease the travelers on finding hotels or restaurants with good rating.</trr><br>
	<trr>2. To give advice according the forecast weather before travelers going to travel.</trr><br>
	<trr>3. To assist travelers to do planning on their travelling.</trr><br>

	<table border="2">
	<h1>-Benefits of this website-</h1>
	<tr><td>Easy to plan for travelling</td>
	<td>Users are able to do planning based on the weather forecast and the hotel recommendations.
	</td>
	</tr>
	<tr><td>Easy to plan for travelling</td>
	<td>Users are able to find a place to eat with a high rating even they are not familiar with that location.
	</td>
	</tr>
	<tr><td>Easy to share travel info with friends</td>
	<td>Users are able to create an event or group in the web application and invite Facebook friends to go for a trip.
	</td>
	</tr>
	</table>
	</div>
</body>
</html>
