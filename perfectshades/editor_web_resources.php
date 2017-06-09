<div class="modal fade" id="EditWebResourcesModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Edit Web Resources</h3>
            </div>

            <div class="modal-body">
                <form id="EditWebResourcesForm" class="form-horizontal" method="post" action="tables_processing.php">
                    <input type="hidden" name="frmname" value="EditWebResources"/>
                    <label>Glasses ID:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <input readonly id="glasses_id" type="text" class="form-control" name="glasses_id">
                    </div>
                    <label>URL:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="url" type="text" class="form-control" name="url" placeholder="Enter the URL of the Glass">
                    </div>
                    <label>ASIN:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="asin" type="text" class="form-control" name="asin" placeholder="Enter the asin of the Glass">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
