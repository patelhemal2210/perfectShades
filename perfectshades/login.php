<?php

session_start();

if(isset($_COOKIE['email'])){
	$email = $_COOKIE['email'];
} else {
	$email="";
}

if(isset($_COOKIE['password'])){
	$password = $_COOKIE['password'];
} else {
	$password="";
}

/* 

// commented as this code breaks javascript and duplicates the entire website - possibly from the 'include index.php' on line 39?


require_once("users_bo.php");
require_once("users.php");

if(isset($_COOKIE['email'])){
    $email = $_COOKIE['email'];
} else {
    $email="";
}

if(isset($_COOKIE['password'])){
    $password = $_COOKIE['password'];
} else {
    $password="";
}

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
if(isset($_POST['remember_me'])){
    $rememberMe=true;
}

$usersBO = new UsersBO(null);
$userList = $usersBO->getAllData();

if(isExistedUser($userList,$email,$password)){
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    if($rememberMe){
        $expire =  new DateTime('+1 month');
        setcookie("email",$email,$expire->getTimestamp(),"/","localhost",false,true);
        setcookie("password",$password,$expire->getTimestamp(),"/","localhost",false,true);
    }
    $userName=getUserName($userList,$email);
    include("index.php"); 
} else {
    $errorMessage = "Sorry, there is something wrong with your email/password!";
}


function isExistedUser($userList,$email,$password){
    foreach ($userList as $user) {
        if($user->email == $email&&password_verify($password,$user->password)){
            return true;
        } 
    }
    return false;
}

function getUserName($userList,$email){
    foreach ($userList as $user) {
        if($user->email == $email){
            $userName = $user->name;
        }
    }
    return $userName;
}
 
*/ 

?> 

<div class="modal fade" id="LoginModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Login</h3>
            </div>
                <form id="login_form" class="form-horizontal" method="post" action="index.php" name="login_form">
					<div id="login_error"></div>
				    <div class="modal-body">
						<div style="margin-bottom: 25px" class="input-group has-error" id="login_email_group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" id="Email" type="text" class="form-control" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" required>
						</div>
						<div style="margin-bottom: 25px" class="input-group has-error" id="password_group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="Password" type="password" class="form-control" name="password" placeholder="Enter your Password" value="<?php echo $password; ?>" required>
						</div>
						<div style="margin-bottom: 25px" class="input-group" id="remember_group">
							<input id="RememberMe" type="checkbox" name="remember_me" value="remember_me"><label>Remember Me</label>
						</div>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Login</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
        </div>
		
    </div>
</div>
