<!-- ubah.php -->
<!-- Interface of update data. -->

<?php
	session_start();
	// to make a connection with database
  $conn = mysql_connect("localhost","root") or die(mysql_error());

  //to select the targeted databse
  mysql_select_db("wsproject", $conn) or die(mysql_error());

$eventname = $_GET['eventname'];

$query = "SELECT * FROM event WHERE eventname = '$eventname'";
$result = mysql_query($query, $conn) or die ("Could not execute query in ubah.php");
$row = mysql_fetch_array($result, MYSQL_BOTH);

$eventname = $row["eventname"];
$eventdesc = $row["eventdesc"];
$eventlocation = $row["eventlocation"];
$eventdate = $row["eventdate"];
$eventovernight = $row["eventovernight"];
$date = $row["date"];
$time = $row["time"];

@mysql_free_result($result);
?>

<style>
.table1{
	margin: auto;
}
</style>

<script>
window.onload = function() {
	document.getElementById('eventname').value="<?php echo $eventname; ?>";
	document.getElementById('eventdesc').value="<?php echo $eventdesc; ?>";
	document.getElementById('location').innerHTML="<?php echo $eventlocation; ?>";
	document.getElementById('eventdate').value="<?php echo $eventdate; ?>";
	document.getElementById('overnight').value="<?php echo $eventovernight; ?>";
}
</script>
<html>
<head>
<title>Edit Event</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body style = "font-family: arial, sans-serif;
background-color: lightgreen">
<form name="aqua3" action="edit.php" method="post">
<table class="table1">
	<tr>
		<td><p>Event Name: </p></td> 
		<td><input type="text" id="eventname" name="eventname"/></td>
	</tr>
	<tr>
		<td><p>Event Description: </p></td> 
		<td><textarea type="text" rows="9" cols="30" id="eventdesc" name="eventdesc"></textarea></td>
	</tr>
	<tr>
		<td><p>Travel to: </p></td>
		<td id="location" name="eventlocation"></td>
	</tr>
	<tr>
		<td><p>Event Date: </p></td>
		<td><input type ="date" id="eventdate" name="eventdate"></td>
	</tr>
	<tr>
		<td><p>Overnight: </p></td>
		<td><input type="text" id="overnight" name="overnight"/></td>
	</tr>
	<tr>
	<td></td>
	<td><button type="submit" id="submit">Save</button></td>
	<td><a href="Viewevent.php"><button type="button" id="cancel">Cancel</button></a></td>
	</tr>
	<input type ="hidden" name="oldeventname" value="<?php echo $eventname; ?>">
</table>
</form>
</body>
</html>