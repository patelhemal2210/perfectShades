<?php
include_once "editor_glasses.php";
require_once("admin_header.php");
require_once("glasses.php");
require_once("glasses_bo.php");
require_once("utils.php");

$tables_category = array("table_name" => "Category", "link" => "tables_category.php", "status"=>"");
$tables_color = array("table_name" => "Color", "link" => "tables_color.php", "status"=>"");
$tables_face_pairing = array("table_name" => "Face Pairing", "link" => "tables_face_pairing.php", "status"=>"");
$tables_face_shapes = array("table_name" => "Face Shapes", "link" => "tables_face_shapes.php", "status"=>"");
$tables_favourite_products = array("table_name" => "Favourite Products", "link" => "tables_favourite_products.php", "status"=>"");
$tables_glasses = array("table_name" => "Glasses", "link" => "tables_glasses.php", "status"=>"active");
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
$glasses = getAllGlasses();

function displayGlasses($glasses){
    foreach ($glasses as $glass) {
        $id=$glass->id;
        $category_id=$glass->category_id;
        $manufacturer_id=$glass->manufacturer_id;
        $model_number=$glass->model_number;
        $color_id=$glass->color_id;
        $gender=$glass->gender;
        $description=$glass->description;
        $price=$glass->price;
        $category_name = findCategoryById($category_id);
        $manufacturer_name = findManufacturerById($manufacturer_id);
        $color_description = findColorById($color_id);
        echo "<tr>
                <td>".$id."</td>
                <td>".$category_name."</td>
                <td>".$manufacturer_name."</td>
                <td>".$model_number."</td>
                <td>".$color_description."</td>
                <td>".$gender."</td>
                <td>".$description."</td>
                <td>".$price."</td>
                <td><a href='#editor_glasses' class='open-EditGlassesDialog btn btn-xs btn-primary' data-toggle='modal' data-target='#EditGlassesModal' role='button'
                data-id='".$id."'
                data-category-id='".$category_id."'
                data-manufacturer-id='".$manufacturer_id."'
                data-model-number='".$model_number."'
                data-color-id='".$color_id."'
                data-gender='".$gender."'
                data-description='".$description."'
                data-price='".$price."'>Edit</a>
                <a href='tables_processing.php?id=".$id."&action=DeleteGlass' class='btn btn-xs btn-danger'>Delete</button></td>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Lynn <b class="caret"></b></a>
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
                            Tables - Glasses
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
                                        <th>Glasses ID</th>
                                        <th>Category Name</th>
                                        <th>Manufacturer Name</th>
                                        <th>Model Number</th>
                                        <th>Color Description</th>
                                        <th>Gender</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php displayGlasses($glasses);?>
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
        $(document).on("click", ".open-EditGlassesDialog", function () {
        var id = $(this).data('id');
        var categoryId = $(this).data('category-id');
        var manufactureId = $(this).data('manufacturer-id');
        var modelNumber = $(this).data('model-number');
        var colorId = $(this).data('color-id');
        var gender = $(this).data('gender');
        var description = $(this).data('description');
        var price = $(this).data('price');
        $(".modal-body #glasses_id").val( id );
        $(".modal-body #category_name").val( categoryId );
        $(".modal-body #manufacturer_name").val( manufactureId );
        $(".modal-body #model_number").val( modelNumber );
        $(".modal-body #color_description").val( colorId );
        $(".modal-body #gender").val( gender );
        $(".modal-body #description").val( description );
        $(".modal-body #price").val( price );
    });
    </script>

</body>

</html>
