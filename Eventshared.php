<style>
body{
	
	
	
	background-image: url("image/1.jpg");
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center; 
	background-color: #66c2ff;
	
	
	
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

lii {
    float: left;
}

lli {
    float: right;
	color: white;
	text-align: right;
}

lii a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

lii a:hover {
    background-color: #111;
}
</style>
<html>
<head>
<title>My Events</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
	<ul>
		<lii><a class="active" href="ddd.php">Home</a></lii>
		<lii><a href="Viewevent.php">My Event</a></lii>
		<lii><a href="About.php">About</a></lii>
		<lii><a id="signLogin" href="login.php">Login</a></lii>
		<lli id="greeting"></lli>
	</ul><br>
<body id="body1" bgcolor="#FFFFFF" text="#000000">
<ol>
<?php
	session_start();
	// to make a connection with database
  $conn = mysql_connect("localhost","root") or die(mysql_error());

  //to select the targeted databse
  mysql_select_db("wsproject", $conn) or die(mysql_error());
  $eventname = $_GET['eventname'];
$username = $_GET['username'];
	    $query = "SELECT * FROM event WHERE username = '$username' AND eventname = '$eventname'";
		$result = mysql_query($query, $conn);

while($row = mysql_fetch_array($result)) {
$eventname = $row["eventname"];
$eventdesc = $row["eventdesc"];
$eventlocation = $row["eventlocation"];
$eventdate = $row["eventdate"];
$eventovernight = $row["eventovernight"];
$date = $row["date"];
$time = $row["time"];
?>

<li>
Event Name : <?php echo $eventname; ?><br>
Event Description : <?php echo $eventdesc; ?><br>
Event Location : <?php echo $eventlocation; ?><br>
Event Date : <?php echo $eventdate; ?><br>
Overnight : <?php echo $eventovernight; ?><br>
Modified Date/Time : <?php echo "$date / $time"; ?><br>
 </li>
<?php
}
?>
</ol>
</body>
</html>
