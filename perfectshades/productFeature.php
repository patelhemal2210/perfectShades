<section id="contact">
    <hr class="sectionDivider">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="sectionTitle">Feature your Product</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center contactFormPrompt">
                <p> Please use the form below if you would like to get your product to be featured. We will do our best to respond within 24-48 hours.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">

                <!-- more information about Bootstrap forms including validation styles which look very nice here - http://getbootstrap.com/css/ search validation -->
                <!-- note this is not coded yet, or validated, only the HTML components are finished -->
                <form class="form-horizontal" method="post" action="index.php#contact" name="contactForm">
                    <div class="form-group">
                        <label for="contactName" class="col-sm-4 control-label">Company or Brand Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="contactName" placeholder="Name" value="<?= $formData['contactName']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contactEmail" class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="contactEmail" placeholder="user@host.com" value="<?=$formData['contactEmail']?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="productDetails" class="col-sm-4 control-label">Provide further detail about your product:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="productDetails" rows="3"><?=$formData['contactDetails']?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input class="btn btn-lg" type="submit" id="contactSubmit" name="sent" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</section>