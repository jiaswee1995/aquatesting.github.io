<?php
/*
Filename: logout.php
Purpose : To logout from the website and destroy the self identity
*/
//Start session
session_start();

//Unset the variable stored in session
session_destroy();
echo "<script type='text/javascript'> window.location='ddd.php' </script>";
?>