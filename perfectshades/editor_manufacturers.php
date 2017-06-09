<div class="modal fade" id="EditManufacturersModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Edit Manufacturers</h3>
            </div>

            <div class="modal-body">
                <form id="EditManufacturersForm" class="form-horizontal" method="post" action="tables_processing.php">
                    <input type="hidden" name="frmname" value="EditManufacturer"/>
                    <label>Manufacturer ID:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <input readonly id="manufacturer_id" type="text" class="form-control" name="manufacturer_id">
                    </div>
                    <label>Manufacturer Name:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="manufacturer_name" type="text" class="form-control" name="manufacturer_name" placeholder="Enter Manufacture Name">
                    </div>
                    <label>Website:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="website" type="text" class="form-control" name="website" placeholder="Enter Website">
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
