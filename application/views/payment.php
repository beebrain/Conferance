
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Payment</h1>
                <div class="col-lg-offset-2 col-lg-8 col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>Payment Detail</h4>
                        </div>

                        <?php if ($payment_data <> null && $payment_data->status == 0) { ?>
                            <div class="panel-body">
                                <div class="alert alert-success">
                                    <p class="lead text-center"> We have recieved your payment, already.<br> Thank you for attending the URUICST 2016.</p><p>
                                    </p>
                                </div>
                                <div class="clearfix text-center"><h4> Your Payment Detail </h4></div>
                                <div class="col-md-8 col-md-offset-2">

                                    <table class="table table-user-information ">

                                        <tbody>
                                            <tr>
                                                <td style="width: 30%" ><label>Name</label></td>
                                                <td><?= $user_data->name ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%" ><label>Address </label></td>
                                                <td><?= $payment_data->address ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%"> <label>Register rate </label></td>
                                                <td><?= $payment_data->totalpay ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%" > <label>Payment Date </label></td>
                                                <td><?= $payment_data->date ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%" >  <label>Name follower </label></td>
                                                <td>
                                                    <?php
                                                    foreach ($follower_data as $key => $value) {
                                                        echo "<p>" . $value->follower_name . "</p>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="panel-body">
                                <form id="payform" action="<?php echo base_url('index.php/UserController/paymentSubmit') ?>" enctype="multipart/form-data" method="post">
                                    <label>Payment Detail <?php //print_r($user_data)                         ?></label>
                                    <p style="color: red"></p>
                                    <p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="pull-right">Name :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $user_data->name ?></p>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="pull-right">Address for receipt :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea class="form-control" id="address_pay" name="address_pay" rows="3"></textarea>
                                                <input type="hidden" id="address_pay_tem" value="<?php echo $user_data->address . ' ' . $user_data->state . ' ' . $user_data->country . ' ' . $user_data->postcode ?> ">
                                                <input type="checkbox" id="checkaddress">  <label>Same registration address.</label>

                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="pull-right">Nationality :</p>
                                        </div>
                                        <div class="col-md-8" >
                                            <select class="form-control" id="nation" name="nation">
                                                <option value="F">Foreigner</option>
                                                <option value="T">Thailand</option>
                                            </select>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="pull-right">Transferred Bank:</p>
                                        </div>
                                        <div class="col-md-8" >
                                            <select class="form-control" id="Bank">
                                                <option value="KTB">Bank 1</option>
                                                <option value="KCS">Bank 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="pull-right">Transferred Date :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div id="sandbox-container">
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="datePay" id="datePay">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <select name="time" class="form-control" id="time">
                                                        <option value="">Select Time</option>
                                                        <?php
                                                        $start = "00:00";
                                                        $end = "23:30";

                                                        $tStart = strtotime($start);
                                                        $tEnd = strtotime($end);
                                                        $tNow = $tStart;

                                                        while ($tNow <= $tEnd) {
                                                            echo "<option value='" . date('H:i', $tNow) . "'>" . date("H:i", $tNow) . "</option>";
                                                            $tNow = strtotime('+30 minutes', $tNow);
                                                        }
                                                        ?>
                                                    </select>
                                                </div></div>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class = "row">
                                        <div class = "col-md-4">
                                            <p class = "pull-right">Registation Mode :</p>
                                        </div>
                                        <div class = "col-md-8" >
                                            <select class = "form-control" id = "student" name = "student">
                                                <option value = "N">Non Student</option>
                                                <option value = "S">Student</option>
                                            </select>
                                        </div>
                                    </div>
                                    </p>

                                    <p>
                                    <div class = "row">
                                        <div class = "col-md-4">
                                            <p class = "pull-right">Payment Document:</p>
                                        </div>
                                        <div class = "col-md-8" >
                                            <div class = "controls">
                                                <p>
                                                    <label>Pay-in transfer</label>
                                                    <input type = "file" value = "Browse" name = "payment_copy" id = "payment_copy" >
                                                </p>
                                            </div>

                                            <div class = "controls" id = "addStudent_copy">
                                                <p>
                                                    <label>Student id card copy</label>
                                                    <input type = "file" value = "Browse" name = "student_copy" id = "student_copy" >
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class = "row">
                                        <div class = "col-md-4">
                                            <p class = "pull-right">Accompany person name:</p>
                                        </div>
                                        <div class = "col-md-8" >
                                            <span id = "follower">
                                                <p>
                                                    <input type = "text" class = "form-control" name = "follower[]" value = "">
                                                </p>
                                            </span>
                                            <i class = "fa fa-2x fa-plus-square-o" onclick = "addfollower()"></i>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class = "col-md-12">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>
                                        <table class = "table table-user-information ">
                                            <tbody>
                                                <tr>
                                                    <td style = "width: 30%" ><h4>Registration fees</h4></td>
                                                    <td class = "text-right"><h4><span id = "currFor" >$</span><span id = "total" ></span><span id = "currThai" >B</span></h4></td>
                                            <input type = "hidden" name = "totalpay" id = "totalpay" value = "0">

                                            </tr>
                                            <tr>
                                                <td style = "width: 30%" ></td>
                                                <td class = "text-right"><button type = "button" class = "btn btn-success" onclick = "sendPay()">Submit Payment</button></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </form>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>

            </div>
            <!-- /.col-lg-12 -->
        </div>

    </div>

</div>


<script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/jquery.validate.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/bootstrap.min_.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/additional-methods.min.js') ?>"></script>
<script>

                                                    jQuery.validator.setDefaults({
                                                        rules: {
                                                            address_pay: {
                                                                required: true
                                                            },
                                                            datePay: {
                                                                required: true
                                                            },
                                                            time: {
                                                                required: true
                                                            },
                                                            payment_copy: {
                                                                required: true,
                                                                extension: "doc|docx|jpg|tiff|png|gif"
                                                            },
                                                            student_copy: {
                                                                required: true,
                                                                extension: "doc|docx|jpg|tiff|png|gif"
                                                            }
                                                        },
                                                        messages: {
                                                            address_pay: {
                                                                required: "<p class='text-danger'>This field is required.</p>"
                                                            },
                                                            datePay: {
                                                                required: "<p class='text-danger'>This field is required.</p>"
                                                            },
                                                            time: {
                                                                required: "<p class='text-danger'>This field is required.</p>"
                                                            },
                                                            payment_copy: {
                                                                required: "<p class='text-danger'>This field is required.</p>",
                                                                extension: "<p class='text-danger'>File type invalid. (.doc .docx .pdf)</p>"
                                                            },
                                                            student_copy: {
                                                                required: "<p class='text-danger'>This field is required.</p>",
                                                                extension: "<p class='text-danger'>File type invalid. (.doc .docx .pdf)</p>"
                                                            }
                                                        }
                                                    });

                                                    var validdform = $("#payform").validate();



                                                    $('#checkaddress').click(function (i, value) {
                                                        var ex = $('#address_pay_tem').val();
                                                        $('#address_pay').val(ex);
                                                        console.log("x");
                                                    });


                                                    $('#nation,#student').change(function () {
                                                        $('#totalpay').val(checkprice());
                                                        $('#total').html(checkprice());

                                                        if ($('#nation').val() == 'T') {
                                                            $('#currFor').hide();
                                                            $('#currThai').show();
                                                        } else {
                                                            $('#currFor').show();
                                                            $('#currThai').hide();
                                                        }

                                                        if ($('#student').val() == 'S') {
                                                            $('#addStudent_copy').show();
                                                        } else {
                                                            $('#addStudent_copy').hide();
                                                        }
                                                    });
                                                    function addfollower() {
                                                        $('#follower').append("<p><input type='text' class='form-control' name='follower[]' value=''></p>");
                                                    }

                                                    function sendPay() {
                                                        var form = $("#payform");
                                                        validdform.element("#address_pay");
                                                        validdform.element("#datePay");
                                                        validdform.element("#payment_copy");
                                                        if ($('#student').val() == 'S') {
                                                            console.log("CheckStudent");
                                                            validdform.element("#student_copy");
                                                        }
                                                        form.submit();

                                                    }
                                                    function checkprice() {
                                                        var early = "2015-11-25";
                                                        var normal = "2015-11-26";
                                                        var late = "2015-11-27";
                                                        var currentDate = "<?php echo date("Y-m-d"); ?>";
                                                        if (Date.parse(currentDate) <= Date.parse(early)) {
                                                            if ($('#nation').val() == 'T') {
                                                                if ($('#student').val() == 'S') {
                                                                    return 1200;
                                                                } else {
                                                                    return 1500;
                                                                }
                                                            } else {
                                                                if ($('#student').val() == 'S') {
                                                                    return 100;
                                                                } else {
                                                                    return 120;
                                                                }
                                                            }

                                                        } else if (Date.parse(currentDate) <= Date.parse(normal)) {
                                                            if ($('#nation').val() == 'T') {
                                                                if ($('#student').val() == 'S') {
                                                                    return 1500;
                                                                } else {
                                                                    return 2000;
                                                                }
                                                            } else {
                                                                if ($('#student').val() == 'S') {
                                                                    return 100;
                                                                } else {
                                                                    return 120;
                                                                }
                                                            }
                                                        } else {
                                                            if ($('#nation').val() == 'T') {
                                                                if ($('#student').val() == 'S') {
                                                                    return 1800;
                                                                } else {
                                                                    return 2500;
                                                                }
                                                            } else {
                                                                if ($('#student').val() == 'S') {
                                                                    return 100;
                                                                } else {
                                                                    return 120;
                                                                }
                                                            }
                                                        }

                                                    }


                                                    $(document).ready(function () {
                                                        $('#addStudent_copy').hide();
                                                        $('#totalpay').val(checkprice());
                                                        $('#total').html(checkprice());
                                                    });
                                                    $('#currFor').show();
                                                    $('#currThai').hide();
                                                    $('#sandbox-container .input-group.date').datepicker({
                                                        format: "dd-mm-yyyy"
                                                    });
</script>