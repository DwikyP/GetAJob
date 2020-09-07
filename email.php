<?php
	//Author : Dwiky Putra R R T
	//Description : login page with session and cookie
	//Last Modified by : Dwiky Putra R R T 2-12-2018
include('phpmailer/class.phpmailer.php');
include('phpmailer/class.smtp.php');
function sendEmail($surel,$nama,$judul,$isi,$altIsi){
	//$mail = new PHPMailer();
	/*$mail->Host     = "ssl://smtp.gmail.com"; 
	$mail->Mailer   = "smtp";
	$mail->SMTPAuth = true; */
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;

	$mail->Username = "jobfinderincorp@gmail.com"; 
	$mail->Password = "fingering123";
	$webmaster_email = "jobfinderincorp@gmail.com"; 
	$email = $surel;
	$name = $nama; 
	$mail->From = $webmaster_email;
	$mail->FromName = "Job Finder Inc.";
	$mail->AddAddress($email,$name);
	$mail->AddReplyTo($webmaster_email,"Job Finder Inc.");
	$mail->WordWrap = 50; 
	//$mail->AddAttachment("module.txt"); // attachment
	//$mail->AddAttachment("new.jpg"); // attachment
	$mail->IsHTML(true); 
	$mail->Subject = $judul;
	$mail->Body = $isi; 
	$mail->AltBody = $altIsi; 
		if(!$mail->Send())
		{
		echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
		echo "Thank You For Using Our Service<br/>";
		}
}

function sendEmailComp($surel,$nama,$judul,$isi,$altIsi,$path){
	//$mail = new PHPMailer();
	/*$mail->Host     = "ssl://smtp.gmail.com"; 
	$mail->Mailer   = "smtp";
	$mail->SMTPAuth = true; */
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;

	$mail->Username = "jobfinderincorp@gmail.com"; 
	$mail->Password = "fingering123";
	$webmaster_email = "jobfinderincorp@gmail.com"; 
	$email = $surel;
	$name = $nama; 
	$mail->From = $webmaster_email;
	$mail->FromName = "Job Finder Inc.";
	$mail->AddAddress($email,$name);
	$mail->AddReplyTo($webmaster_email,"Job Finder Inc.");
	$mail->WordWrap = 50; 
	$mail->addStringAttachment($path, "resume.docx", $encoding = 'base64',$type = 'application/docx', $disposition = 'inline');  // attachment
	//$mail->AddAttachment("new.jpg"); // attachment
	$mail->IsHTML(true); 
	$mail->Subject = $judul;
	$mail->Body = $isi; 
	$mail->AltBody = $altIsi; 
	if(!$mail->Send())
		{
		echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
		echo "Your Apply has send to the Company";
		}
}
?>