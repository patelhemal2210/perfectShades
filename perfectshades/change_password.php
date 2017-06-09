<div class="modal fade" id="change_password_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Change Your Password</h3>
            </div>

            <div class="modal-body">
                <form id="change_password_form" onsubmit="" name="change_password_form" class="form-horizontal" method="post" action="">
					<div id="ChangePassword_error"></div>
                    <?php if(!empty($errorMessage)){ ?>
                    <div style="margin-bottom: 25px" class="input-group">
                        <p class="has-error"><?php echo htmlspecialchars($errorMessage);?></p>
                    </div>
                    <?php } ?>
                    <div style="margin-bottom: 25px" class="input-group has-error" id="ChangePassword_email_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="ChangePasswordEmail" type="email" class="form-control" name="email" placeholder="Enter your email" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group has-error" id="ChangePassword_password_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="ChangePasswordPassword" type="password" class="form-control" name="password" placeholder="Enter your current password" required>
                    </div>
					<div style="margin-bottom: 25px" class="input-group has-error" id="ChangePassword_new_password_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="ChangePasswordPassword" type="password" class="form-control" name="password" placeholder="Enter your new password" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group has-error" id="ChangePassword_confirm_new_password_group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="ChangePasswordConfirmPassword" type="password" class="form-control"  name="confirmpassword" placeholder="Confirm your new password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="ChangePassword_submit" class="btn btn-primary">Change Password</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
