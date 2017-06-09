<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="manifest.json">
	<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
      <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Perfect Shades by Slacker Hackers</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS --> 
	<link href="css/styles.css" rel="stylesheet"> 

  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="100" id="home">
  <?php
  	//these modals need to be loaded before header

    include "header_inclues.php";
    require "header.php";
	include "home.php";
	include "about.php";
	include "contact.php";
	include "footer.php";


	
    //include "comments.php";   // breaks the navigation bar when it is included
	//include "productFeature.php"; // unnecessary section (same as contact form)

  ?> 

	<!-- custom js files --> 
	<script src="js/navigation.js" type="text/javascript"></script>
	<script src="js/form_validation.js" type="text/javascript"></script>
	<script src="js/validator.js" type="text/javascript"></script>
  </body>
</html>
