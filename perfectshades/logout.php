<div class="modal fade" id="LogoutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Logout</h3>
            </div>

            <form id="logout_form" class="form-horizontal" method="post" action="index.php" name="logout_form">
                <div id="login_error"></div>
                <div class="modal-body">
                    <i class="fa fa-question-circle"></i> Are you sure you want to logout?
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name = "logout" value="logout">Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>
