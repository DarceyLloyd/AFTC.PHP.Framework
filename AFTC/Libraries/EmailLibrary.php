<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 25/04/2016
 */

namespace AFTC\Framework\App\Libraries;


class EmailLibrary
{
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function sendHTMLEmail($to,$from,$reply,$subject,$body,$attachment)
	{
		$mail = new \PHPMailer();
		$mail->isSendmail();
		$mail->setFrom($from);
		$mail->addReplyTo($reply);
		$mail->addAddress($to);
		$mail->Subject = $subject;
		$mail->msgHTML($body);
		//$mail->AltBody = 'This is a plain-text message body';
		if ($attachment){
			$mail->addAttachment($attachment);
		}

		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}