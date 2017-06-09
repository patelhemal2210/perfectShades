<?php
require_once("mailer.php");
registerMail("New test", "cole.r.siegel@gmail.com");


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

mail test 