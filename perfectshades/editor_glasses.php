<?php
require_once("utils.php");
$categories = getAllCategories();
$colors = getAllColors();
$manufacturers = getAllManufacturers();
?>

<div class="modal fade" id="EditGlassesModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Edit Glasses</h3>
            </div>

            <div class="modal-body">
                <form id="EditGlassesForm" class="form-horizontal" method="post" action="tables_processing.php">
                    <input type="hidden" name="frmname" value="EditGlasses"/>
                    <label>Glasses ID:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <input readonly id="glasses_id" type="text" class="form-control" name="glasses_id">
                    </div>
                    <label>Category Name:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                            <select class="form-control" id="category_name" name="category_name">
                                <?php foreach ($categories as $category) {
                                    echo "<option value='".$category->id."'>".$category->name."</option>";
                                }?>
                            </select>
                    </div>
                    <label>Manufacturer Name:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <select class="form-control" id="manufacturer_name" name="manufacturer_name">
                                <?php foreach ($manufacturers as $manufacturer) {
                                    echo "<option value='".$manufacturer->id."'>".$manufacturer->name."</option>";
                                }?>
                            </select>
                    </div>
                    <label>Model Number:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="model_number" type="text" class="form-control" name="model_number">
                    </div>
                    <label>Color Description:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <select class="form-control" id="color_description" name="color_description">
                                <?php foreach ($colors as $color) {
                                    echo "<option value='".$color->id."'>".$color->description."</option>";
                                }?>
                            </select>
                    </div>
                    <label>Gender:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="gender" type="text" class="form-control" name="gender">
                    </div>
                    <label>Description:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="description" type="text" class="form-control" name="description" placeholder="Enter Glass Description">
                    </div>
                    <label>Price:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input id="price" type="text" class="form-control" name="price">
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
