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
        <link rel="stylesheet" href="<?php echo base_url('asserts/css/easy-autocomplete.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('asserts/css/easy-autocomplete.themes.css') ?>">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url('asserts/css/styles.css') ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('asserts/css/slick.css') ?>">
    </head>
    <body>

        <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#Registration">Call for papers</a>
                        </li>
                        <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#Important">Important Date</a>
                        </li>
                        <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#committee">committee</a>
                        </li>
                        <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#Author">Author Guideline</a>
                        </li>
                        <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#Venue">Venue & Lodging</a>
                        </li>
                        <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#login">login</a>
                        </li>
                        <li><a href="#contact">contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /Header -->

        <div class="row">
            <div id="regis">
                <div class="col-md-6 col-md-offset-3">
                    <h1 >Registeration  form</h1>
                    <div class="divider"></div>
                </div>
                <div class="col-md-offset-3 col-md-6 col-sm-6 scrollpoint sp-effect1">
                    <form role="form" id="registerForm" method="post" action="<?php echo base_url('index.php/UserController/register') ?>">
                        <div class="form-group">
                            <div class="col-md-3 " style="padding-left: 0px;">
                                <label >Title<span style="color: red"> *</span>  </label>
                                <select class="form-control" id="title" name="title" required>
                                    <option value=""><p>Select</p></option>
                                    <option value="Mr."><p>Mr.</p></option>
                                    <option value="Mrs."><p>Mrs.</p></option>
                                    <option value="Miss"><p>Miss</p></option>
                                    <option value="Ms."><p>Ms.</p></option>
                                    <option value="Dr."><p>Dr.</p></option>
                                    <option value="Assist. Prof. "><p>Assist. Prof. </p></option>
                                    <option value="Assist. Prof. Dr. "><p>Assist. Prof. Dr. </p></option>
                                    <option value="Assoc. Prof. "><p>Assoc. Prof. </p></option>
                                    <option value="Assoc. Prof. Dr. "><p>Assoc. Prof. Dr. </p></option>
                                    <option value="Prof."><p>Prof.</p></option>
                                    <option value="Prof. Dr."><p>Prof. Dr.</p></option>  
                                </select>
                            </div>
                            <div class="col-md-3 " style="padding-left: 0px;">
                                <label for="Full Name">First Name <span style="color: red"> *</span> </label>  
                                <input type="text" name = "first" id = "First" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="col-md-3 " style="padding-left: 0px;">
                                <label for="Mid Name">Middle Name </label>  
                                <input type="text" name = "mid" id = "mid" class="form-control" placeholder="Middle Name" >
                            </div>
                            <div class="col-md-3" style="padding-left: 0px;">
                                <label for="Last Name">Last Name <span style="color: red"> *</span> </label>  
                                <input type="text" name = "last" id = "Last" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Gender">Gender <span style="color: red"> *</span>  </label>
                            <select class="form-control" id="Gender" name="Gender" required>
                                <option value=""><p>Please Select</p></option>
                                <option value="Male"><p>Male</p></option>
                                <option value="Female"><p>Female</p></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Address">Address: <span style="color: red"> *</span>  </label>
                            <input type="text" name = "department" id = "department"class="form-control" placeholder="Department">
                            <input type="text" name = "faculty" id = "faculty"class="form-control" placeholder="Faculty">
                            <input type="text" name = "university" id = "university"class="form-control" placeholder="University/Institute" required>
                            <input type="text" name = "state" id = "state"  class="form-control" placeholder="State/Province" required>
                            <input type="text" style="width: 500px;" name = "country" id = "country" class="form-control" placeholder="Country/Region" required>
                            <input type="text" name = "postcode" id = "postcode" class="form-control" placeholder="PostCode" required>
                        </div>
                        <div class="form-group">
                            <label for="Phone Number">Phone Number <span style="color: red"> * (ex +66836212126 )</span> </label>
                            <input type="text" name = "phone" id = "phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="Presentation">Type of Participation <span style="color: red"> *</span>  </label>
                            <select class="form-control" id="participation" name="participation" required>
                                <option value=""><p>Select</p></option>
                                <option value="L"><p>Participant</p></option>
                                <option value="O"><p>Oral Presentation</p></option>
                                <option value="P"><p>Poster Presentation</p></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email <span style="color: red"> *</span>  </label>
                            <input type="text" name = "email" id = "email" class="form-control" placeholder="email" required>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password <span style="color: red"> * least 5 characters </span> </label>
                            <input type="password" name = "password"  id = "password" class="form-control" placeholder="password" required>
                        </div>
                        <div class="form-group">
                            <?php echo $captcha; ?>
                        </div>
                        <div class="form-group pull-right">
                            <button type="button" onclick="sendData()"class="btn btn-neutral btn-success" >Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-offset-3 col-md-6" id="message">
                <div class="panel panel-default">
                    <div class="panel-body" style="text-align: center;">
                        <div id="info">
                            <h2>Your hava successfully registered.</h2>
                            <h3>Check your email address to activate your account.</h3>
                            <p>if your are not automatically redirected in 30 seconds, <a href="<?php echo base_url('index.php/MainController/index/#login') ?>">click here.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
        <script src="<?php echo base_url('asserts/js/jquery.validate.js') ?>"></script>
        <script src="<?php echo base_url('asserts/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('asserts/js/jquery.easy-autocomplete.js') ?>"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
        <script>
                                $("document").ready(function () {

                                    var options = {
                                        url: "<?php echo base_url('asserts/js/countries.json') ?>",
                                        getValue: "name",
                                        list: {
                                            match: {
                                                enabled: true
                                            }
                                        },
                                    };
                                    $("#country").easyAutocomplete(options);


                                    $("#registerForm").validate({
                                        rules: {
                                            postcode: {
                                                required: true,
                                                number: true
                                            },
                                            phone: {
                                                required: true,
                                            },
                                            password: {
                                                required: true,
                                                minlength: 5
                                            },
                                            email: {
                                                required: true,
                                                email: true
                                            },
                                        },
                                        messages: {
                                            postcode: {
                                                required: "<p class='text-danger'>This field is required.</p>",
                                                number: "<p class='text-danger'>Please enter a postcode</p>"
                                            },
                                            phone: {
                                                required: "<p class='text-danger'>This field is required.</p>",
                                            },
                                            password: {
                                                required: "<p class='text-danger'>This field is required.</p>",
                                                minlength: "<p class='text-danger'>Please enter at least 5 characters.</p>"
                                            },
                                            email: {
                                                required: "<p class='text-danger'>This field is required.</p>",
                                                email: "<p class='text-danger'>Please check your email format.</p>"
                                            }

                                        }
                                    });
                                    $("#message").hide();
                                });
                                function sendData() {
                                    if (!$("#registerForm").valid()) {

                                        return false;
                                    }
                                    $("#regis").hide();
                                    $("#info").html("<h4>Processing.....</h4>");
                                    $("#message").show();
                                    var formData = $("#registerForm").serializeArray();
                                    var URL = $("#registerForm").attr("action");
                                    console.log(formData);
                                    $.post(URL, formData, function (data, textStatus, jqXHR) {
                                        console.log(data);
                                        var data_json = jQuery.parseJSON(data);
                                       
                                        if (data_json["info"] == "Duplicate User") {
                                            $("#info").html("<h4>Email is already used by another user. Please choose another email address</h4>");
                                            $("#message").show();
                                            setTimeout(function () {
                                                window.location = "<?php echo base_url('index.php/MainController/signup') ?>";
                                            }, 3000);
                                        } else if (data_json["info"] == "Robot") {
                                            $("#info").html("<h4>Sorry We have detacted Robot</h4>");
                                            $("#message").show();
                                            setTimeout(function () {
                                                window.location = "<?php echo base_url('index.php/MainController/signup') ?>";
                                            }, 3000);
                                        } else {

                                            $("#info").html(" <h2>Your hava successfully registered.</h2> \n\
                                        <h3>Check your email address to activate your account.</h3>\n\
<p>if your are not automatically redirected in 30 seconds, <a href='<?php echo base_url('index.php/MainController/index/#login') ?>'>click here.</a></p>");
                                            $("#message").show();
                                            setTimeout(function () {
                                                window.location = "<?php echo base_url('index.php/MainController/index/#login') ?>";
                                            }, 3000);
                                        }
                                    }).fail(function (jqXHR, textStatus, errorThrown) {
                                        alert("fail");
                                    });
                                    $("#registerForm")[0].reset();
                                }
        </script>
        <footer>
            <div class="container">
                <div class="col-md-offset-3 col-md-6">

                    <p>Copyright®2015 Faculty of Science and Technology Uttaradit Rajabhat University.</p>

                </div>
            </div>
        </footer>
    </body>

</html>