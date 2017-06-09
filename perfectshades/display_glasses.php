<?php

include_once "categories_bo.php";
include_once "colors_bo.php";
include_once "manufacturers_bo.php";
include_once "glasses_bo.php";

//Get the categories from database
//$categories = array('Aviator', 'Round', 'Square');
if(empty($categories))
{
    $cat_bo = new CategoriesBO(null);
    $cat_list = (object) $cat_bo->getAllData();
    foreach($cat_list as $cat)
    {
        $categories[] = $cat->name;
    }
}

//Get the categories from database
//$colors = array('Red', 'Black', 'Brown');
if(empty($colors))
{
    $col_bo = new ColorsBO(null);
    $col_list = (object) $col_bo->getAllData();
    foreach($col_list as $col)
    {
        $colors[] = $col->description;
    }
}

//Get the categories from database
//$manufactures = array('Ray-Ban', 'Prada', 'GUCCI');
if(empty($manufactures))
{
    $man_bo = new ManufacturersBO(null);
    $man_list = (object) $man_bo->getAllData();
    foreach($man_list as $man)
    {
        $manufactures[] = $man->name;
    }
}

$Gender = array('Men', 'Women', 'Unisex');

//Get the categories from database
//$manufactures = array('Ray-Ban', 'Prada', 'GUCCI');
if(empty($products))
{
    $gls_bo = new GlassesBO(null);
    //$gls_list = (object) $gls_bo->getAllData();

    $gls_list = $gls_bo->executeSelectQuery("SELECT glasses.id, glasses.model_number, glasses.gender, manufacturers.name , glasses.price, glasses.description FROM glasses INNER JOIN manufacturers ON glasses.manufacturer_id = manufacturers.id");

    foreach($gls_list as $gls)
    {
        $products[] = $gls;
    }
}


function displaySelectionList($title, $list)
{
    echo "
        <div class=\"col-sm-12\">
            <div style=\"font-weight:bold;padding-top:10px;\">
                    $title
            </div>
    ";

    $checkboxName = strtolower($title."[]");

    foreach($list as $item)
    {
        echo "
            <div class=\"checkbox\">
                <label onclick=\"checkBoxValueChanged();\">
                    <input type=\"checkbox\" name=\"$checkboxName\" value=\"$item\">
                    <span class=\"cr\"><i class=\"cr-icon fa fa-check\"></i></span>
                        $item
                    </label>
            </div>
        ";
    }

    echo "
        </div>
    ";
}

function displayProduct($productList)
{
    $src_base = "images/products/";
    $src_extension = ".png";
    foreach($productList as $product) {

        $srcData =  $src_base . $product->id . $src_extension;
        $titleData = $product->model_number . " | " . $product->name  . " | " . $product->gender;
        if($product->price)
            $priceData = "CDN$ " . $product->price;
        else
            $priceData = "Not Available";
        $descData = $product->description;
        $productId = $product->id;
        echo "
        <li style='white-space: nowrap;'>
            <a href=\"product_details.php?glassId=$productId\">
                <img style='height:150px;width: 150px; margin-bottom: 50px; margin-top: 20px;' src=\"$srcData\" >
                <h4>$titleData</h4>
            </a>
            <p style='color:red;font-weight:bold'>$priceData</p>
            <p style='overflow:hidden; text-overflow: ellipsis;'>$descData</p>
        </li>
    ";
    }

}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="manifest.json">
	<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">

	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> attempted fix doesnt work -->
	<!--<meta name="viewport" content="width=1000"> attempted fix doesn't work--> 


    
    <title>Perfect Shades by Slacker Hackers</title>
    <script src="js/filter_glasses.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <div>
            <?php
            include_once "header_inclues.php";
            $from_external_page = "Find Your Shades";
            require_once 'header.php';
            ?>
        </div>
        <div id="sidebar-wrapper">
            <?php
                displaySelectionList("Categories", $categories);
                displaySelectionList("Colors", $colors);
                displaySelectionList("Manufacturers", $manufactures);
                displaySelectionList("Gender", $Gender);

            ?>
         </div>
 
        <div id="page-content-wrapper">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-0" style="margin-top:30px ">
                            <ul id="productList" class="products">
                                <?php displayProduct($products);?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
</body>
