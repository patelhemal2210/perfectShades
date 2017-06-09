<?php
require_once("utils.php");
$users = getAllUsers();
$glasses = getAllGlasses();
?>
<div class="modal fade" id="EditFavouriteProductsModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Edit Favourite Products</h3>
            </div>

            <div class="modal-body">
                <form id="EditFavouriteProductsForm" class="form-horizontal" method="post" action="tables_processing.php">
                    <input type="hidden" name="frmname" value="EditFavouriteProducts"/>
                    <label>User Name:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select class="form-control" id="user_name" name="user_name">
                                <?php foreach ($users as $user) {
                                    echo "<option value='".$user->id."'>".$user->name."</option>";
                                }?>
                        </select>
                    </div>
                    <label>Glasses Model Number:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" id="glasses_model_number" name="glasses_model_number">
                                <?php foreach ($glasses as $glass) {
                                    echo "<option value='".$glass->id."'>".$glass->model_number."</option>";
                                }?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
