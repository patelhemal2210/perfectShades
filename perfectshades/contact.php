<?php
require "form_processing.php";
?>

<!-- <script type="text/javascript" src="js/contact.js"> </script> --> 

<section id="contact">
	<hr class="sectionDivider">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1 class="sectionTitle">Contact Us</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center contact_formPrompt">
				<p> Please use the form below if you would like to contact our office for any enquiries. We will do our best to respond within 24-48 hours. <?=$error_string?> 
				</p>
			</div>
		</div> 
		<div class="row">
			<div class="col-lg-12 text-center">

				<form class="form-horizontal" method="post" onsubmit="return validateContactForm()" action="index.php#contact" name="contact_form">
					<div class="form-group has-error" id="name_group">
						<label for="contact_name" class="col-sm-4 control-label">Name:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Name" value="<?=$form_data['contact_name']?>">
							</div>
					</div>
					<div class="form-group has-error" id="email_group">
						<label for="contact_email" class="col-sm-4 control-label">Email:</label>
							<div class="col-sm-6">
								<input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="user@host.com" value="<?=$form_data['contact_email']?>">
							</div>
					</div>
					<div class="form-group has-error" id="category_group">
						<label for="contact_category" class="col-sm-4 control-label">Category of enquiry:</label>
							<div class="col-sm-6">
							<!-- javascript change event enables/disables the other text field based on dropdown --> 
								<select class="form-control" name="contact_category" id="contact_category">
								  <option value="default" <?php if ($form_data["contact_category"] == "default") { echo "selected";}?>>Select an option</option>
								  <option value="website_tech_support" <?php if ($form_data["contact_category"] == "website_tech_support") { echo "selected";}?>>Website tech support</option>
								  <option value="sales_enquiries" <?php if ($form_data["contact_category"] == "sales_enquiries") { echo "selected";}?>>Sales enquiries</option>
								  <option value="marketing_opportunities" <?php if ($form_data["contact_category"] == "marketing_opportunities") { echo "selected";}?>>Marketing opportunities</option>
								  <option value="careers" <?php if ($form_data["contact_category"] == "careers") { echo "selected";}?>>Careers</option>
								  <option value="other" <?php if ($form_data["contact_category"] == "other") { echo "selected";}?>>Other</option>
								</select>
							</div>
					</div>
					<div class="form-group" id="other_enquiry_group">
						<label for="contact_other_enquiry" class="col-sm-4 control-label">If Other, please specify:</label>
							<div class="col-sm-6">
								<!-- php in input tag ensures that other field does not remain disabled if data is reloaded using POST --> 
								<input class="form-control" id="contact_other_enquiry" name="contact_other_enquiry" type="text" value="<?=$form_data['contact_other_enquiry']?>" placeholder="" <?php if ($form_data["contact_category"] == "other") { echo ""; } else { echo "disabled";}?>>
							</div onload=""> 			
					</div>
					<div class="form-group has-error" id="details_group">
						<label for="contact_details"class="col-sm-4 control-label">Provide further detail about your enquiry:</label>
							<div class="col-sm-6">
								<textarea class="form-control" id="contact_details" name="contact_details" rows="3"><?=$form_data['contact_details']?></textarea>
							</div>
					</div>
					<div class="form-group">
							<div class="col-sm-12">
								<input class="btn btn-lg" type="submit" id="contactSubmit" name="sent" value="Submit">
							</div>
					</div>
					<div id="errorModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Error!</h4>
							  </div>
							  <div class="modal-body">
								<div class="alert alert-danger">
								  Your form submission was denied. Please ensure you have filled out all of the mandatory fields!
							</div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>

					  </div>
					</div>
				</form>
			</div>
			</div> 
		</div> 
		<div class="row subSection">
			<div class="col-lg-4 col-lg-offset-1">
			     <h3> Perfect Shades Offices </h3>
			     <p> Humber College North Campus </p>
				 <p> 205 Humber College Blvd, </p>
				 <p> Etobicoke, ON, </p>
				 <p> M9W 5L7 </p>
			</div>
			<div class="col-lg-7 text-center">
				<div class="Flexible-container">
					<iframe width="500" height="350" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=humber%20college%20north%20campus&key=AIzaSyC27hFyeN_1xc6IiuQilf5FIR1_11VAp0s" allowfullscreen></iframe>
				</div> 
			</div>
		</div> 
	</div>
</section>
