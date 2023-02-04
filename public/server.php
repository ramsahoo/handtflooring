<?php
require_once('SMTP.php');
require_once('PHPMailer.php');
require_once('Exception.php');

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

$mail=new PHPMailer(true); // Passing `true` enables exceptions

try {
    $from = "";
	$to = "rameensahoo@gmail.com";
	$name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
	$number = $_REQUEST['number'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];

    $headers = "From: $name";
	$headers = "From: " . $email . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "You have a message for H & T Flooring.";

    $logo = 'img/logo.png';
    $link = 'https://handtfloors.com';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$email}</td>";
	$body .= "<td style='border:none;'><strong>Phone Number:</strong> {$number}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$message}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($from, $to, $headers, $subject, $body);

	echo 'Message has been sent. Thank you!';
}
	catch(Exception $e) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: '.$mail->ErrorInfo;
	}

?>