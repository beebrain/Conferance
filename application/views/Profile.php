<link rel="stylesheet" href="<?php echo base_url('asserts/css/easy-autocomplete.css') ?>">
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 clearfix">
                            <form role="form" id="updateForm" method="post" action="<?php echo base_url('index.php/UserController/updateUser') ?>">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Profile</h4>
                                </div>
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
                                        <input type="text" name = "first" id = "First" class="form-control" placeholder="First Name" required value="<?= $user_data->first ?>">
                                    </div>
                                    <div class="col-md-3 " style="padding-left: 0px;">
                                        <label for="Mid Name">Middle Name </label>  
                                        <input type="text" name = "mid" id = "mid" class="form-control" placeholder="Middle Name" value="<?= $user_data->mid ?>">
                                    </div>
                                    <div class="col-md-3" style="padding-left: 0px;">
                                        <label for="Last Name">Last Name <span style="color: red"> *</span> </label>  
                                        <input type="text" name = "last" id = "Last" class="form-control" placeholder="Last Name" required value="<?= $user_data->last ?>">
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
                                    <input type="text" name = "department" id = "department"class="form-control" placeholder="Department" value="<?= $user_data->department ?>">
                                    <input type="text" name = "faculty" id = "faculty"class="form-control" placeholder="Faculty" value="<?= $user_data->faculty ?>">
                                    <input type="text" name = "university" id = "university"class="form-control" placeholder="University/Institute" required value="<?= $user_data->university ?>">
                                    <input type="text" name = "state" id = "state"  class="form-control" placeholder="State/Province" required value="<?= $user_data->state ?>">
                                    <input type="text" name = "country" id = "country" class="form-control" placeholder="Country/Region" required value="<?= $user_data->country ?>">
                                    <input type="text" name = "postcode" id = "postcode" class="form-control" placeholder="PostCode" required value="<?= $user_data->postcode ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Phone Number">Phone Number <span style="color: red"> * (ex +66836212126 )</span> </label>
                                    <input type="text" name = "phone" id = "phone" class="form-control" placeholder="Phone Number" required value="<?= $user_data->phone ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Presentation">Type of Participation <span style="color: red"> *</span>  </label>
                                    <select class="form-control" id="participation" name="participation" disabled="">
                                        <option value=""><p>Select</p></option>
                                        <option value="L"><p>Participant</p></option>
                                        <option value="O"><p>Oral Presentation</p></option>
                                        <option value="P"><p>Poster Presentation</p></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email <span style="color: red"> *</span>  </label>
                                    <input type="text" name = "email" id = "email" class="form-control" placeholder="email" disabled="" value="<?= $user_data->email ?>">
                                </div>
                                <input type="hidden" name = "user_id" id = "user_id" value="<?= $user_data->user_id ?>">
                                <div class="form-group pull-right">
                                    <button type="button" onclick="sendData()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Profile</h1>
                <div class="col-md-offset-2 col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class=" col-sm-offset-1 col-sm-11 col-xs-12">
                                    <h2>Information</h2>
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td><?= $user_data->title . " " . $user_data->first . " " . $user_data->mid . " " . $user_data->last ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $user_data->gender; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td>
                                                    <p><?= $user_data->department . " " . $user_data->faculty; ?> </p>
                                                    <p><?= $user_data->university; ?> </p>
                                                    <p><?= $user_data->country; ?> </p>
                                                    <p><?= $user_data->postcode; ?> </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email </td>
                                                <td><?= $user_data->email ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><?= $user_data->phone ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--/col-->          
                                <div class="clearfix"></div>
                                <!--/col-->
                            </div>
                            <!--/row-->
                        </div>
                        <!--/panel-body-->
                        <div class="panel-footer">
                            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal" >
                                <i class="fa fa-edit" ></i>
                            </button>

                        </div>
                    </div>
                    <!--/panel-->
                </div>

            </div>
            <!-- /.col-lg-12 -->
        </div>

    </div>

</div>


<script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/jquery.validate.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/bootstrap.min_.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/jquery.easy-autocomplete.js') ?>"></script>
<script>
                                        $("document").ready(function () {
                                            $("#title").val('<?= $user_data->title; ?>');
                                            $("#Gender").val('<?= $user_data->gender; ?>');
                                            $("#participation").val('<?= $user_data->participation; ?>');
                                           
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
                                            var form = $("#updateForm");
                                            form.validate();
                                            if (!$("#updateForm").valid()) {
                                                return false;
                                            }
                                            $("#updateForm").submit();


                                        }


</script>