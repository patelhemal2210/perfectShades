<?php
include_once "editor_face_shapes.php";
require_once("admin_header.php");
require_once("face_shapes.php");
require_once("face_shapes_bo.php");
require_once("utils.php");
$tables_category = array("table_name" => "Category", "link" => "tables_category.php", "status"=>"");
$tables_color = array("table_name" => "Color", "link" => "tables_color.php", "status"=>"");
$tables_face_pairing = array("table_name" => "Face Pairing", "link" => "tables_face_pairing.php", "status"=>"");
$tables_face_shapes = array("table_name" => "Face Shapes", "link" => "tables_face_shapes.php", "status"=>"active");
$tables_favourite_products = array("table_name" => "Favourite Products", "link" => "tables_favourite_products.php", "status"=>"");
$tables_glasses = array("table_name" => "Glasses", "link" => "tables_glasses.php", "status"=>"");
$tables_manufacturers = array("table_name" => "Manufacturers", "link" => "tables_manufacturers.php", "status"=>"");
$tables_users = array("table_name" => "Users", "link" => "tables_users.php", "status"=>""); 
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

$faceShapes = getAllFaceShapes();

function displayFaceShapes($faceShapes){
    foreach ($faceShapes as $faceShape) {
        $id=$faceShape->id;
        $shape=$faceShape->shape;
        echo "<tr>
                <td>".$id."</td>
                <td>".$shape."</td>
                <td><a href='#editor_face_shapes' class='open-EditFaceShapeDialog btn btn-xs btn-primary' data-toggle='modal' data-target='#EditFaceShapeModal' role='button'
                data-face-id='".$id."'
                data-face-shape='".$shape."'
                >Edit</a>
                <a href='tables_processing.php?id=".$id."
                                              &shape=".$shape."
                                              &action=DeleteFaceShape' 
                    class='btn btn-xs btn-danger'>Delete</a></td>
            </tr>";
    }
};
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
                            Tables - FaceShapes
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
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Face Shape ID</th>
                                        <th>Shape Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php displayFaceShapes($faceShapes);?>
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
        $(document).on("click", ".open-EditFaceShapeDialog", function () {
            var faceID = $(this).data('face-id');
            var faceShape = $(this).data('face-shape');

            $(".modal-body #face_shape_id").val( faceID );
            $(".modal-body #face_shape_name").val( faceShape );

        });
    </script>

</body>

</html>
