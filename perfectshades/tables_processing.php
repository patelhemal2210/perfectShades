<?php
require_once("categories.php");
require_once ("categories_bo.php");
require_once ("colors.php");
require_once ("colors_bo.php");
require_once ("face_pairings.php");
require_once ("face_pairings_bo.php");
require_once ("face_shapes.php");
require_once ("face_shapes_bo.php");
require_once ("glasses.php");
require_once ("glasses_bo.php");
require_once ("favourite_products.php");
require_once ("favourite_products_bo.php");
require_once ("users.php");
require_once ("users_bo.php");
require_once ("manufacturers.php");
require_once ("manufacturers_bo.php");
require_once ("webresources.php");
require_once ("web_resources_bo.php");
require_once("utils.php");

$form_name=isset($_POST['frmname'])?$_POST['frmname']:null;
$action=isset($_GET['action'])?$_GET['action']:null;
consoleLog($form_name);

if($action!=null){
	if($action=="DeleteCategory"){
		$id=isset($_GET['id']) ? $_GET['id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(CategoriesBO::ID, BusinessObjectBase::EQUAL, $id);
		$constraintList[] = $constraint;
		//Create BO object of appropriate class and pass above created object to it in argument
		//From the BO call the appropriate function and pass the constraint List
		$categoriesBO = new CategoriesBO(null);
		if($categoriesBO->deleteFromTable($constraintList)){
			include('tables_category.php');
		} else {
			echo "Unable to delete Category!";
		}
	} else if($action=="DeleteColor"){
		$id=isset($_GET['id']) ? $_GET['id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(ColorsBO::ID, BusinessObjectBase::EQUAL, $id);
		$constraintList[] = $constraint;
		//Create BO object of appropriate class and pass above created object to it in argument
		//From the BO call the appropriate function and pass the constraint List
		$colorsBO = new ColorsBO(null);
		if($colorsBO->deleteFromTable($constraintList)){
			include('tables_color.php');
		} else {
			echo "Unable to delete Color!";
		}
	} else if($action=="DeleteFacePairing"){
		$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
		$face_shape_id = isset($_GET['face_shape_id']) ? $_GET['face_shape_id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint1 = array(FacePairingsBO::CATEGORY_ID, BusinessObjectBase::EQUAL, $category_id);
		$operator = BusinessObjectBase::ANDOPERATOR;
		$constraint2 = array(FacePairingsBO::FACE_SHAPE_ID, BusinessObjectBase::EQUAL, $face_shape_id);

		$constraintList[] = $constraint1;
		$constraintList[] = $operator;
		$constraintList[] = $constraint2;

		//Create BO object of appropriate class and pass above created object to it in argument

		$face_pairings_bo = new FacePairingsBO(null);

		//From the BO call the appropriate function and pass the constraint List
		if($face_pairings_bo->deleteFromTable($constraintList)){
			include('tables_face_pairing.php');
		} else {
			echo "Unable to delete Face Pairing!";
		}
	} else if($action=="DeleteFaceShape"){
		$deleteid=isset($_GET['id']) ? $_GET['id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(FaceShapesBO::ID, BusinessObjectBase::EQUAL, $deleteid);
		$constraintList[] = $constraint;
		//Create BO object of appropriate class and pass above created object to it in argument
		//From the BO call the appropriate function and pass the constraint List
		$face_shapes_bo = new FaceShapesBO(null);
		if($face_shapes_bo->deleteFromTable($constraintList)){
			include('tables_face_shapes.php');
		} else {
			echo "Unable to delete Face Shape!";
		}
	} else if($action=="DeleteFavouriteProducts"){
		$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
		$glasses_id = isset($_GET['glasses_id']) ? $_GET['glasses_id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint1 = array(FavouriteProductBO::USER_ID, BusinessObjectBase::EQUAL, $user_id);
		$operator = BusinessObjectBase::ANDOPERATOR;
		$constraint2 = array(FavouriteProductBO::GLASSES_ID, BusinessObjectBase::EQUAL, $glasses_id);

		$constraintList[] = $constraint1;
		$constraintList[] = $operator;
		$constraintList[] = $constraint2;
		//Create BO object of appropriate class and pass above created object to it in argument
		//From the BO call the appropriate function and pass the constraint List
		$favourites_bo = new FavouriteProductBO(null);
		if($favourites_bo->deleteFromTable($constraintList)){
			include('tables_favourite_products.php');
		} else {
			echo "Unable to delete Favourite Products!";
		}
	} else if($action=="DeleteGlass"){
		$id=isset($_GET['id']) ? $_GET['id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(GlassesBO::ID, BusinessObjectBase::EQUAL, $id);
		$constraintList[] = $constraint;
		//Create BO object of appropriate class and pass above created object to it in argument
		//From the BO call the appropriate function and pass the constraint List
		$glasses_bo = new GlassesBO(null);
		if($glasses_bo->deleteFromTable($constraintList)){
			include('tables_glasses.php');
		} else {
			echo "Unable to delete Glass!";
		}
	} else if($action=="DeleteManufacturer"){
		$id=isset($_GET['id']) ? $_GET['id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(ManufacturersBO::ID, BusinessObjectBase::EQUAL, $id);
		$constraintList[] = $constraint;
		//Create BO object of appropriate class and pass above created object to it in argument
		//From the BO call the appropriate function and pass the constraint List
		$manufacturersBO = new ManufacturersBO(null);
		if($manufacturersBO->deleteFromTable($constraintList)){
			include('tables_manufacturers.php');
		} else {
			echo "Unable to delete Manufacturers!";
		}
	} else if($action=="DeleteUsers"){
		$id=isset($_GET['id']) ? $_GET['id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(UsersBO::ID, BusinessObjectBase::EQUAL, $id);
		$constraintList[] = $constraint;
		//Create BO object of appropriate class and pass above created object to it in argument
		//From the BO call the appropriate function and pass the constraint List
		$users_bo = new UsersBO(null);
		if($users_bo->deleteFromTable($constraintList)){
			include('tables_users.php');
		} else {
			echo "Unable to delete User!";
		}
	} else if($action=="DeleteWebResource"){
		$id=isset($_GET['id']) ? $_GET['id'] : null;
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(WebResourcesBO::GLASSES_ID, BusinessObjectBase::EQUAL, $id);
		$constraintList[] = $constraint;
		//Create BO object of appropriate class and pass above created object to it in argument
		//From the BO call the appropriate function and pass the constraint List
		$web_resources_bo = new WebResourcesBO(null);
		if($web_resources_bo->deleteFromTable($constraintList)){
			include('tables_web_resources.php');
		} else {
			echo "Unable to delete Web Resource!";
		}
	}
}


if($form_name!=null){
	if($form_name=="EditCategory"){
		$category_id=isset($_POST['category_id']) ? $_POST['category_id'] : null;
		$category_name=isset($_POST['category_name'])?$_POST['category_name']:null;

		//Create object of the table you want to create

		$category = new Categories();

		//Only set the value you want to update leaving the other values intact
		$category->setName($category_name);

		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(CategoriesBO::ID, BusinessObjectBase::EQUAL, $category_id);
		$constraintList[] = $constraint;

		//Create BO object of appropriate class and pass above created object to it in argument

		$categories_bo = new CategoriesBO($category);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($categories_bo->updateTable($constraintList))
		{
			include('tables_category.php');
		} else {
			echo "Unable to update Category!";
		}
	} else if($form_name=="EditColor"){
		$color_id=isset($_POST['color_id']) ? $_POST['color_id'] : null;
		$color_description=isset($_POST['color_description'])?$_POST['color_description']:null;

		//Create object of the table you want to create

		$color = new Colors();

		//Only set the value you want to update leaving the other values intact
		$color->setDescription($color_description);

		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(ColorsBO::ID, BusinessObjectBase::EQUAL, $color_id);
		$constraintList[] = $constraint;

		//Create BO object of appropriate class and pass above created object to it in argument

		$colors_bo = new ColorsBO($color);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($colors_bo->updateTable($constraintList))
		{
			include('tables_color.php');
		} else {
			echo "Unable to update Color!";
		}
	} else if($form_name=="EditFacePairing"){
		$face_shape_id=isset($_POST['face_shape_id']) ? $_POST['face_shape_id'] : null;
		$category_id=isset($_POST['category_id'])?$_POST['category_id']:null;

		//Create object of the table you want to create

		$face_pairing = new FacePairings();

		//Only set the value you want to update leaving the other values intact
		$face_pairing->setFaceShapeId($face_shape_id);
		$face_pairing->setCategoryId($category_id);

		$constraintList = array();

		$constraint1 = array(FacePairingsBO::CATEGORY_ID, BusinessObjectBase::EQUAL, $category_id);
		$operator = BusinessObjectBase::ANDOPERATOR;
		$constraint2 = array(FacePairingsBO::FACE_SHAPE_ID, BusinessObjectBase::EQUAL, $face_shape_id);

		$constraintList[] = $constraint1;
		$constraintList[] = $operator;
		$constraintList[] = $constraint2;

		//Create BO object of appropriate class and pass above created object to it in argument

		$face_pairing_bo = new FacePairingsBO($face_pairing);

		//From the BO call the appropriate function and pass the constraint List
		$face_pairing_bo->updateTable($constraintList);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($face_pairing_bo->updateTable($constraintList))
		{
			include("tables_face_pairing.php");
		} else {
			echo "Unable to update Face Pairing!";
		}
	} else if($form_name=="EditFaceShapes"){
		$face_shape_id=isset($_POST['face_shape_id']) ? $_POST['face_shape_id'] : null;
		$face_shape_name=isset($_POST['face_shape_name'])?$_POST['face_shape_name']:null;

		//Create object of the table you want to create

		$face_shape = new FaceShapes();

		//Only set the value you want to update leaving the other values intact
		$face_shape->setShape($face_shape_name);

		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(FaceShapesBO::ID, BusinessObjectBase::EQUAL, $face_shape_id);
		$constraintList[] = $constraint;

		//Create BO object of appropriate class and pass above created object to it in argument

		$face_shapes_bo = new FaceShapesBO($face_shape);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($face_shapes_bo->updateTable($constraintList))
		{
			include('tables_face_shapes.php');
		} else {
			echo "Unable to update Face Shape!";
		}
	} else if($form_name=="EditFavouriteProducts"){
		$user_id=isset($_POST['user_id']) ? $_POST['user_id'] : null;
		$glasses_id=isset($_POST['glasses_id'])?$_POST['glasses_id']:null;

		//Create object of the table you want to create

		$favourite_product = new FavouriteProducts();

		//Only set the value you want to update leaving the other values intact
		$favourite_product->setUserId($user_id);
		$favourite_product->setGlassesId($glasses_id);

		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(FavouriteProductBO::USER_ID, BusinessObjectBase::EQUAL, $user_id);
		$constraintList[] = $constraint;

		//Create BO object of appropriate class and pass above created object to it in argument

		$favourite_product_bo = new FavouriteProductBO($favourite_product);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($favourite_product_bo->updateTable($constraintList))
		{
			include("tables_favourite_products.php");
		} else {
			echo "Unable to update Favourite Products!";
		}
	} else if($form_name=="EditGlasses"){
		$glasses_id=isset($_POST['glasses_id']) ? $_POST['glasses_id'] : null;
		$category_id=isset($_POST['category_name'])?$_POST['category_name']:null;
		$manufacturer_id=isset($_POST['manufacturer_name'])?$_POST['manufacturer_name']:null;
		$model_number=isset($_POST['model_number'])?$_POST['model_number']:null;
		$color_id=isset($_POST['color_description'])?$_POST['color_description']:null;
		$gender=isset($_POST['gender'])?$_POST['gender']:null;
		$description=isset($_POST['description'])?$_POST['description']:null;
		$price=isset($_POST['price'])?$_POST['price']:" ";

		//Create object of the table you want to create

		$glasses = new Glasses();
		consoleLog($category_id);
		consoleLog($manufacturer_id);
		consoleLog($color_id);
		//Only set the value you want to update leaving the other values intact
		$glasses->setCategoryId($category_id);
		$glasses->setManufacturerId($manufacturer_id);
		$glasses->setModelNumber($model_number);
		$glasses->setColorId($color_id);
		$glasses->setGender($gender);
		$glasses->setDescription($description);
		$glasses->setPrice($price);

		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(GlassesBO::ID, BusinessObjectBase::EQUAL, $glasses_id);
		$constraintList[] = $constraint;

		//Create BO object of appropriate class and pass above created object to it in argument

		$glasses_bo = new GlassesBO($glasses);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($glasses_bo->updateTable($constraintList))
		{
			include("tables_glasses.php");
		} else {
			echo "Unable to update Glasses!";
		}
	} else if($form_name=="EditManufacturer"){
		$manufacturer_id=isset($_POST['manufacturer_id']) ? $_POST['manufacturer_id'] : null;
		$manufacturer_name=isset($_POST['manufacturer_name'])?$_POST['manufacturer_name']:null;
		$website=isset($_POST['website'])?$_POST['website']:null;

		//Create object of the table you want to create

		$manufacturer = new Manufacturers();

		//Only set the value you want to update leaving the other values intact
		$manufacturer->setName($manufacturer_name);
		$manufacturer->setWebsite($website);

		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(ManufacturersBO::ID, BusinessObjectBase::EQUAL, $manufacturer_id);
		$constraintList[] = $constraint;

		//Create BO object of appropriate class and pass above created object to it in argument

		$manufacturers_bo = new ManufacturersBO($manufacturer);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($manufacturers_bo->updateTable($constraintList))
		{
			include('tables_manufacturers.php');
		} else {
			echo "Unable to update Manufacturers!";
		}
	} else if($form_name=="EditUsers"){
		$user_id=isset($_POST['user_id']) ? $_POST['user_id'] : null;
		$name=isset($_POST['name'])?$_POST['name']:null;
		$email=isset($_POST['email'])?$_POST['email']:null;
		$face_shape_id=isset($_POST['face_shape_name'])?$_POST['face_shape_name']:null;
		$admin_privilege=isset($_POST['admin_privilege'])?$_POST['admin_privilege']:null;

		//Create object of the table you want to create

		$user = new Users();

		//Only set the value you want to update leaving the other values intact
		$user->setName($name);
		$user->setEmail($email);
		$user->setFaceShapeId($face_shape_id);
		$user->setAdminPrivilege($admin_privilege);

		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(UsersBO::ID, BusinessObjectBase::EQUAL, $user_id);
		$constraintList[] = $constraint;

		//Create BO object of appropriate class and pass above created object to it in argument

		$users_bo = new UsersBO($user);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($users_bo->updateTable($constraintList))
		{
			include('tables_users.php');
		} else {
			echo "Unable to update User!";
		}
	} else if($form_name=="EditWebResources"){
		$glasses_id=isset($_POST['glasses_id']) ? $_POST['glasses_id'] : null;
		$url=isset($_POST['url'])?$_POST['url']:null;
		$asin=isset($_POST['asin'])?$_POST['asin']:null;

		//Create object of the table you want to create

		$web_resource = new WebResources();

		//Only set the value you want to update leaving the other values intact
		$web_resource->setUrl($url);
		$web_resource->setASIN($asin);
		
		//Create contraint required to find the unique record
		$constraintList = array();
		$constraint = array(WebResourcesBO::GLASSES_ID, BusinessObjectBase::EQUAL, $glasses_id);
		$constraintList[] = $constraint;

		//Create BO object of appropriate class and pass above created object to it in argument

		$web_resource_bo = new WebResourcesBO($web_resource);

		//From the BO call the appropriate function and pass the constraint List
		//$categoriesBO->updateTable($constraintList);
		if($web_resource_bo->updateTable($constraintList))
		{
			include('tables_web_resources.php');
		} else {
			echo "Unable to update Web Resources!";
		}
	}
}

//debug use only
function consoleLog($data){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
} 

?>