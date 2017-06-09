<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/styles.css" rel="stylesheet">
    <title>Perfect Shades by Slacker Hackers</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <title>Comment Box</title>
    <script src="js/bootstrap-rating-input.min.js" type="text/javascript"></script>
    </head>


   <!-- <style>
        #wrap{
            border: 1px solid lightgray;
            alignment-adjust: central;
            width: 1000px;
            margin-left: 50px;
            margin-top: 10px;
            box-shadow: 0 5px 0 #e6e6e6;
            padding-bottom: 50px;

        }
        h1{
            color: lightseagreen;
            text-align: center;
        }

        h3.heading{
            margin-left: 20px;
            background-color: #fafafa;
            font-size: 25px;
            float: left;
            padding-left: 40px;
            position: relative;
            width: 405px;
            height: 40px;
            padding-top: 5px;

        }
        #upper_blank{
            border-bottom: 7px solid steelblue;
            margin-top: 40px;
            margin-right: 485px;
            width: 570px;
            padding-right: 480px;
        }
        p{
            margin-left: 5px;
            padding: 8px;
            padding-left: 20px;
        }
        #name{
            margin-left: 20px;
            box-shadow: 0 2px 0 #e6e6e6;
            height: 40px;
            padding-left: 10px;
            width: 500px;
        }
        #email{
            margin-left: 20px;
            box-shadow: 0 2px 0 #e6e6e6;
            height: 40px;
            padding-left: 10px;
            width: 500px;
        }
        #url{
            margin-left: 20px;
            box-shadow: 0 2px 0 #e6e6e6;
            height: 40px;
            padding-left: 10px;
            width: 500px;
        }
        #comment{
            margin-left: 20px;
            box-shadow: 0 2px 0 #e6e6e6;
            height: 40px;
            padding-left: 10px;
            width: 650px;
            height: 200px;
        }
        #commentSubmit{
            margin-left: 20px;
            width: 250px;
            height: 55px;
            color: white;
            font-size: 20px;
            background-color: #2c95dc;
            box-shadow: 0 3px 0 #09466f;
            margin-bottom: 30px;
            padding-left: 20px;
            border-radius: 5px;
        }
        #commentSubmit:hover {
            background-color: #09466f;

        }

        p.disclaimer{
            font-size: 18px;
            color: gray;
            padding-bottom: 15px;
            padding-top: 15px;
        }
        p.notify{
            font-size: 18px;
            padding-top: 20px;
        }

        h3.second_heading{
            margin-left: 0;
            margin-top: 30px;
            font-size: 20px;
            width: 250px;
            height: 50px;
            padding-top: 10px;
            padding-left: 55px;

        }
        #middle{
            border: 1px solid lightgray;
            width: 1000px;
            height: 200px;
            background-color: lightyellow;
            margin-left: 45px;
            text-align: left;
            margin-top: 10px;
            box-shadow: 0 2px 0 lightgray;
        }
        .blank{
            border-bottom: 7px solid steelblue;
            margin-top: 50px;
            margin-left: 50px;
            margin-right: 100px;
            width: 800px;
        }

        #inner_reply{

            margin-left: 800px;
            margin-top: 160px;
            width: 100px;
            height: 30px;
            background-color: #2c95dc;
            text-align: center;
            font-size: 18px;
            color: white;
            border-radius: 18px;
        }
    </style>
</head>
<body>
<!------------container------->   <!--former CSS -->

<body>
<div>

    <!-- <h1 class="title">Customer Review</h1>-->
    <!-------Wrap------------>
    <!-- <div id="wrap">
         <div id="main">
             <div class="row">
                 <div class="col-md-5">
                     <h3 class="heading">Comments and Responses</h3>
                 </div>
                 <div class="col-md-7">
                     <div id="upper_blank"></div>
                 </div>
             </div>
         </div>-->
    <div>
        <p class="disclaimer">Your email address will not be published. Required fields are marked *</p>

        <!------------Form Start---------->






        <div id='form'>
            <div class="row">
                <div class="col-xs-4">

                    <form id="comment_form" class="form-horizontal" method="post" name="comment_form">
                        <div id="login_error"></div>

                        <div id = "rating">
                            <p >My rating: <input type="number" name="star" id="rating1" class="rating" data-clearable="remove"/>
                        </div>

                        <div>
                            <div style="margin-bottom: 25px" class="input-group" id="comment_username">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" id="username" type="text" class="form-control" name="username" placeholder="Please Enter your User Name *" value="<?php if(isset($userName)) {echo $userName;} else {echo "";}?>">
                            </div>
                            <div style="margin-bottom: 25px" class="input-group" id="comment_email">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="in_email" type="email" class="form-control" name="in_email" placeholder="Please Enter your Email *" value="<?php if(isset($userEmail)) {echo $userEmail;} else { echo "";}?>">
                            </div>

                            <div style="margin-bottom: 25px" class="form-group" id="comment_field">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" rows="5" id="comment" placeholder="Please leave your comment here *"></textarea>
                            </div>

                        </div>

                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" value="Clear">Clear</button>
                    </form>


                    <!--
                    <form action="" method="POST" id="commentform" >


                    <div id = "rating">
                        <p >My rating: <input type="number" name="star" id="rating1" class="rating" data-clearable="remove"/>

                    </div> -->




                    <!--    <input type="number"  class="rating" /> <br>  -->

                    <!--    <div id="comment-name" class="form-row">
                            <input type = "text" placeholder = "Name*" name = "name"  id = "name" >
                        </div>
                        <div id="comment-email" class="form-row">
                            <input type = "text" placeholder = "Email (will not be published)*" name = "email"  id = "email">
                        </div>

                        <div id="comment-message" class="form-row">
                            <textarea name = "comment" placeholder = "Message" id = "comment" ></textarea>
                        </div>
                        <a href="#"><input type="submit" name="dsubmit" id="commentSubmit" value="Submit Comment"></a>
                        <input style="width: 30px" type="checkbox" value="1" name="subscribe" id="subscribe" checked="checked">
                        <p1 class="notify"><b>Notify me when new comments are added.</b></p1>
                    </form>-->


                </div>
            </div>
        </div>
    </div>

    <!-------------------Reply Section------
    <div id="second">
        <div class="row">
            <div class="col-md-2">
                <h3 class="second_heading"><b>Leave a Reply</b></h3>
            </div>
            <div class="col-md-10">
                <div class="blank"></div>
            </div>
        </div>
    </div>
    <div id="middle">
        <form>
            <a href="#"><input type = "text" value = "reply" name = "dreply" id = "inner_reply"></a>
        </form>
    </div>
    -->
</div>
</body>
</html>