<?php
	include 'connection.php';
	$query = "SELECT * FROM contact";
	$run = $con->query($query);

	if($run -> num_rows > 0)
	{
		while($row = $run->fetch_array()){
			echo "name: " . $row["name"]. "email: " . $row["email"]. "<br>"; 
		}
	}
	
	require_once('PHPMailer/PHPMailerAutoload.php');
?>
<!DOCTYPE html>
<html>
<head>
<body>
<?php

?> 
</body>
</head>
</html>