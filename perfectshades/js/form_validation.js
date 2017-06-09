window.onload = function() {
	function toggleOtherField() {
		var option = document.forms["contact_form"]["contact_category"].value;
		if (option == "other") {
			var other_field = document.forms["contact_form"]["contact_other_enquiry"];
			other_field.disabled = false; 
			other_field.value = ""; 
			$("#other_enquiry_group").removeClass( "has-success" ).addClass( "has-error" );
			$("#contact_other_enquiry").bind('keyup', function(event) {
				Validator.isEmptyValidationIndicator("#contact_other_enquiry", "#other_enquiry_group");
			}); 
		}
		else {
			var other_field = document.forms["contact_form"]["contact_other_enquiry"];
			other_field.disabled = true; 
			other_field.value = ""; 
			$("#other_enquiry_group").removeClass( "has-success" );
			$("#other_enquiry_group").removeClass( "has-error" );
			$("#contact_other_enquiry" ).unbind();
		}
	}
	$("#contact_category").on("change", toggleOtherField);

	// display validation 

	// contact form 
	$("#contact_name").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#contact_name", "#name_group");
	} ); 
	
	$("#contact_email").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#contact_email", "#email_group");
	} ); 
	
	$("#contact_details").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#contact_details", "#details_group");
	} ); 
	
	$("#contact_category").bind('change', function(event) {
		Validator.isDropDownValidationIndicator("#contact_category", "#category_group");
	} ); 
	
	// login form 
	$("#Email").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#Email", "#login_email_group");
	} ); 
	
	$("#Password").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#Password", "#password_group");
	} ); 
	
	// register form
	
	$("#RegisteruserName").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#RegisteruserName", "#register_username_group");
	} ); 
	
	$("#RegisterEmail").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#RegisterEmail", "#register_email_group");
	} ); 
		
	$("#RegisterPassword").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#RegisterPassword", "#register_password_group");
	} ); 
	
	$("#RegisterConfirmPassword").bind('keyup', function(event) {
		Validator.isMatchingPassword("#RegisterConfirmPassword", "#RegisterPassword", "#register_confirmpassword_group");
	} ); 
	
		
	$("#forget_password_email").bind('keyup', function(event) {
		Validator.isEmptyValidationIndicator("#forget_password_email", "#forget_password_email_group");
	} ); 
	

	
	
};

// validate on login form submission

$('#login_form').submit(function() {
	return validateLoginForm();
});

function validateLoginForm() {
	var valid_form = true;
	var email = document.forms["login_form"]["email"];
	var password = document.forms["login_form"]["password"];
	var remember_me = document.forms["login_form"]["remember_me"];


	// checks each field for appropriate input and sets flag if invalid
    if (email.value == null || email.value == "") {
		valid_form = false; 
    } 
	if (password.value == null || password.value == "") {
		valid_form = false; 
    }
	// if any fields are invalid then the form will not submit
	if (valid_form) {
		return true;
	}
	else {
		// avoid duplicated error msg
		if ($("#login_error").text().length == 0) {
			// display error msg if validation fails
			var error_div = "<div class='alert alert-danger'><strong>Error!</strong> Your form submission was denied. Please ensure you have filled out all of the mandatory fields! </div>"
			$("#login_error").append(error_div);
		}                 
		// form will not submit
		return false;
	}
}



$('#forget_password_form').submit(function() {
	return validateForgotPasswordForm();
});

// validate on form submission
function validateForgotPasswordForm() {
	var valid_form = true;
	var email = document.forms["forget_password_form"]["forget_password_email"];


	// checks each field for appropriate input and sets flag if invalid
    if (email.value == null || email.value == "") {
		valid_form = false; 
    } 
	
	// if any fields are invalid then the form will not submit
	if (valid_form) {
		return true;
	}
	else {
		// avoid duplicated error msg
		if ($("#forget_error").text().length == 0) {
			// display error msg if validation fails
			var error_div = "<div class='alert alert-danger'><strong>Error!</strong> Your form submission was denied. Please ensure you have filled in your e-mail address! </div>"
			$("#forget_error").append(error_div);
		}                 
		// form will not submit
		return false;
	}
}

$('#RegisterForm').submit(function() {
	return validateRegisterForm();
});

function validateRegisterForm() {
	var valid_form = true;
	var name = document.forms["RegisterForm"]["RegisteruserName"];
	var email = document.forms["RegisterForm"]["RegisterEmail"];
	var password = document.forms["RegisterForm"]["RegisterPassword"];
	var confirmpassword = document.forms["RegisterForm"]["RegisterConfirmPassword"];
	
	if (email.value == null || email.value == "") {
		valid_form = false; 
    } 
	
	if (name.value == null || name.value == "") {
		valid_form = false; 
    } 
	
	if (password.value == null || password.value == "") {
		valid_form = false; 
    } 
	
	if (confirmpassword.value == null || confirmpassword.value != password.value) {
		valid_form = false; 
	}
	

	// if any fields are invalid then the form will not submit
	if (valid_form) {
		return true;
	}
	else {
		// avoid duplicated error msg
		$("#register_error").empty();
		// display error msg if validation fails
		var error_div = "<div class='alert alert-danger'><strong>Error!</strong> Your form submission was denied. Please ensure you have filled out all of the mandatory fields and password matches! </div>"
		$("#register_error").append(error_div);

		// form will not submit
		return false;
	}
	
}

function validateContactForm() {
	var valid_form = true;
	
	// gets the node for user input fields
	var name = document.forms["contact_form"]["contact_name"];
	var email = document.forms["contact_form"]["contact_email"];
	var category = document.forms["contact_form"]["contact_category"];
	var other = document.forms["contact_form"]["contact_other_enquiry"];
	var details = document.forms["contact_form"]["contact_details"];

	// checks each field for appropriate input and sets flag if invalid
    if (name.value == null || name.value == "") {
		valid_form = false; 
    } 
	if (email.value == null || email.value == "") {
		valid_form = false; 
    }
	if (category.value == null) {
		valid_form = false; 
	} else if (category.value == "" || category.value == "default") {
		valid_form = false; 
	}
	else if (category.value == "other") {
		if (other.value == null || other.value == "") {
				valid_form = false; 
		}
	}
	if (details.value == null || details.value == "") {
		valid_form = false; 
    }
	
	// if any fields are invalid then the form will not submit
	if (valid_form) {
		return true;
	}
	else {
		$("#errorModal").modal('show');
		return false;
	}
}
