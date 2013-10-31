<?php

// grab POST variables from Flash
$name = $_POST['fullName'];
$email = $_POST['email'];
$message = $_POST['theMessage'];
$recepient = $_POST['recipient'];

$sender = $name."<".$email.">";
$senderIP = $_SERVER['REMOTE_ADDR'];

$body = "Name: ".$name." \r\n";
$body.= "Message:\r\n".$message."\r\n\r\n\r\n";
$body.= "IP: ".$senderIP." \r\n\r\n";
$body.= "Flash Form provided by http://www.davidraponi.com"; // CHANGE TO YOUR OWN INFO

$headers = "From: ".$sender."\r\n";
$headers.= "Reply-To: ".$sender."\r\n";
$headers.= "X-Mailer: PHP/".phpversion();

$mailSent = mail($recepient, "Flash Form - ".stripslashes($subject), stripslashes($body), $headers);

if($mailSent) 
{
	echo "yes";
}
else
{
	echo "no";
}

?>