<?php 
require_once "validator.php";
require_once 'mailer.php'; 
$form_data = initFormData(); 
$error_string = ""; 

if(isset($_POST['sent']))  {
	$form_data = retainFormData($form_data);
	$valid = true;
	
	$name = htmlspecialchars($_POST["contact_name"]);
	$email = htmlspecialchars($_POST["contact_email"]);
	$category = htmlspecialchars($_POST["contact_category"]);
	if (isSet($_POST["contact_other_enquiry"])) {
		$other = htmlspecialchars($_POST["contact_other_enquiry"]);
	}
	else {
		$other = ""; 
	}
	$details = htmlspecialchars($_POST["contact_details"]);
	
	if (!Validator::isNotNullOrEmpty($name)) {
		$valid = false; 
	}
	
	if (!Validator::isNotNullOrEmpty($email)) {
		$valid = false; 
	}
	else {
		if (!Validator::isEmail($email)) {
			$valid = false; 
		}
	}
	if (!(Validator::isNotNullOrEmpty($category)) || ($category == "default")) {
		$valid = false; 
	}
	else {
		if ($category == "other") {
			if (!Validator::isNotNullOrEmpty($other)) {
				$valid = false; 
			}
		}
	}
	if (!Validator::isNotNullOrEmpty($details)) {
		$valid = false; 
	}
	
	if ($valid) { 	// if validation has succeeded 

		// sending the e-mail - this does not work on localhost the project must be deployed on web server for this functionality to work since it requires composer/phpmailer installation
		
		// formatting subject line 
		$subject = "PerfectShades Form Submission: "; 
		if ($category == "website_tech_support") {
			$subject .= "Website Tech Support";
		}
		else if ($category == "sales_enquiries") {
			$subject .= "Sales Enquiries";
		}
		else if ($category == "marketing_opportunities") {
			$subject .= "Marketing Opportunities";
		}
		else if ($category == "careers") {
			$subject .= "Careers";
		}
		else if ($category == "other") {
			$subject .= $other;
		}
		
		
		$mailer = Mailer::getInstance();
		$mailer->receiveMail($form_data["contact_email"], $form_data["contact_name"], $subject, $details);
		
		// redirecting to success page
		include_once "contact_submission.php"; 
		return; 
	}
	else {
		// error message to display upon failure to validate
		$error_string = "<div class='alert alert-danger'><strong>Error!</strong> Your form submission was denied. Please ensure you have filled out all of the mandatory fields! </div>";
	}
}

function initFormData() {
	$form_data = ["contact_name" => "", 
			 "contact_email" => "", 
			 "contact_category" => "",
			 "contact_other_enquiry" => "", 
			 "contact_details" => ""]; 
	return $form_data; 
}

function retainFormData($form_data) {
	$form_data["contact_name"] = htmlspecialchars($_POST["contact_name"]);
	$form_data["contact_email"] = htmlspecialchars($_POST["contact_email"]);
	$form_data["contact_category"] = htmlspecialchars($_POST["contact_category"]);
	if (isSet($_POST["contact_other_enquiry"])) {
		$form_data["contact_other_enquiry"] = htmlspecialchars($_POST["contact_other_enquiry"]);
	}
	$form_data["contact_details"] = htmlspecialchars($_POST["contact_details"]);
	return $form_data; 
}

?>
