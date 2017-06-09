<div class="modal fade" id="EditFaceShapeModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Edit Face Shape</h3>
            </div>

            <div class="modal-body">
                <form id="EditFaceShapeForm" class="form-horizontal" method="post" action="tables_processing.php">
                    <input type="hidden" name="frmname" value="EditFaceShapes"/>
                    <label>Face Shape ID:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <input readonly id="face_shape_id" type="text" class="form-control" name="face_shape_id">
                    </div>
                    <label>Face Shape Name:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="face_shape_name" type="text" class="form-control" name="face_shape_name" placeholder="Enter Face Shape">
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
