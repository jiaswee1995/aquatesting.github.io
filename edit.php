<!--kemaskini.php-->
<!--To update data of ubah.php into database.-->
<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
	session_start();
	// to make a connection with database
  $conn = mysql_connect("localhost","root") or die(mysql_error());

  //to select the targeted databse
  mysql_select_db("wsproject", $conn) or die(mysql_error());

extract ($_POST);

//Dapatkan Tarikh Dan Masa Masuk
$tarikh = date("d-m-Y", time());
$masa = date("H:i:s", time());
$username = $_SESSION['SESS_MEMBER_USERNAME'];
$query = "UPDATE event SET eventname='$eventname', eventdesc='$eventdesc', eventdate = '$eventdate', eventovernight = '$overnight', date='$tarikh', time='$masa' WHERE username='$username' AND eventname='$oldeventname'";

$result = mysql_query($query, $conn) or die("Could not execute query in edit.php");
if($result){
 echo "<script type = 'text/javascript'> window.location='Viewevent.php' </script>";
}
?>