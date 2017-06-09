<?php 
require_once("categories.php");
require_once ("categories_bo.php");
require_once ("face_shapes.php");
require_once ("face_shapes_bo.php");
require_once("colors_bo.php");
require_once("colors.php");
require_once("manufacturers_bo.php");
require_once("manufacturers.php");
require_once("glasses_bo.php");
require_once("glasses.php");
require_once("users.php");
require_once("users_bo.php");

function getAllCategories(){
    $categoriesBO = new CategoriesBO(null);
    $categories = $categoriesBO->getAllData();
    return $categories;
}

function getAllFaceShapes(){
    $face_shapes_bo = new FaceShapesBO(null);
    $face_shapes = $face_shapes_bo->getAllData();
    return $face_shapes;
}

function getAllColors(){
    $colorsBO =new ColorsBO(null);
    $colors = $colorsBO->getAllData();
    return $colors;
}

function getAllFacePairings(){
    $face_pairing_bo = new FacePairingsBO(null);
    $face_pairings =$face_pairing_bo->getAllData();
    return $face_pairings;
}

function getAllFavouriteProducts(){
    $favouriteProductBO = new FavouriteProductBO(null);
    $favourites = $favouriteProductBO->getAllData();
    return $favourites;
}

function getAllGlasses(){
    $glassesBO = new GlassesBO(null);
    $glasses = $glassesBO->getAllData();
    return $glasses;
}

function getAllManufacturers(){
    $manufacturersBO = new ManufacturersBO(null);
    $manufacturers = $manufacturersBO->getAllData();
    return $manufacturers;
}

function getAllUsers(){
    $usersBO = new UsersBO(null);
    $users = $usersBO->getAllData();
    return $users;
}

function getAllComments(){
    $commentsBO = new CommentsBO(null);
    $comments = $commentsBO->getAllData();
    return $comments;
}

function getAllWebResources(){
    $webResourcesBO = new WebResourcesBO(null);
    $webResources = $webResourcesBO->getAllData();
    return $webResources;
}

function findFaceShapeById($face_shape_id){
    $constraintList = array();
    $constraint = array(FaceShapesBO::ID, BusinessObjectBase::EQUAL, $face_shape_id);
    $constraintList[] = $constraint;

    //Create BO object of appropriate class and pass above created object to it in argument

    $face_shapes_bo = new FaceShapesBO(null);

    //From the BO call the appropriate function and pass the constraint List
    $data = $face_shapes_bo->getSelectedData($constraintList);
    return $data[0]->shape;
}

function findCategoryById($category_id){
    $constraintList = array();
    $constraint = array(CategoriesBO::ID, BusinessObjectBase::EQUAL, $category_id);
    $constraintList[] = $constraint;

    //Create BO object of appropriate class and pass above created object to it in argument

    $categories_bo = new CategoriesBO(null);

    //From the BO call the appropriate function and pass the constraint List
    $data = $categories_bo->getSelectedData($constraintList);
    return $data[0]->name;
}

function findManufacturerById($manufacturer_id){
    $constraintList = array();
    $constraint = array(ManufacturersBO::ID, BusinessObjectBase::EQUAL, $manufacturer_id);
    $constraintList[] = $constraint;

    //Create BO object of appropriate class and pass above created object to it in argument

    $manufacturers_bo = new ManufacturersBO(null);

    //From the BO call the appropriate function and pass the constraint List
    $data = $manufacturers_bo->getSelectedData($constraintList);
    return $data[0]->name;
}

function findColorById($color_id){
    $constraintList = array();
    $constraint = array(ColorsBO::ID, BusinessObjectBase::EQUAL, $color_id);
    $constraintList[] = $constraint;

    //Create BO object of appropriate class and pass above created object to it in argument

    $colors_bo = new ColorsBO(null);

    //From the BO call the appropriate function and pass the constraint List
    $data = $colors_bo->getSelectedData($constraintList);
    return $data[0]->description;
}

function findGlassesById($glasses_id){
    $constraintList = array();
    $constraint = array(GlassesBO::ID, BusinessObjectBase::EQUAL, $glasses_id);
    $constraintList[] = $constraint;

    //Create BO object of appropriate class and pass above created object to it in argument

    $glasses_bo = new GlassesBO(null);

    //From the BO call the appropriate function and pass the constraint List
    $data = $glasses_bo->getSelectedData($constraintList);
    return $data[0]->model_number;
}

function displayTables($tableList)
    {
        foreach($tableList as $table) {
        	if($table["status"]=="active")
        	{
            	echo "<li class='active'>";
            } else {
            	echo "<li>";
            }
            echo "
                     <a href=".$table["link"].">".$table["table_name"]."</a>
                  </li>";

        }

    };

?>