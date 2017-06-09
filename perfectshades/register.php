<?php
ob_start();
//require_once("users.php");
//require_once("users_bo.php");
//require_once("mailer.php");

// check if form was submitted before performing operations - avoids displaying error msg the first time you open the form (due to empty form fields)
/*
if(isset($_POST['register_submit']))  {
	
	$userName = filter_input(INPUT_POST, 'username');
	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	$errorMessage="";

	consoleLog($userName);
	consoleLog($email);
	consoleLog($password);

	$usersBO = new UsersBO(null);
	$userList = $usersBO->getAllData();
	consoleLog($userList);
	consoleLog(isExistedEmail($userList,$email));
	if(isExistedEmail($userList,$email)){
		$errorMessage = "Email already registered!";
	} else {
		$encryptedPassword = password_hash($password,PASSWORD_DEFAULT);
		$user = new Users();
		$user->setName($userName);
		consoleLog($user->getName());
		$user->setEmail($email);
		consoleLog($user->getEmail());
		$user->setPassword($encryptedPassword);
		consoleLog($user->getPassword());
		$users_bo = new UsersBO($user);
		$users_bo->insertIntoTable();
		$_SESSION['userName']  = $userName;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		
		
		$body = "Hello, " . $userName . "! \r\n\r\n";
		$body .= "Thank you for registering with us at www.PerfectShades.ca. We hope you enjoy the website and get lots of great ideas regarding your newest sunglasses to purchase. \r\n\r\n";
		$body .= "To log in at www.PerfectShades.ca, use the e-mail address and password you signed up with ($email). \r\n";
		$body .= "If you can't remember your login information, just fill out the 'Forgot Your Password' form under the User Profile tab of the navigation bar. \r\n\r\n";
		$body .= "Thanks for signing up and don't forget to comment and share your favourite shades from our catalog. \r\n\r\n";
		$body .= "Cheers, \r\n\r\n";
		$body .= "PerfectShades.ca Staff\r\n";
		$body .= "www.perfectshades.ca";
		$mailer = Mailer::getInstance();
		$mailer->sendMail($email, 'Thank you for registering at PerfectShades.ca', $body);
	}

	consoleLog($errorMessage);
}

function isExistedEmail($userList,$email){
	$isExisted = false;
	foreach ($userList as $user) {
		$email_db=$user->email;
		if($user->email == $email){
			return true;
		}
	}
	return false;
}

//debug use only
function consoleLog($data){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
} 
*/
?>

<div class="modal fade" id="RegisterModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Register</h3>
            </div>

            <div class="modal-body" id="modal-body">
                <form id="RegisterForm" onsubmit="return validateRegisterForm()" name="RegisterForm" class="form-horizontal" method="post" action="">
					<div id="register_error"></div>

                    <div style="margin-bottom: 25px" class="input-group has-error" id="register_username_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="RegisteruserName" type="text" class="form-control" name="registerusername" placeholder="Enter your name" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group has-error" id="register_email_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="RegisterEmail" type="email" class="form-control" name="registeremail" placeholder="Enter your Email" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group has-error" id="register_password_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="RegisterPassword" type="password" class="form-control" name="registerpassword" placeholder="Enter your Password" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group has-error" id="register_confirmpassword_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="RegisterConfirmPassword" type="password" class="form-control"  name="registerconfirmpassword" placeholder="Confirm your Password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="register_submit" class="btn btn-primary">Register</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- for some reason, this modal will not re-open after failing validation on the forgot your password form if I have it in a separate file
I am still tracking down the bug but for now I put the modal here so it will function for our employer event --> 

<div class="modal fade" id="ForgetPasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Forgot Your Password?</h3>
            </div>

            <form id="forget_password_form" class="form-horizontal" onsubmit="" method="post" action="index.php">
				<div class="modal-body">
					<div class='alert alert-success'>Enter the e-mail address associated with your account and we will reset your password and e-mail you the login info.</div>
                    <div style="margin-bottom: 25px" class="input-group has-error" onsubmit="return validateLoginForm()" id="forget_password_email_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="forget_password_email" type="email" class="form-control" name="forget_password_email" placeholder="Enter your email" required>
                    </div>
                
				</div>

				<div class="modal-footer">
					<button type="submit" name="forget_submit" id="forget_submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			
			</form>
        </div>
    </div>
</div>

<div class="modal fade" id="ErrorForgotPasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Forgot Your Password?</h3>
            </div>

            <form id="forget_password_form" class="form-horizontal" onsubmit="" method="post" action="index.php">
				<div class="modal-body">
					<div class='alert alert-danger'><strong>Error!</strong> There is no account with that e-mail address! </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			
			</form>
        </div>
    </div>
</div>


<div class="modal fade" id="SuccessForgotPasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Forgot Your Password?</h3>
            </div>

            <form id="forget_password_form" class="form-horizontal" onsubmit="" method="post" action="index.php">
				<div class="modal-body">
					<div class='alert alert-success'><strong>E-mail sent!</strong> Please check your inbox for your new login details. </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			
			</form>
        </div>
    </div>
</div>



