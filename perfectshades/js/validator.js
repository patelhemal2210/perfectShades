function Validator() {
}

Validator.isEmpty = function(value) {
	if (value.trim() == null || value.trim() == "") {
		return true; 
	}
	return false; 
}
	
Validator.isEmptyValidationIndicator = function(input_id, form_group) {
	var input_value = $(input_id).val();
	if (Validator.isEmpty(input_value)) {
		$(form_group).removeClass( "has-success" ).addClass( "has-error" );
	}
	else {
		$(form_group).removeClass( "has-error" ).addClass( "has-success" );
	}
}

Validator.isDropDownValidationIndicator = function(input_id, form_group) {
	var input_value = $(input_id).val();
	if (input_value=="default") {
		$(form_group).removeClass( "has-success" ).addClass( "has-error" );
	}
	else {
		$(form_group).removeClass( "has-error" ).addClass( "has-success" );
	}
}

Validator.isMatchingPassword = function(input_id, input_id2, form_group) {
	var input_value1 = $(input_id).val();
	var input_value2 = $(input_id2).val();
	if (input_value1 == input_value2) {
		$(form_group).removeClass( "has-error" ).addClass( "has-success" );
	}
	else {
		$(form_group).removeClass( "has-success" ).addClass( "has-error" );
	}
}


	
/*		window.onload = function() {
		 	$("#inputField").bind('keyup', function(event) {
				Validator.isEmptyValidationIndicator("#inputField", "#formGrouping");
			} );  
	} */ 

