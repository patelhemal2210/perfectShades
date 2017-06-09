<?php
include_once "editor_users.php";
require_once("admin_header.php");
require_once("users.php");
require_once("users_bo.php");
require_once("utils.php");
$tables_category = array("table_name" => "Category", "link" => "tables_category.php", "status"=>"");
$tables_color = array("table_name" => "Color", "link" => "tables_user.php", "status"=>"");
$tables_face_pairing = array("table_name" => "Face Pairing", "link" => "tables_face_pairing.php", "status"=>"");
$tables_face_shapes = array("table_name" => "Face Shapes", "link" => "tables_face_shapes.php", "status"=>"");
$tables_favourite_products = array("table_name" => "Favourite Products", "link" => "tables_favourite_products.php", "status"=>"");
$tables_glasses = array("table_name" => "Glasses", "link" => "tables_glasses.php", "status"=>"");
$tables_manufacturers = array("table_name" => "Manufacturers", "link" => "tables_manufacturers.php", "status"=>"");
$tables_users = array("table_name" => "Users", "link" => "tables_users.php", "status"=>"active"); 
$tables_web_resources = array("table_name" => "Web Resources", "link" => "tables_web_resources.php", "status"=>"");    
$tables = array();
$tables[] = $tables_category;
$tables[] = $tables_color;
$tables[] = $tables_face_pairing;
$tables[] = $tables_face_shapes;
$tables[] = $tables_favourite_products;
$tables[] = $tables_glasses;
$tables[] = $tables_manufacturers;
$tables[] = $tables_users;
$tables[] = $tables_web_resources;

$users = getAllUsers();


function displayUsers($users){
    foreach ($users as $user) {
        $id=$user->id;
        $email=$user->email;
        $name=$user->name;
        $face_shape_id=$user->face_shape_id;
        $admin_privilege=$user->admin_privilege;
        echo "<tr>
                <td>".$id."</td>
                <td>".$email."</td>
                <td>".$name."</td>
                <td>".$face_shape_id."</td>
                <td>".$admin_privilege."</td>
                <td><a href='#editor_user' class='open-EditUsersDialog btn btn-xs btn-primary' data-toggle='modal' data-target='#EditUsersModal' role='button'
                data-id='".$id."'
                data-email='".$email."'
                data-name='".$name."'
                data-face-shape-id='".$face_shape_id."'
                data-admin-privilege='".$admin_privilege."'>Edit</a>
                <a href='tables_processing.php?id=".$id."&action=DeleteUser' class='btn btn-xs btn-danger'>Delete</a></td>
            </tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("admin_header.php");
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Lynn<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#tables">
                            <i class="fa fa-fw fa-table"></i> Tables <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="tables">
                            <?php displayTables($tables);?>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tables - Users
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Tables
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Email</th>
                                        <th>Name</th>                                     
                                        <th>Face Shape</th>
                                        <th>Privilege</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php displayUsers($users);?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="page-header">
                </div>
                <div class="well">
                    <p> © 2016 Perfect Shades, Inc.</p>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).on("click", ".open-EditUsersDialog", function () {
        var id = $(this).data('id');
        var email = $(this).data('email');
        var name = $(this).data('name');
        var faceShapeId = $(this).data('face-shape-id');
        var adminPrivilege = $(this).data('admin-privilege');
        $(".modal-body #user_id").val( id );
        $(".modal-body #email").val( email );
        $(".modal-body #name").val( name );
        $(".modal-body #face_shape_name").val( faceShapeId );
        $(".modal-body #admin_privilege").val( adminPrivilege );
    });
    </script>

</body>

</html>
