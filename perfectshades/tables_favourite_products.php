<?php 
include_once "editor_favourite_products.php";
require_once("admin_header.php");
require_once("favourite_products.php");
require_once("favourite_products_bo.php");
require_once("utils.php");

$tables_category = array("table_name" => "Category", "link" => "tables_category.php", "status"=>"");
$tables_color = array("table_name" => "Color", "link" => "tables_color.php", "status"=>"");
$tables_face_pairing = array("table_name" => "Face Pairing", "link" => "tables_face_pairing.php", "status"=>"");
$tables_face_shapes = array("table_name" => "Face Shapes", "link" => "tables_face_shapes.php", "status"=>"");
$tables_favourite_products = array("table_name" => "Favourite Products", "link" => "tables_favourite_products.php", "status"=>"active");
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

$favourites = getAllFavouriteProducts();

function displayFavourite($favourites){
    foreach ($favourites as $favourite) {
        $user_id=$favourite->user_id;
        $glasses_id=$favourite->glasses_id;
        $user_name = findUserById($user_id);
        $glasses_model_number = findGlassesById($glasses_id);
        echo "<tr>
                <td>".$user_name."</td>
                <td>".$glasses_model_number."</td>
                <td><a href='#editor_favourite_products' class='open-EditFavouriteProductsDialog btn btn-xs btn-primary' data-toggle='modal' data-target='#EditFavouriteProductsModal' role='button'
                    data-user-id='".$user_id."'
                    data-glasses-id='".$glasses_id."'>Edit</a>
                <a href='tables_processing.php?user_id=".$user_id."&glasses_id=".$glasses_id."&action=DeleteFavouriteProducts' class='btn btn-xs btn-danger'>Delete</a></td>
            </tr>";
    }
}

function findUserById($user_id){
    $constraintList = array();
    $constraint = array(UsersBO::ID, BusinessObjectBase::EQUAL, $user_id);
    $constraintList[] = $constraint;

    //Create BO object of appropriate class and pass above created object to it in argument

    $users_bo = new UsersBO(null);

    //From the BO call the appropriate function and pass the constraint List
    $data = $users_bo->getSelectedData($constraintList);
    return $data[0]->name;
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
                <a class="navbar-brand" href="#admin">Admin</a>
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
                            Tables - Favourite Products
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
                                        <th>User Name</th>
                                        <th>Glasses Model Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php displayFavourite($favourites);?>
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
        $(document).on("click", ".open-EditFavouriteProductsDialog", function () {
        var userId = $(this).data('user-id');
        var glassesId = $(this).data('glasses-id');
        $(".modal-body #user_name").val( userId );
        $(".modal-body #glasses_model_number").val( glassesId );
    });
    </script>

</body>

</html>
