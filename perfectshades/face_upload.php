<?php
/**
 * Created by PhpStorm.
 * User: Denmick
 * Date: 2016-10-24
 * Time: 5:00 PM
 */
?>



<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

  <!--  <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="http://bootsnipp.com/dist/scripts.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.2.5/ace.js"></script>

    -->

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script  src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>


    <script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#upfile").change(function(){
        readURL(this);
    });



    </script>

</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload Your Photo</strong> </div>
        <div class="panel-body">

            <!-- Standar Form -->
            <h4>Select files from your computer</h4>
            <form action="face_upload_processor.php" method="post" enctype="multipart/form-data" >
                <div class="form-inline">
                    <div class="form-group">
                       <!-- <input type="file" name="files[]" multiple id="js-upload-files" accept="image/gif, image/jpeg, image/png">  -->
                        <input type='file' name="upfile" id="upfile" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png"/>
                        <img id="blah" src="#" alt="preview image" />
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                </div>
            </form>
            <!--drag and rop should be here -->

        </div>
    </div>
</div>
</body>

<!-- DRAG and DROP not yet working
<div class="dropzone">
            <!-- Drop Files Here NOT YET WORKING
<h4>Or drag and drop files below</h4>
<div class="upload-drop-zone" id="drop-zone">
    Just drag and drop files here
</div>

<!-- Progress Bar
<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
        <span class="sr-only">60% Complete</span>
    </div>
</div>
</div>
<!-- Upload Finished
<div class="js-upload-finished">
    <h3>Processed files</h3>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
        <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a>
    </div>
</div>

-->

</html>

