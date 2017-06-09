<?php 
require_once 'generate_password.php';
require_once "validator.php";
require_once 'mailer.php'; 
require_once("users.php");
require_once("users_bo.php");
require_once("forgetPassword.php");

$error_string = ""; 
$valid = true; 

if(isset($_POST['forget_submit']))  {
	$email = htmlspecialchars($_POST["forget_password_email"]);
	
	// check if e-mail input is valid 
	if (!Validator::isNotNullOrEmpty($email)) {
		$valid = false; 
	}
	
	if ($valid) {
		// check if e-mail exists in user list
		$user = new Users();
		$user->setEmail($email);
		$user_bo = new UsersBO($user);

		if(!$user_bo->isExistingUser()) {
			$valid = false;
			//user does not exist
		}
		else {
			// generate new password 
			$newPassword = generatePassword(10);
			$encryptedPassword = password_hash($newPassword,PASSWORD_DEFAULT);
			
			// update db password with generated and encrypted password
			$current_user = new Users();
			$current_user->setPassword($encryptedPassword);
			$constraintList = array();
			$constraint1 = array(UsersBO::EMAIL, BusinessObjectBase::EQUAL, $email);
			$constraintList[] = $constraint1; 
			$user_bo = new UsersBO($current_user);
			$user_bo->updateTable($constraintList);
			forgotPasswordMail($email, $newPassword);
		}
	}
	if (!$valid) {
			echo ("<script>
			$('#ErrorForgotPasswordModal').modal('show');</script>");

	}
	else {
		echo ("<script>
			$('#SuccessForgotPasswordModal').modal('show');</script>");
	}
}

function forgotPasswordMail($email, $newPassword) {
	$body = "Hello, \r\n\r\n"; 
			$body .= "We recently received a request to reset the password for your account at www.PerfectShades.ca. \r\n\r\n";
			$body .= "To log in at www.PerfectShades.ca, use the following information: \r\n\r\n";
			$body .= "Login: " . $email . " \r\n";
			$body .= "Password: " . $newPassword . " \r\n\r\n";
			$body .= "You may wish to change your password to something easier to remember after you regain access to your account. \r\n\r\n";
			$body .= "Cheers, \r\n\r\n";
			$body .= "PerfectShades.ca Staff\r\n";
			$body .= "www.perfectshades.ca";
			$mailer = Mailer::getInstance();
			$mailer->sendMail($email, 'Password reset request at PerfectShades.ca', $body);
}

?>
