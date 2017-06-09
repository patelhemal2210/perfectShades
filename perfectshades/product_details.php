<?php
include_once "glasses_bo.php";
include_once "users_bo.php";

if(isset($_GET["glassId"]))
{
    $glassId = $_GET["glassId"];
}
$can_comment = true;
//$can_comment = isset($_SESSION['email']);
/*
if($can_comment)
{
    //$userEmail = "patelhemal@gmail.com";
    //$userName = "hemal patel";
    $userEmail = $_SESSION['email'];
    $user_bo = new UsersBO();
    $constraintList = array();
    $constraint1 = array(UsersBO::EMAIL, BusinessObjectBase::EQUAL, $userEmail);
    $constraintList[] = $constraint1;

    $user = $user_bo->getSelectedData($constraintList);
    $userName = $user[0]->name;
}

*/
if(!empty($glassId))
{
    $gls_bo = new GlassesBO(null);
    //$gls_list = (object) $gls_bo->getAllData();

    $glass = $gls_bo->executeSelectQuery("SELECT glasses.id, glasses.model_number, glasses.gender, manufacturers.name , glasses.price, glasses.description, web_resources.url FROM glasses INNER JOIN manufacturers ON glasses.manufacturer_id = manufacturers.id INNER JOIN web_resources ON web_resources.glasses_id = glasses.id WHERE glasses.id = '$glassId'");

    if(count($glass) > 0)
    {
        $selected_glass = (object)$glass[0];
        $src_base = "images/products_large/";
        $src_extension = ".png";
        $srcData =  $src_base . $selected_glass->id . $src_extension;
        $titleData = $selected_glass->model_number . " | " . $selected_glass->name  . " | " . $selected_glass->gender;
        if($selected_glass->price)
            $priceData = "CDN$ " . $selected_glass->price;
        else
            $priceData = "Not Available";
        $descData = $selected_glass->description;
        $manufacturerName = $selected_glass->name;
        $modelNumber = $selected_glass->model_number;
        $buyNowUrl = $selected_glass->url;
    }
    else
    {
        $glassId = "";
    }


}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>

    <!-- custom js files -->
    <script src="js/navigation.js" type="text/javascript"></script>
    <script src="js/form_validation.js" type="text/javascript"></script>
    <script src="js/validator.js" type="text/javascript"></script>

    <style>
        .monospaced { font-family: 'Ubuntu Mono', monospaced ; }

        .add-to-cart .btn-qty {
            width: 52px;
            height: 46px;
        }

        .add-to-cart .btn { border-radius: 0; }
        #wrapper {
            padding-left: 10px;
        }

        .image-margin {
            margin: 0 auto;
            margin-top: 80px;
        }
    </style>

    <link href="css/styles.css" rel="stylesheet">
    <title>Perfect Shades by Slacker Hackers</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="productDetailWrapper">
    <div>
        <?php
        include_once "header_inclues.php";
        $from_external_page = "Find Your Shades";
        require_once 'header.php';
        ?>
    </div>
    <?php
    if(!empty($glassId)) {
        ?>
        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <img
                        src="<?php echo $srcData;?>"
                        alt="<?php echo $titleData;?>"
                        class="image-responsive image-margin"
                    />
                </div>

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-12">
                            <h1><?php echo $titleData ?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label-primary"><?php echo $manufacturerName;?></span>
                            <span class="monospaced"><?php echo $modelNumber; ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p class="description">
                                <?php echo $descData;?>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <span class="sr-only">Four out of Five Stars</span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                            <span class="label label-success">1</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 bottom-rule">
                            <h2 class="product-price"><?php echo $priceData; ?></h2>
                        </div>
                    </div>
                    <div class="row add-to-cart">
                        <!-- <div class="col-md-5 product-qty">
                            <span class="btn btn-default btn-lg btn-qty">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </span>
                            <input class="btn btn-default btn-lg btn-qty" value="1" />
                            <span class="btn btn-default btn-lg btn-qty">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                            </span>
                        </div> -->
                        <div class="col-md-4">
                            <a class="btn btn-primary" href="<?php echo $buyNowUrl; ?>" target="_blank">Buy Now</a>
                        </div>
                    </div>
                    <br>

                    <!--  <div class="row">
                         <div class="col-md-4 text-center">
                             <span class="monospaced">In Stock</span>
                         </div>
                         <div class="col-md-4 col-md-offset-1 text-center">
                             <a class="monospaced" href="#">Add to Shopping List</a>
                         </div>
                     </div><!-- end row -->

                    <!--  <div class="row">
                          <div class="col-md-12 bottom-rule top-10"></div>
                      </div><!-- end row -->

                    <div class="row">
                        <div class="col-md-12 top-10">
                            <p>Check Out More Glasses <a href="display_glasses.php">Here</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#description"
                   aria-controls="description"
                   role="tab"
                   data-toggle="tab"
                >Description</a>
            </li>
            <li role="presentation">
                <a href="#reviews"
                   aria-controls="reviews"
                   role="tab"
                   data-toggle="tab"
                >Reviews</a>
            </li>
            <li role="presentation">
                <a href="#comments"
                   aria-controls="comments"
                   role="tab"
                   data-toggle="tab"
                >Write Comment</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active fade in" id="description">
                <p class="top-10">
                    <?php echo $descData;?>
                </p>
            </div>

            <div role="tabpanel" class="tab-pane fade in" id="reviews">
                <p class="top-10">
                    No review Yet !
                </p>
            </div>

            <div role="tabpanel" class="tab-pane fade in" id="comments">
                <p class="top-10">

                    <?php
                    if($can_comment)
                    {
                        include_once "user_comments.php";
                    }
                    else
                    { ?>
                        You have to be logged in to comment.!
                    <?php
                    }    ?>
                </p>
            </div>
        </div>
        <?php
    }
    else
    {


    ?>
        <div class="container">
        <div class='alert alert-danger'><strong>Sorry!</strong> We do not have product you are requesting.!</div>
            </div>
    <?php
    }
    ?>
</div>
</body>
