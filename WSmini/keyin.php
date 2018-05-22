
<?php
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');
// to make a connection with database
  $conn = mysql_connect("localhost","root") or die(mysql_error());

  //to select the targeted databse
  mysql_select_db("wsproject", $conn) or die(mysql_error());
  
  extract( $_POST );
	$tarikh = date("d-m-Y", time());
	$masa = date("H:i:s", time());
	$username = $_SESSION['SESS_MEMBER_USERNAME'];
	$eventlocation = $_SESSION['location'];
	$eventdate = $_SESSION['date'];
	$overnight = $_SESSION['overnight'];
	
	$query2 = "SELECT * FROM event WHERE eventname = '$eventname'";
	$result = mysql_query($query2, $conn) or die("Could not execute query in registerHandler.php");
	$count = mysql_num_rows($result);
	if($count>0) {
		echo "<script type='text/javascript'> alert('Data already existed, please try another event name.') </script>";
	}
	else {
		$query = "INSERT INTO event VALUES ('','$username','$eventname','$eventdesc','$eventlocation','$eventdate','$overnight','$tarikh','$masa')";
		$result = mysql_query($query, $conn) or die("Could not execute query in registerHandler.php");
		if($result) {
			echo "<script type='text/javascript'> alert('added to favorite'); </script>";
		}
	}
	
?>