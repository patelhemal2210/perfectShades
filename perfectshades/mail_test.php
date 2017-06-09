<?php
require_once 'mailer.php'; 
$mailer = Mailer::getInstance();

// sends mail to the specified address e.g. to send user registration information or forgot password info 
$mailer->sendMail('cole.r.siegel@gmail.com', 'dis a subject yo', 'dis a body yo \n\ line numbah 2');

// sends mail to contact@perfectshades.ca from specified address, e.g. data from contact form is sent using this method
$mailer->receiveMail('cole.r.siegel@gmail.com', 'Cole Siegel', 'Form subject', 'Form content');
?>

<html>
<head>
</head>

<body>
mail test
</body>
</html>