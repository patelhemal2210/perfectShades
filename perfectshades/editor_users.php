<?php
require_once("utils.php");
$face_shapes = getAllFaceShapes();
?>

<div class="modal fade" id="EditUsersModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Edit Users</h3>
            </div>

            <div class="modal-body">
                <form id="EditUserForm" class="form-horizontal" method="post" action="tables_processing.php">
                    <input type="hidden" name="frmname" value="EditUsers"/>
                    <label>User ID:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input readonly id="user_id" type="text" class="form-control" name="user_id">
                    </div>
                    <label>Email:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="text" class="form-control" name="email" placeholder="Enter Email">
                    </div>
                    <label>User Name:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Enter Name">
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
                    <label>Admin Privilege:</label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="admin_privilege" type="text" class="form-control" name="admin_privilege">
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
