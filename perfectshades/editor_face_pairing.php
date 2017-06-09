<?php 
require_once("utils.php");
$categories = getAllCategories();
$face_shapes = getAllFaceShapes();
?>
<div class="modal fade" id="EditFacePairingModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Edit Face Pairing</h3>
            </div>

            <div class="modal-body">
                <form id="EditFacePairingForm" class="form-horizontal" method="post" action="tables_processing.php">
                    <input type="hidden" name="frmname" value="EditFacePairing"/>
                    <label>Category Name:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                            <select class="form-control" id="category_name" name="category_name">
                                <?php foreach ($categories as $category) {
                                    echo "<option value='".$category->id."'>".$category->name."</option>";
                                }?>
                            </select>
                    </div>
                    <label>Face Shape Name:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                            <select class="form-control" id="face_shape_name" name="face_shape_name">
                                <?php foreach ($face_shapes as $face_shape) {
                                    echo "<option value='".$face_shape->id."'>".$face_shape->shape."</option>";
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
