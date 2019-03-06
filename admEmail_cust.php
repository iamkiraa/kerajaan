<?php
include('check_admin.php'); //check if user is a Administrator
include('header_admin.php'); //load header content for Administrator page
include("connection.php"); // connction to database
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = ' files.000webhost.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'norshakirah';                 // SMTP username
    $mail->Password = 'Shakirah96';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('hanraera.96@gmail.com', 'Han Rae Ra');
    $mail->addAddress('norshakirahabdullah96@gmail.com');     // Add a recipient

	$body = '<p><strong>Hello</strong> this is my first email with PHPmailer</p>';
	
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'This is test email';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}