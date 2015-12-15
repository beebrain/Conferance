
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form role="form" id="updateForm" method="post" action="<?php echo base_url('index.php/UserController/updateUser') ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Profile</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name = "user_id" id = "user_id" value="<?= $user_data->user_id ?>">
                        <div class="form-group">
                            <label for="Full Name">Full Name</label>
                            <input type="text" name = "Name" id = "Name" class="form-control" placeholder="Full name" required value="<?= $user_data->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="Gender">Gender</label>
                            <select class="form-control" id="Gender" name="Gender">
                                <option value="M"><p>Man</p></option>
                                <option value="W"><p>Woman</p></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Address">Address:</label>
                            <textarea name = "address" id = "address"class="form-control" placeholder="Adress" rows="3"><?= $user_data->address ?></textarea>
                            <input type="text" name = "state" id = "state"  class="form-control" placeholder="State/Province" required value="<?= $user_data->state; ?>">
                            <input type="text" name = "country" id = "country" class="form-control" placeholder="Country/Region" required value="<?= $user_data->country; ?>"> 
                            <input type="text" name = "postcode" id = "postcode" class="form-control" placeholder="PostCode" required value="<?= $user_data->postcode; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Phone Number">Phone </label>
                            <input type="text" name = "phone" id = "phone" class="form-control" placeholder="Phone Number" required value="<?= $user_data->phone ?>">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" name = "email" id = "email" class="form-control" placeholder="email" value="<?= $user_data->email ?>" disabled>
                        </div>

                        <div class="form-group pull-right">
                            <button type="button" onclick="sendData()">Submit</button>
                        </div>

                    </div>
                    <div class="modal-footer">

                    </div>
                </form>
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
                                    <h2>Name</h2>
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>Full Name:</td>
                                                <td><?= $user_data->name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php
                                                    if ($user_data->gender == "M") {
                                                        echo "Man";
                                                    } else {
                                                        echo "Woman";
                                                    }
                                                    ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><?= $user_data->address . $user_data->state . $user_data->country . $user_data->postcode; ?></td>
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
<script>
                                jQuery.validator.setDefaults({
                                    rules: {
                                        fullname: "required",
                                        state: "required",
                                        country: "required",
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
                                        fullname: "<p class='text-danger'>This field is required.</p>",
                                        state: "<p class='text-danger'>This field is required.</p>",
                                        country: "<p class='text-danger'>This field is required.</p>",
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

                                var form = $("#updateForm");
                                form.validate();
                                function sendData() {
                                    if (!$("#updateForm").valid()) {
                                        return false;
                                    }
                                    $("#updateForm").submit();
                                }
</script>