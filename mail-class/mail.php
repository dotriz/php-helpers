<?php

/*
	a small mailer script to send spam-free messages
	Written by M Rizwan - grizwan@gmail.com
*/
require_once (__dir__ . "/class.smtp.php");
require_once (__dir__ . "/class.phpmailer.php");

class mail
{
    var $body;
    var $from;
    var $from_name;
    var $to;
    var $attachment;
    var $subject;
    var $use_smtp = true;

    function send_mail($smtp_server = "", $smtp_user = "", $smtp_password = "")
    {
        $headers  = "From: $this->from \r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1 ";
        $headers .= "MIME-Version: 1.0 ";

        $mail = new PHPMailer();

        if($this->use_smtp==true)
        {
            $mail->IsSMTP(); 					// send via SMTP
            $mail->Host 	= $smtp_server; 		// SMTP servers
            $mail->Port 	= 25;
            $mail->SMTPAuth = true;     		// turn on SMTP authentication
            $mail->Username = $smtp_user;  		// SMTP username
            $mail->Password = $smtp_password; 	// SMTP password
        }

        $mail->From     = $this->from;
        $mail->FromName = $this->from_name;
        $mail->AddAddress($this->to);
		if ($this->bcc != "") $mail->AddBCC($this->bcc);
    	$mail->AddReplyTo($smtp_user,"Information");
        $mail->IsHTML(true);					// send as HTML
        $mail->Subject  =  $this->subject;

        if($this->attachment != '')
        {
            $mail->AddAttachment($this->attachment);
        }

		$mail->Body = $this->body;
		if(!$mail->Send()) return false; else return true;

    }
}


?>