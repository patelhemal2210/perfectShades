function getCheckedBoxes(chkboxName) {
    var checkboxes = document.getElementsByName(chkboxName);
    var checkboxesChecked = new Array();
    // loop over them all
    var j = 0;
    for (var i=0; i<checkboxes.length; i++) {
        // And stick the checked ones onto an array...
        if (checkboxes[i].checked) {
            checkboxesChecked[j] = checkboxes[i].value;
            j++;
        }
    }
    // Return the array if it is non-empty, or null
    //alert(checkboxesChecked);
    return checkboxesChecked;

}

function generateProductList(products) {
    //alert(products);
    //var d = products[0];
    //var c = Object.values(products[0]);
    var productList = JSON.parse(products);
    //alert(productList);
    /* $src_base = "images/products/";
     $src_extension = ".png";
     foreach($productList as $product) {

     $srcData =  $src_base . $product->id . $src_extension;
     $titleData = $product->model_number . " | " . $product->name  . " | " . $product->gender;
     $priceData = "CDN$ 199.99";
     $descData = $product->description;

     echo "
     <li style='white-space: nowrap;'>
     <a href=\"#\">
     <img style='height:150px;width: 150px; margin-bottom: 50px; margin-top: 20px;' src=\"$srcData\" >
     <h4>$titleData</h4>
     </a>
     <p style='color:red;font-weight:bold'>$priceData</p>
     <p style='overflow:hidden; text-overflow: ellipsis;'>$descData</p>
     </li>
     ";
     }*/

    var src_base = "images/products/";
    var src_extension = ".png";
    $("#productList").fadeOut("fast");
    $("#productList").empty();
    for (var i = 0; i < productList.length ; i++) {

        var srcData = src_base + productList[i].id + src_extension;
        var titleData = productList[i].modelNumber + " | " + productList[i].manufacturerName + " | " + productList[i].gender;
        var priceData = "Not Available";
        var productId = productList[i].id;
        if(productList[i].price)
        {
            priceData = "CDN$ " + productList[i].price;
        }
        var descData = productList[i].description;

        var data = "<li style='white-space: nowrap;'><a href=\"product_details.php?glassId=" +  productId + "\"><img style='height:150px;width: 150px; margin-bottom: 50px; margin-top: 20px;' src=" + srcData + " ><h4> " + titleData + "</h4></a><p style='color:red;font-weight:bold'> " + priceData + "</p><p style='overflow:hidden; text-overflow: ellipsis;'> " + descData + "</p></li>";
        $("#productList").append(data);
        $("#productList").fadeIn("fast");

    }
}

function checkBoxValueChanged()
{
    var filter_string = new Array();
    //alert("daata");
    var categories = getCheckedBoxes("categories[]");
    var colors = getCheckedBoxes("colors[]");
    var manufacturers = getCheckedBoxes("manufacturers[]");
    var gender = getCheckedBoxes("gender[]");
    filter_string[0] = categories;
    //alert(filter_string);
    // if(categories.length != 0 || colors.length != 0 || manufacturers.length != 0 || gender.length != 0)
    // {
    $.ajax({
        type: 'post',
        url: 'filter_glasses.php',
        data : {
            authenticRequest:1,
            categories:categories,
            colors:colors,
            manufacturers:manufacturers,
            gender:gender,

        },
        success : function (response) {
            // We get the element having id of display_info and put the response inside it
            //alert(response.toString());
            if(response.length > 10)
            {
                generateProductList(response);
            }
            else
            {
                var error_div = "<div class='alert alert-danger'><strong>Sorry!</strong> We do not have product matching your filter ! Please reduce the filter.! </div>";
                $("#productList").fadeOut(200);
                $("#productList").empty();
                $("#productList").append(error_div);
                $("#productList").fadeIn(500);
            }
        },
        error : function (response) {
            // We get the element having id of display_info and put the response inside it
            // alert("response");
            alert("error");
        },

    });
    /*}
     else
     {
     var error_div = "<div class='alert alert-danger'><strong>Sorry!</strong> Please select </div>";
     $("#productList").fadeOut(500);
     $("#productList").empty();
     $("#productList").append(error_div);
     $("#productList").fadeIn(500);
     }*/
}
