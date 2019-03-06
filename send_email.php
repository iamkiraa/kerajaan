<?php

if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	if (|empty($email) && |empty($name) && |empty($subject) && |empty($message)){
	
	
/**
 * This example shows sending a message using PHP's mail() function.
 */
date_default_timezone_set('Etc/UTC');

require './PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
$mail -> isSMTP();
$mail -> SMTPDebug = 2;
$mail -> Debugoutput = 'html';
$mail -> Host = 'smtp.gmail.com';
$mail -> Port = 587;
$mail -> SMTPSecure = 'tls';
$mail -> SMTPAuth = true;
$mail -> Username = "norshakirahabdullah96@gmail.com";
$mail -> Password = "scha96kyra96";
$mail -> setFrom ('terengganu.gov.com', 'Terengganu');
$mail -> addReplyTo ('no-reply@terengganu.com','Kiraa Miranda');
$mail -> addAddress ($email,$name);
$mail -> Subject = $subject;
$mail->msgHTML('<!DOCTYPE html><html><body>'.$message.'</body></html>');
$mail->AltBody = $subject;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

	}else{
		echo "Please enter all input fields";
	}	
}

function save_mail($mail){
	$path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
	$imapStream = imap_open ($path, $mail->Username, $mail->Password);
	$result = imap_append ($imapStream, $path, $mail->getSentMIMEMessage());
	imap_close($imapStream);
	
	return $result;

}
?>