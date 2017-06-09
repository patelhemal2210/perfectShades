<?php
include_once "colors.php";
include_once "glasses_bo.php";

function generateCondition($glassesColumnName, $returnColumnName, $tableName, $columnName, $values)
{
    $ret = "";
    if(count($values) > 0 &&
        !empty($returnColumnName) &&
        !empty($tableName) &&
        !empty($columnName))
    {
        $ret = "SELECT " . $returnColumnName . " FROM " . $tableName . " WHERE ";
        $condition = "";
        foreach($values as $v)
        {
            if(empty($condition))
            {
                $condition = $columnName . " = '" . $v . "' ";
            }
            else
            {
                $condition = $condition . " OR " . $columnName . " = '" . $v . "' ";
            }
        }
        $ret = $ret . $condition;
        $ret = $glassesColumnName . " IN (" . $ret . ") ";

    }
    return $ret;
}

if(isset($_POST['authenticRequest']))
{
    if( isset($_POST['categories']) ||
        isset($_POST['colors']) ||
        isset($_POST['manufacturers']) ||
        isset($_POST['gender']) ) {
        /*
            $filter_string = $_POST['filter_string'];
            $categories = $filter_string[0];

            $c = new Colors();
            $c->setId("1");
            $c->setDescription("black");
            $d = array();
            for($i = 0; $i< 4 ; $i++)
            {
                $e = array("id"=>$c->getId() , "desc" => $c->getDescription());
                $d["$i"] = $e;
            }
        */
        $categories_filter = "";
        $colors_filter = "";
        $manufacturers_filter = "";
        $gender_filter = "";

        $category_info = array(
            "glassesColumnName" => "category_id",
            "returnColumnName"=> "id",
            "tableName" => "categories",
            "columnName" => "name"
        );

        $color_info = array(
            "glassesColumnName" => "color_id",
            "returnColumnName"=> "id",
            "tableName" => "colors",
            "columnName" => "description"
        );


        $manufacturer_info = array(
            "glassesColumnName" => "manufacturer_id",
            "returnColumnName"=> "id",
            "tableName" => "manufacturers",
            "columnName" => "name"
        );

        if(isset($_POST['categories']))
        {
            $categories = $_POST['categories'];
            if($categories != null)
            {
                $categories_filter = generateCondition($category_info["glassesColumnName"], $category_info["returnColumnName"], $category_info["tableName"], $category_info["columnName"], $categories);
            }
        }

        if(isset($_POST['colors']))
        {
            $colors = $_POST['colors'];
            if($colors != null)
            {
                $colors_filter = generateCondition($color_info["glassesColumnName"], $color_info["returnColumnName"], $color_info["tableName"], $color_info["columnName"], $colors);
            }
        }

        if(isset($_POST['manufacturers']))
        {
            $manufacturers = $_POST['manufacturers'];
            if($manufacturers != null)
            {
                $manufacturers_filter = generateCondition($manufacturer_info["glassesColumnName"], $manufacturer_info["returnColumnName"], $manufacturer_info["tableName"], $manufacturer_info["columnName"], $manufacturers);
            }
        }

        if(isset($_POST['gender']))
        {
            $gen = $_POST['gender'];
            if($gen != null)
            {
                $condition = "";
                foreach($gen as $v)
                {
                    if(empty($condition))
                    {
                        $condition = "gender" . " = '" . $v . "' ";
                    }
                    else
                    {
                        $condition = $condition . " OR " . "gender" . " = '" . $v . "' ";
                    }
                }
                $gender_filter = $condition;
            }
        }

        $query = "SELECT glasses.id, glasses.model_number, glasses.gender, manufacturers.name , glasses.price, glasses.description FROM glasses INNER JOIN manufacturers ON glasses.manufacturer_id = manufacturers.id WHERE ";

        if(!empty($categories_filter))
        {
            $query = $query . $categories_filter;
        }
        else
        {
            $query = $query . " 1 ";
        }

        if(!empty($colors_filter))
        {
            $query = $query . " AND " . $colors_filter;
        }
        else
        {
            $query = $query . " AND 1 ";
        }

        if(!empty($manufacturers_filter))
        {
            $query = $query . " AND " . $manufacturers_filter;
        }
        else
        {
            $query = $query . " AND 1 ";
        }

        if(!empty($gender_filter))
        {
            $query = $query . " AND " . $gender_filter;
        }
        else
        {
            $query = $query . " AND 1";
        }


        $gls_bo = new GlassesBO(null);
        $gls_list = $gls_bo->executeSelectQuery($query);
        $count = 0;
        $glassesList = array();
        foreach($gls_list as $g)
        {
            $glassesList[$count] = array(
                "id" => $g->id,
                "modelNumber" => htmlspecialchars($g->model_number),
                "gender" => $g->gender,
                "manufacturerName" => htmlspecialchars($g->name),
                "price" => $g->price,
                "description" => htmlspecialchars($g->description)
            );

            $count++;
        }

/*
            for($i = 0; $i < 1; $i++)
            {
                $glassesList[$i] = array(
                    "id" => $query,
                    "modelNumber" => "number",
                    "gender" => "gen",
                    "manufacturerName" => "name",
                    "price" => "price",
                    "description" => "The sky is the limit with Oakley feedback, the ultra-feminine classic teardrop shape for women everywhere, with a soft silhouette, a lightweight frame and a flattering double nose bridge style. For the first time, we blended the beauty of a c5-wire front with the warm tones of an acetate stem – making it the first wire frame sunglass that is truly designed for the active woman. Stellar eye coverage and a snug but comfy head wrap ensure you’re ready for takeoff every time you wear Oakley feedback. "
                );
            }

        /*
            $glassesList[1] = array(
                "id" => "id",
                "modelNumber" => "number",
                "gender" => "gen",
                "manufacturerName" => "name",
                "price" => "price",
                "description" => "des"
            );
            /*
            $d = array();
            $d[0] = array("cat"=>$cat_f , "col" => $col_f, "man" => $man_f , "gen" => $gen_f);
           /* $colors = array();
            $manufaturers = array();
            $gender = array();*/

        //foreach ($filter_string["categories"] as $item) {
        //    $categories[] = $item;
        // }
        echo json_encode($glassesList);
        //echo $categories[0];
    }
    else
    {
        $gls_bo = new GlassesBO(null);
        $gls_list = $gls_bo->executeSelectQuery("SELECT glasses.id, glasses.model_number, glasses.gender, manufacturers.name , glasses.price, glasses.description FROM glasses INNER JOIN manufacturers ON glasses.manufacturer_id = manufacturers.id");
        $count = 0;
        $glassesList = array();
        foreach($gls_list as $g)
        {
            $glassesList[$count] = array(
                "id" => $g->id,
                "modelNumber" => htmlspecialchars($g->model_number),
                "gender" => $g->gender,
                "manufacturerName" => htmlspecialchars($g->name),
                "price" => $g->price,
                "description" => htmlspecialchars($g->description)
            );

            $count++;
        }
        /*
        $glassesList[0] = array(
            "id" => $query,
            "modelNumber" => "number",
            "gender" => "gen",
            "manufacturerName" => "name",
            "price" => "price",
            "description" => "The sky is the limit with Oakley feedback, the ultra-feminine classic teardrop shape for women everywhere, with a soft silhouette, a lightweight frame and a flattering double nose bridge style. For the first time, we blended the beauty of a c5-wire front with the warm tones of an acetate stem – making it the first wire frame sunglass that is truly designed for the active woman. Stellar eye coverage and a snug but comfy head wrap ensure you’re ready for takeoff every time you wear Oakley feedback. "
        );
        */

        echo json_encode($glassesList);
    }
}
else
{
    echo "error data";
}

/*
 SELECT glasses.id, glasses.model_number, glasses.gender, manufacturers.name , glasses.price, glasses.description FROM glasses INNER JOIN manufacturers ON glasses.manufacturer_id = manufacturers.id where category_id IN (select id from categories where name = "Aviator") AND manufacturer_id IN (select id from manufacturers where name = "GUCCI" OR name = "Ray-Ban") AND color_id IN (select id from colors where description="Black")
 */
?>

