<?php
/*
  Filename: sessionHandler.php
  Purpose: To handle login information and create a session for that user.
*/
  //Start session
  session_start();

  //Validation error flag
  $errflag = false;

  //Input Validation
  if($_POST['uname'] == ''){
	$errmsg_arr[] = 'Login ID missing';
	$errflag = true;
  }
  if($_POST['pword'] == ''){
	$errmsg_arr[] = 'Password missing';
	$errflag = true;
  }

  //If there are input validations, redirect back to the login form
  if ($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: login.php");
	exit();
  }

  // to make a connection with database
  $conn = mysql_connect("localhost","root") or die(mysql_error());

  //to select the targeted databse
  mysql_select_db("wsproject", $conn) or die(mysql_error());

  // to create a query to be executed in sql
  $katanama = $_POST['uname'];
  $katalaluan = $_POST['pword'];
  $query = "SELECT * FROM profile WHERE username = '$katanama' AND password = '$katalaluan'";

  //to run sql query in database
  $result = mysql_query($query, $conn) or die(mysql_error());

  //Check whether the query was successful or not
  if(isset($result)) {
	if (mysql_num_rows($result) == 1){
	  //Login Successful
	  session_regenerate_id();
	  $member = mysql_fetch_assoc($result);
	  $_SESSION['SESS_MEMBER_ID'] = $member['id']; 
	  $_SESSION['SESS_MEMBER_USERNAME'] = $member['username']; 
	  $_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
	  $_SESSION['SESS_LAST_NAME'] = $member['lastname']; 
	  $_SESSION['STATUS'] = true;
	  session_write_close();
	  echo "<script type='text/javascript'> window.location='ddd.php' </script>";
	  exit();
	   
	}
	else {
	  //Login failed
	  echo "<script type='text/javascript'>alert('Wrong username or password!');</script>";
	  echo "<script type='text/javascript'> window.location='login.php' </script>";
	  exit();
	}
  }
  else {
	die("Query failed");
  }

?>
	
