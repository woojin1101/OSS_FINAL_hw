<?php
	include 'connection.php';
	$query = "SELECT * FROM contact";
	$run = $con->query($query);
	$num_list = $run->num_rows;
	$itr = 0;
	class Contact
	{
		var $mail_addr;
		var $t_name;	
	}

	$contacts[] = new stdClass;

	if($run -> num_rows > 0)
	{
		while($row = $run->fetch_array())
		{
			#echo "name: " . $row["name"]. "\temail: " . $row["email"]. "<br>";
			#$contacts[$itr] = new Contact();
			$contacts[$itr]->t_name = $row["name"];
			$contacts[$itr]->mail_addr= $row["email"];
			$itr++; 
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<tilte>Batch E-mail<br></title> 
	<p>Check if you want to send e-mail</p><br>
<body>

<form action ="index.php" method="post">
<?php for($i=0; $i<$itr; $i++){ ?>
<?php echo $contacts[$i]->t_name;?>: <input type="checkbox" name="mail_chk[]" value = "<?php echo $contacts[$i]->mail_addr?>"><br>
write content : <input type="text" name="mail_cnt[]" ><br>

<?php } ?>
<input type="submit">
</form>
<?php
	
	$mail_chk = $_POST["mail_chk"]; #$mail_chk[@]
	$mail_cnt = $_POST["mail_cnt"];

	use PHPMailer\PHPMailer\PHPMailer;
	#use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

    for($i=0; $i<$itr; $i++) {
		echo "send email to ". $mail_chk[$i]."<br>";
		if($mail_chk[$i]!="") 
		{
			echo "content : ". $mail_cnt[$i]."<br>";
		}
	}
	
	
	require 'PHPMailer/PHPMailer/src/Exception.php';
	require 'PHPMailer/PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/PHPMailer/src/SMTP.php';

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth=true;
	$mail->Username = '21500525@handong.ac.kr';
	$mail->Password = 'dldnwls!1101';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->setFrom('21500525@handong.ac.kr', 'WJ Lee');
	
	$mail->isHTML(true);
	$mail->Subject = 'batch email';
	
	
	for($i=0; $i<$itr; $i++)
	{
		if($mail_chk[$i]!= "")
		{
			$mail->addAddress($mail_chk[$i]);
			$bodycontent = $mail_cnt[$i];
			$mail->Body = $bodycontent;
			if(!$mail->send())
		    {
				echo 'mail error: '.$mail->ErrorInfo;
		    }	
		}
    }

?>
<script>
	function all_reset() {
		document.form.reset();
	}
</script>

</body>
</head>
</html>