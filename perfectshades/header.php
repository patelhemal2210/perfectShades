<?php

require_once("users.php");
require_once("users_bo.php");
require_once("mailer.php");

$user_name = "User Profile";
$log_in = "Login";
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$is_logout = filter_input(INPUT_POST, 'logout');


$register_email = filter_input(INPUT_POST, 'registeremail');
$register_password = filter_input(INPUT_POST, 'registerpassword');
$register_confirm_password = filter_input(INPUT_POST, 'registerconfirmpassword');
$register_username = filter_input(INPUT_POST, 'registerusername');

$headerList = array("Home" => "#home",
                    "Find Your Shades" => "display_glasses.php",
                    "About" => "#about",
                    "Contact Us" => "#contact");

$ExternalheaderList = array("Home" => "index.php#home",
                            "Find Your Shades" => "display_glasses.php",
                            "About" => "index.php#about",
                            "Contact Us" => "index.php#contact");
function generateHeader($list, $active)
{
    foreach($list as $name => $link)
    {
        if($name == $active)
        {
            echo "<li class=\"active\"><a href=\"$link\" class=\"slider\">$name</a></li>";
        }
        else
        {
            echo "<li><a href=\"$link\" class=\"slider\">$name</a></li>";
        }
    }

}

if($is_logout)
{
    session_unset();
    $_SESSION = array();
    session_destroy();
}
else
{
    $session_started = isset($_SESSION['email']);
    if($session_started)
    {
        $user_name = $_SESSION['email'];
        $log_in = "Log out";
    }
}


if($email != null && $email != "" && $password != null && $password != "" && !$session_started) {
    //Create user with email and password

    $rememberMe = filter_input(INPUT_POST, 'remember_me');

    if(logInValidation($email, $password))
    {
        $_SESSION['email'] = $email;
        $_SESSION["errorMessage"] = "";
        //$_SESSION['password']=$password;
        $user_name = $email;
        $log_in = "Log out";
        if($rememberMe){
            $expire =  new DateTime('+1 month');
            setcookie("email",$email,$expire->getTimestamp(),"/","localhost",false,true);
            setcookie("password",$password,$expire->getTimestamp(),"/","localhost",false,true);
        }
    }
    else {
        echo "<script>
        if ($(\"#login_error\").text().length == 0) {
            // display error msg if validation fails
            var error_div = \"<div class='alert alert-danger'><strong>Error!</strong> Your form submission was denied. Please ensure you provide correct information! </div>\"
			$(\"#login_error\").append(error_div);
		}
        $('#LoginModal').modal('show');</script>";
    }
}

if($register_email != null && $register_email != "" &&
    $register_password != null && $register_password != "" &&
    $register_confirm_password != null && $register_confirm_password != "" &&
    $register_username != null && $register_username != "")
{
    if($register_password == $register_confirm_password)
    {
        switch(registerUser($register_email, $register_username, $register_password))
        {
            case 1 : //success
                registerMail($register_username, $register_email);
                echo "<script>
                    $(\"#modal-body\").empty();
                        // display error msg if validation fails
                    var error_div = \"<div class='alert alert-success'><strong>Congratulations!</strong> You are registered with our website! </div>\"
                        $(\"#modal-body\").append(error_div);
                        $('#RegisterModal').modal('show');</script>";
                break;

            case 2 : //existing user
                echo "<script>
                    $(\"#register_error\").empty();
                        // display error msg if validation fails
                    var error_div = \"<div class='alert alert-danger'><strong>Error!</strong> You are already registered with us! Please try logging in! </div>\"
                        $(\"#register_error\").append(error_div);
                        $('#RegisterModal').modal('show');</script>";
                break;

            case 3 : //insert error
                echo "<script>
                    $(\"#register_error\").empty();
                        // display error msg if validation fails
                    var error_div = \"<div class='alert alert-danger'><strong>Error!</strong> Something went wrong please try again later ! </div>\"
                        $(\"#register_error\").append(error_div);
                        $('#RegisterModal').modal('show');</script>";
                break;
        }
    }
    else
    {
        echo "<script>
                    $(\"#register_error\").empty();
                        // display error msg if validation fails
                    var error_div = \"<div class='alert alert-danger'><strong>Error!</strong> Password does not match! </div>\"
                        $(\"#register_error\").append(error_div);
                        $('#RegisterModal').modal('show');</script>";
    }

}

function logInValidation($email, $password)
{
    $status = false;
    $user = new Users();
    $user->setEmail($email);
    $user->setPassword($password, false);
    //Create BO for above creted user
    $user_bo = new UsersBO($user);
    if ($user_bo->isValidUser()) {
        $status = true;
    }
    return $status;
}

function registerUser($email, $username, $password)
{
    $status = 1;

    //check if user available
    $user = new Users();
    $user->setEmail($email);
    $user_bo = new UsersBO($user);

    if(!$user_bo->isExistingUser())
    {
        $user->setName($username);
        $user->setPassword($password);
        $user_bo->setUsers($user);
        if ($user_bo->insertIntoTable()) {
            $status = 1;
        }
        else
        {
            //echo "failed to register";
            $status = 3;
        }
    }
    else
    {
        //echo "You are already registered ! Try Logging-in !";
        $status = 2;
    }

    return $status;
}

function registerMail($userName, $email)
{
    $body = "Hello, " . $userName . "! \r\n\r\n";
    $body .= "Thank you for registering with us at www.PerfectShades.ca. We hope you enjoy the website and get lots of great ideas regarding your newest sunglasses to purchase. \r\n\r\n";
    $body .= "To log in at www.perfectshades.ca, use the e-mail address and password you signed up with ($email). \r\n";
    $body .= "If you can't remember your login information, just fill out the 'Forgot Your Password' form under the User Profile tab of the navigation bar. \r\n\r\n";
    $body .= "Thanks for signing up and don't forget to comment and share your favourite shades from our catalog. \r\n\r\n";
    $body .= "Cheers, \r\n\r\n";
    $body .= "PerfectShades.ca Staff\r\n";
    $body .= "www.perfectshades.ca";
    $mailer = Mailer::getInstance();
    $mailer->sendMail($email, 'Thank you for registering at PerfectShades.ca', $body);
}

?>
<!DOCTYPE html>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand" id="navTitle" href="#home">Perfect Shades</span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <?php
                  if(isset($from_external_page))
                  {
                      generateHeader($ExternalheaderList, $from_external_page);
                  }
                  else
                  {
                      generateHeader($headerList, "Home");
                  }

              ?>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resources<span class="caret"></span></a>
                <ul class="dropdown-menu navbar-right">
                    <li><a>Product Image Sources</a></li>
                    <li class="divider"></li>
                    <li><a href="http://www.ray-ban.com/canada/en" target="_blank">Go to Rayban</a></li>
                    <li><a href="http://www.oakley.com/" target="_blank">Go to Oakley</a></li>
                    <li><a href="http://www.persol.com/canada" target="_blank">Go to Persol</a></li>
                    <li><a href="https://www.gucci.com/ca/en/" target="_blank">Go to Gucci</a></li>
					<li><a href="https://www.amazon.ca" target="_blank">Go to Amazon</a></li>
                </ul>
            </li>

		 </ul> 
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if (!empty($user_name)){echo $user_name;}?><span class="caret"></span></a>
				  <ul class="dropdown-menu navbar-right">
                      <?php
                      if($log_in == "Login")
                      { ?>
                      <li><a href="#login" data-toggle="modal" data-target="#LoginModal"><?php if (!empty($log_in)){echo $log_in;}?></a></li>
					  <li><a href="#register" data-toggle="modal" data-target="#RegisterModal">Register</a></li>
					  <li><a href="#forgetPassword" data-toggle="modal" data-target="#ForgetPasswordModal">Forgot Your Password?</a></li>
                      <?php
                      }
                      else if($log_in == "Log out")
                      { ?>
                      <li><a href="#logout" data-toggle="modal" data-target="#LogoutModal"><?php if (!empty($log_in)){echo $log_in;}?></a></li>
					  <!-- <li><a href="#ChangePasswordModal" data-toggle="modal" data-target="#">Change Your Password</a></li> // TO BE ADDED --> 
                      <?php
                      }
                      ?>
                      <li><a href="#fbshare" id="shareBtn" data-toggle="modal">Share on Facebook</a></li>
<script>
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
	method: 'share',
	mobile_iframe: false,
	href: window.location.href,
  }, function(response){});
}

// FB code to share pages - reccomended to by Facebook SDK keep inline near first page
 window.fbAsyncInit = function() {
    FB.init({
      appId      : '326475291061944',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

					<!--<li class="divider"></li>
					<li><a href="#dashboard">Dashboard</a></li> --> 
				  </ul>
				</li>
            </ul>
          </ul>
        </div>
      </div>
    </nav>
	
	