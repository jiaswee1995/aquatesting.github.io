<?php 
session_start();
$location = $_SESSION['location'];
$date = $_SESSION['date'];
$overnight = $_SESSION['overnight'];
if(isset($_SESSION['STATUS']) && !empty($_SESSION['STATUS']))
{
	$status = $_SESSION['STATUS'];
}
else
{
	$status = false;
}
?>

<script>
var eventdate = "<?php echo $date; ?>";
var overnight = "<?php echo $overnight; ?>";
var venue = "<?php echo $location; ?>";
var status = "<?php echo $status; ?>";
window.onload = function() {
	if (status==true)
	{
		document.getElementById('eventdate').innerHTML = eventdate;
		document.getElementById('overnight').innerHTML = overnight;
		document.getElementById('location').innerHTML = venue;
	}
	else
	{
		
		alert("Please Login to enable Add to Favorite feature!");
		document.getElementById('body1').innerHTML = "<h3>Login First</h3>";
	}
		
}
</script>

<!DOCTYPE html>
<html>
<head>
</head>
<body id="body1">

<h2>Favorite</h2>
<form name="aqua3" action="keyin.php" method="post">
<table>
	<tr>
		<td><p>Event Name: </p></td> 
		<td><input type="text" name="eventname" required></td>
	</tr>
	<tr>
		<td><p>Event Description: </p></td> 
		<td><textarea type="text" rows="9" cols="30" name="eventdesc" required></textarea></td>
	</tr>
	<tr>
		<td><p>Travel to: </p></td>
		<td id="location" name="eventlocation"></td>
	</tr>
	<tr>
		<td><p>Event Date: </p></td>
		<td id="eventdate" name="eventdate"></td>
	</tr>
	<tr>
		<td><p>Overnight: </p></td>
		<td id="overnight" name="overnight"></td>
	</tr>
	<tr>
	<td></td>
	<td><button type="submit" id="submit">Save</button></td>
	</tr>
</table>
</form>
</body>
</html>