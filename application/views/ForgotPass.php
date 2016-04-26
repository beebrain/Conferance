<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Bootstrap 3 Admin</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('asserts/css/bootstrap.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('asserts/css/animate.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('asserts/css/font-awesome.min.css') ?>">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url('asserts/css/styles.css') ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('asserts/css/slick.css') ?>">
    </head>
    <body>

        <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">

            </div>
            <!-- /container -->
        </div>
        <!-- /Header -->

        <div class="row">
            <div class="col-md-offset-3 col-md-6" id="message">
                <div class="panel panel-default">
                    <div class="panel-body" >
                        <div id="info" style="text-align: center;">
                            Please enter the Email of the account to retrieve your password
                        </div>
                        <div class="row" id="formreset">
                            <div class="col-md-12 ">
                                <form id="resetform" action="<?php echo base_url('index.php/Welcome/resetPass') ?>" method="post">
                                    <p>
                                    <div class = "row">
                                        <div class = "col-md-12" >
                                            <div class = "controls">
                                                <label>Email Address</label>
                                                <input type = "text" class="form-control" name = "email" id = "email" >

                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class = "row">
                                        <div class = "col-md-12">
                                            <div class="form-group pull-right">
                                                <button type="button" class="btn btn-primary pull-right" onclick="sendData()" >
                                                    Reset Password
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="col-md-offset-3 col-md-6">

                    <p>Copyright®2015 Faculty of Science and Technology Uttaradit Rajabhat University.</p>

                </div>
            </div>
        </footer>
        <script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
        <script src="<?php echo base_url('asserts/js/bootstrap.min.js') ?>"></script>
        <script>
                                                    function sendData() {

                                                        $("#formreset").hide();
                                                        $("#info").html("<h4>Processing.....</h4>");

                                                        var formData = $("#resetform").serializeArray();
                                                        var URL = $("#resetform").attr("action");


                                                        console.log(formData);
                                                        $.post(URL, formData, function (data, textStatus, jqXHR) {
                                                            console.log(data);
                                                            var data_json = jQuery.parseJSON(data);
                                                            console.log(data_json);
                                                            if (data_json["info"] == "Not Found User") {
                                                                $("#info").html("<h4>Email Address not found in systems. please contact Administrator</h4>");
                                                                setTimeout(function () {
                                                                    window.location = "<?php echo base_url('index.php/Welcome/forgotPass') ?>";
                                                                }, 3000);
                                                            } else {
                                                                $("#info").html("<h3>We sent an email to your Email address</h3> \n <h4>Follow the instructions in the email to reset your password </h4>\n");

                                                                setTimeout(function () {
                                                                    window.location = "<?php echo base_url('index.php/MainController/index/#login') ?>";
                                                                }, 3000);
                                                            }

                                                        }).fail(function (jqXHR, textStatus, errorThrown) {
                                                            alert("fail");
                                                        });
                                                    }
        </script>
    </body>

</html>