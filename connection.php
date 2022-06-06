<?php
$host = "localhost";
$user = "admin";
$pass = "1101";
$db_name = "contactdb";
$con = new mysqli($host, $user, $pass, $db_name);

if($con->connect_error) 
{
	die("connection error: " . $con->connect_error);
}
	#echo "connected successfully";
?>

