<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>URU Conference 2016</title>
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
                        <div id="info " style="text-align: center;">
                            <p class="lead-heading" ><h3>
                                Reset Password
                            </h3>
                            </p>
                        </div>
                        <div class="alert alert-success alert-dismissable" id="info" hidden="true">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            
                        </div>
                        <div class="row" >
                            <div class="col-md-12 ">
                                
                                <form id="formreset" action="<?php echo base_url('index.php/Welcome/setPass') ?>" method="post">
                                    <p>
                                    <div class = "row">
                                        <div class = "col-md-12" >
                                            <div class = "controls">
                                                <label>NewPassword</label>
                                                <input type = "password" class="form-control" name = "newpass" id = "newpass" >
                                                <input type = "hidden" class="form-control" name = "email" id = "email" value="<?= $email ?>" >

                                            </div>
                                            <div class = "controls">
                                                <label>Re-NewPassword</label>
                                                <input type = "password" class="form-control" name = "repass" id = "repass" >

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
        <script src="<?php echo base_url('asserts/js/jquery.validate.js') ?>"></script>
        <script>
                                                    $("#formreset").validate({
                                                        rules: {
                                                            newpass: {
                                                                required: true,
                                                                minlength: 5

                                                            },
                                                            repass: {
                                                                required: true,
                                                                minlength: 5,
                                                                equalTo: "#newpass"
                                                            },
                                                        },
                                                        messages: {
                                                            newpass: {
                                                                required: "<p class='text-danger'>This field is required.</p>",
                                                                minlength: "<p class='text-danger'>Please enter at least 5 characters.</p>"
                                                            },
                                                            repass: {
                                                                required: "<p class='text-danger'>This field is required.</p>",
                                                                minlength: "<p class='text-danger'>Please enter at least 5 characters.</p>",
                                                                equalTo: "<p class='text-danger'>Password Not match</p>",
                                                            },
                                                        }
                                                    });
                                                        
                                                    function sendData() {
                                                        if (!$("#formreset").valid()) {
                                                            return false;
                                                        }
                                                        console.log("Ok");
                                                        $("#info").html("<h4>Processing.....</h4>");
                                                        $("#info").show();
                                                        var formData = $("#formreset").serializeArray();
                                                        var URL = $("#formreset").attr("action");
                                                        console.log(formData);
                                                        $.post(URL, formData, function (data, textStatus, jqXHR) {
                                                            console.log(data);
                                                            var data_json = jQuery.parseJSON(data);
                                                            console.log(data_json);
                                                            if (data_json["info"] == "Not Found User") {
                                                                $("#info").html("<h4>Email Address not found in systems. please contact Administrator</h4>");
                                                                setTimeout(function () {
                                                                       window.location = "<?php echo base_url('index.php/MainController/index/#login') ?>";
                                                                }, 5000);
                                                            } else {
                                                                $("#info").html("<h4>You have a new password Please try to login. </h4>\n");
                                                                setTimeout(function () {
                                                                      window.location = "<?php echo base_url('index.php/MainController/index/#login') ?>";
                                                                }, 5000);
                                                            }

                                                        }).fail(function (jqXHR, textStatus, errorThrown) {
                                                            alert("fail");
                                                        });

                                                    }
        </script>
    </body>

</html>