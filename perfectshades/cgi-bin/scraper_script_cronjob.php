<?php
set_include_path('/home/lehaoorg/public_html/perfectshades/');
require_once 'scraper.php';
require_once 'web_resources_bo.php';
require_once 'webresources.php';
require_once 'glasses_bo.php'; 
require_once 'glasses.php';

set_time_limit(800);
ini_set('max_execution_time', '800');
ini_set('memory_limit', '512M');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

echo "\nExecuting web scraper to retrieve amazon prices.\n";

$scraper = Scraper::getInstance();

// get all the URLs stored 
$web_resources_bo = new WebResourcesBO(null);
$resources = $web_resources_bo->getAllData();
// convert to array so data can be looped over 
$resources = json_decode(json_encode($resources),true); 


foreach($resources as $row){
	$glasses = $row['glasses_id']; 
	$url = $row['url'];
	$price = $scraper->getAmazonPrice($url); 
	echo("\nGlasses ID: " . $row['glasses_id']); 
	if ($price != null) {
		echo("\nPrice: " . $price . "\n");
		// update DB if price was located
		$glass_new = new Glasses();
		$glass_new->setPrice($price);
		$constraintList = array();
		$constraint = array(GlassesBO::ID, BusinessObjectBase::EQUAL, $row['glasses_id']);
		$constraintList[] = $constraint;
		$glass_bo = new GlassesBO($glass_new);
		$glass_bo->updateTable($constraintList);
	}
	else {
		echo("\nPrice: ** NO PRICE FOUND ** \n");
	}
} 

echo "\n\n\n** Amazon web scraper execution has completed. **\n\n";

?> 