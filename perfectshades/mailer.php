<?php
require_once 'vendor/autoload.php';

class Mailer
{
	private static $mail;
	private static $instance; 
	private static $password = '123Ravinder';  // remove hardcoded password in future updates

	const HOST = 'C201.lithium.hosting';  
	const SMTP_AUTH = true;
	const USERNAME = 'contact@perfectshades.ca';
	const SECURITY = 'ssl';
	const PORT = 465;
	const FROMNAME = 'PerfectShades.ca'; 
	const DONOTREPLY = 'donotreply@perfectshades.ca';

    private function __construct()
    {
		Mailer::$mail = new PHPMailer;
		Mailer::$mail->isSMTP();
		//Mailer::$mail->SMTPDebug  = 2; // show messages 
		Mailer::$mail->Host = self::HOST;
		Mailer::$mail->SMTPAuth = self::SMTP_AUTH;
		Mailer::$mail->Username = self::USERNAME;
		Mailer::$mail->Password = Mailer::$password;
		Mailer::$mail->SMTPSecure = self::SECURITY;
		Mailer::$mail->Port = self::PORT;
		Mailer::$mail->Sender = self::USERNAME;
    }

	public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Mailer();
        }
        return self::$instance;
    }
	
	// used to send mail to users from donotreply address
	public function sendMail($address, $subject, $body) {
		Mailer::$mail->SetFrom(self::DONOTREPLY, self::FROMNAME); 
		Mailer::$mail->addAddress($address);
		Mailer::$mail->Subject = $subject;
		Mailer::$mail->Body = $body;
		if (!Mailer::$mail->send()) {
			echo 'Mailer Error: ' . Mailer::$mail->ErrorInfo;
			return false; 
		} else {
			return true; 
		}
	}
	
	// sends mail to the perfectshades inbox, sender specified in parameters (e.g. data from contact form)
	public function receiveMail($senderAddress, $senderName, $subject, $body) {
		Mailer::$mail->SetFrom($senderAddress, $senderName); 
		Mailer::$mail->addAddress(self::USERNAME);
		Mailer::$mail->Subject = $subject;
		Mailer::$mail->Body = $body;
		if (!Mailer::$mail->send()) {
			echo 'Mailer Error: ' . Mailer::$mail->ErrorInfo;
			return false; 
		} else {
			return true; 
		}
	}
}
?>