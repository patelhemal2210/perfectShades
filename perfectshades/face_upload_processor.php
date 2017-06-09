<?php
/**
 * Created by PhpStorm.
 * User: Denmick
 * Date: 2016-11-03
 * Time: 2:21 PM
 */

//get the variable values in superglobles $_FILES array

//path of the file in temp directory
$file_temp = $_FILES['upfile']['tmp_name'];
//original path and file name of the uploaded file
$file_name = $_FILES['upfile']['name'];
//size of the uploaded file in bytes
$file_size = $_FILES['upfile']['size'];
//type of the file(if browser provides)
$file_type = $_FILES['upfile']['type'];
//error number
$file_error = $_FILES['upfile']['error'];



echo $file_temp . "<br />";
echo $file_name . "<br />";
echo $file_size . "<br />";
echo $file_type . "<br />";
echo $file_error . "<br />";
if ($file_error > 0)
{
    echo "Problem";
    switch ($file_error)
    {
        case 1:
            echo "File exceeded upload_max_filesize.";
            break;
        case 2:
            echo "File exceeded max_file_size";
            break;
        case 3:
            echo "File only partially uploaded.";
            break;
        case 4:
            echo "No file uploaded.";
            break;
    }
    exit;
}



$max_file_size = 200000;
if($file_size > $max_file_size)
{
    echo "file size too big";

}

//folder to move the uploaded file
$target_path = "images/uploads/";
$target_path = $target_path .  $_FILES['upfile']['name'];
//

$types = array('image/jpeg','image/png','image/jpg');

if (!in_array($_FILES['upfile']['type'], $types)) {
    echo "You can only upload files with jpg, jpeg and png extensions";
}
elseif
////move the uploaded file from tempe path to taget path
(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
    echo "The file ".  $_FILES['upfile']['name'] . " has been uploaded ";
} else{
    echo "There was an error uploading the file, please try again!";
}
//
//


?>


