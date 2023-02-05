<?php
require_once('SMTP.php');
require_once('PHPMailer.php');
require_once('Exception.php');

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

$mail=new PHPMailer(true); // Passing `true` enables exceptions


try {
    //settings
    $mail->SMTPDebug=2; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true; // Enable SMTP authentication
    $mail->Username='rameensahoo@gmail.com'; // SMTP username
    $mail->Password='agprxqfxyhlitihr'; // SMTP password
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

	//variables
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	//from email address and name
    $mail->FromName = $name = $_POST['name'];;
	$mail->From = ('client@handtfloors.com');

	//to or recipient address and name
	$mail->addAddress("handtfloors@gmail.com", "Mihai Mironov");

	//Address to which recipient will reply
	$mail->addReplyTo($email = $_REQUEST['email']);	

	//CC 
	$mail->addCC("rameensahoo@gmail.com");

    //Subject
	$mail->Subject = $subject = $_REQUEST['subject'];

	$headers = "From: $name";
	$headers = "From: " . $email . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	// HTML Body
	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>H & T Flooring Contact Request</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$email}</td>";
	$body .= "<td style='border:none;'><strong>Phone Number:</strong> {$number}</td>";
	$body .= "</div>";
	$body .= "</tr>";
	$body .= "<tr><td colspan='2' style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'><strong>Message:</strong> {$message}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";
    $mail->Body = $body;
	$mail->AltBody = $body;
	$mail->isHTML(true); // Set email format to HTML
	echo $body;

	//send mail
    $mail->send();

	//prompts
    echo 'Message has been sent';
} 
catch(Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: '.$mail->ErrorInfo;
}

?>