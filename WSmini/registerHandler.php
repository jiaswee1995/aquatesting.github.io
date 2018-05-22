<?php
// to make a connection with database
  $conn = mysql_connect("localhost","root") or die(mysql_error());

  //to select the targeted databse
  mysql_select_db("wsproject", $conn) or die(mysql_error());
  
  extract( $_POST );
	$tarikh = date("d-m-Y", time());
	$masa = date("H:i:s", time());
	
	$query2 = "SELECT * FROM profile WHERE username = '$uname' OR email = '$email'";
	$result = mysql_query($query2, $conn) or die("Could not execute query in registerHandler.php");
	$count = mysql_num_rows($result);
	if($count>0) {
		echo "<script type='text/javascript'> alert('Data already existed, please try another username or email.') </script>";
		echo "<script type='text/javascript'> window.location='Register.php' </script>";
	}
	else {
		$query = "INSERT INTO profile VALUES ('','$uname','$pword','$email','$firstname','$lastname','$tarikh','$masa')";
		$result = mysql_query($query, $conn) or die("Could not execute query in registerHandler.php");
		if($result) {
		   echo "<script type='text/javascript'> window.location='login.php' </script>";
		}
	}
	
?>