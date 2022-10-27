<?php

if (isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$services=$_POST['services'];
	$company=$_POST['company'];
	$message=$_POST['message'];

	$subject='Contact Test';
	$mailTo='emmamariejeanne@gmail.com';
	$headers= "From: " . $mailFrom;
	$txt='You have received a contact request from '.$name. '\n\n'. $message;

	mail($mailTo,$subject,$txt,$headers);
	header("Location: contact.php?mailsend");
}
    
?>
