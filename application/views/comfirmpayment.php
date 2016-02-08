
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Payment</h1>
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>Payment Detail</h4>
                        </div>

                        <?php
                        if ($payment_data <> null && $payment_data->status == 0) {
                            //print_r($payment_data);
                            ?>
                            <div class="panel-body">
                                <div class="alert alert-success">
                                    <p class=" text-center">Attention!!! We have recieved your order, already. <br>Please transfer the conference fee within 48 hrs or your application process will be cancelled. <br>
                                        Thank you for attending the URUICST 2016.


                                    </p>
                                </div>


                                <div class="clearfix text-center"><h4> Your Order Detail </h4></div>
                                <div class="col-md-8 col-md-offset-2">

                                    <table class="table table-user-information ">

                                        <tbody>
                                            <tr>
                                                <td style="width: 30%" ><label>Name</label></td>
                                                <td><?= $payment_data->title . " " . $payment_data->first . " " . $payment_data->mid . " " . $payment_data->last ?></td>
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
                                                <td style="width: 30%" > <label>Order Date </label></td>
                                                <td><?= date("d/m/Y - h:i:s A", strtotime($payment_data->submit_date)) . " (UTC+7)"; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%" > <label>Registation Type</label></td>
                                                <td><?= $payment_data->student; ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30%" >  <label>Name follower </label></td>
                                                <td>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($follower_data as $key => $value) {
                                                        echo "<p>" . ++$i . " " . $value->follower_name . "</p>";
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
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-md-6 alert-info">
                                        <label>Payment method :</label>
                                        <ul>
                                            <li>
                                                1. Registration payment can be made via Bank transfer with the following information:<br><br>

                                                <blockquote>
                                                    Bank Name KRUNGTHAI BANK, Thailand <br>
                                                    Address of Bank 27 Injaimee Road, Maung, Uttaradit, Thailand 53000 <br>
                                                    Branch Uttaradit Rajabhat University <br>
                                                    Account Name URUICST 2016 <br>
                                                    Account No. 984-1-80575-8 <br>
                                                    Swift Code KRTHTHBK <br> <br> 
                                                </blockquote>
                                            </li>
                                            <li>
                                                2. Registration will only be confirmed upon receipt of payment.<br>
                                            </li>
                                            <li>
                                                3. Please scan the copied of transfer slip as an image file.(jpeg or pdf file) and upload during the registering procedure.<br>
                                            </li>
                                            <li>
                                                4. The receipt of registration will be given at the conference site.<br>
                                            </li>
                                        </ul>




                                    </div>
                                    <div class="col-md-6  alert-warning">
                                        <form id="payform" action="<?php echo base_url('index.php/UserController/paymentComfirm') ?>" enctype="multipart/form-data" method="post">
                                            <label>Payment Detail <?php //print_r($user_data)                                                                  ?></label>


                                            <p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="pull-right">Transferred Date :</p>
                                                    <p class="pull-right">(UTC+7)</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <div id="sandbox-container">
                                                        <input type="hidden" class="form-control" name="student" id="student" value="<?= $payment_data->student ?>">
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
                                                    <p class = "pull-right">Payment Document:</p>
                                                </div>
                                                <div class = "col-md-8" >
                                                    <div class = "controls">
                                                        <p>
                                                            <label>Pay-in transfer</label>
                                                            <input type = "file" value = "Browse" name = "payment_copy" id = "payment_copy" >
                                                        </p>
                                                    </div>
                                                    <?php if ($payment_data->student != "Regular") { ?>
                                                        <div class = "controls" >
                                                            <p>
                                                                <label>Student id card copy</label>
                                                                <input type = "file" value = "Browse" name = "student_copy" id = "student_copy" >
                                                            </p>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            </p>
                                            <p>
                                            <div class = "row">
                                                <div class = "col-md-12">
                                                    <button class="btn btn-primary pull-right" onclick="sendPay()" >
                                                        Send
                                                    </button>
                                                </div>

                                            </div>
                                    </div>
                                    </p>
                                    </form>
                                </div>
                            </div>


                        </div>


                    <?php } else if ($payment_data->status == 1) { ?>
                        <div class="panel-body">
                            <div class="alert alert-success">
                                <p class="lead text-center">Thank you Please wait we will checked your document.
                                </p>
                            </div>
                            <div class="clearfix text-center"><h4> Your Order Detail </h4></div>
                            <div class="col-md-8 col-md-offset-2">

                                <table class="table table-user-information ">

                                    <tbody>
                                        <tr>
                                            <td style="width: 30%" ><label>Name</label></td>
                                            <td><?= $payment_data->title . " " . $payment_data->first . " " . $payment_data->mid . " " . $payment_data->last ?></td>
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
                                            <td style="width: 30%" > <label>Order Date </label></td>
                                            <td><?= date("d/m/Y - h:i:s A", strtotime($payment_data->submit_date)) . " (UTC+7)"; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%" > <label>Registation Type</label></td>
                                            <td><?= $payment_data->student; ?></td>
                                        </tr>

                                        <tr>
                                            <td style="width: 30%" >  <label>Name follower </label></td>
                                            <td>
                                                <?php
                                                $i = 0;
                                                foreach ($follower_data as $key => $value) {
                                                    echo "<p>" . ++$i . " " . $value->follower_name . "</p>";
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
                            <div class="alert alert-success">
                                <p class="lead text-center">Your payment confirm 
                                </p>
                            </div>
                            <div class="clearfix text-center"><h4> Your Order Detail </h4></div>
                            <div class="col-md-8 col-md-offset-2">

                                <table class="table table-user-information ">

                                    <tbody>
                                        <tr>
                                            <td style="width: 30%" ><label>Name</label></td>
                                            <td><?= $payment_data->title . " " . $payment_data->first . " " . $payment_data->mid . " " . $payment_data->last ?></td>
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
                                            <td style="width: 30%" > <label>Order Date </label></td>
                                            <td><?= date("d/m/Y - h:i:s A", strtotime($payment_data->submit_date)) . " (UTC+7)"; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%" > <label>Registation Type</label></td>
                                            <td><?= $payment_data->student; ?></td>
                                        </tr>

                                        <tr>
                                            <td style="width: 30%" >  <label>Name follower </label></td>
                                            <td>
                                                <?php
                                                $i = 0;
                                                foreach ($follower_data as $key => $value) {
                                                    echo "<p>" . ++$i . " " . $value->follower_name . "</p>";
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
                        <?php
                    }
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
                                                        var indexfollower = 0;
                                                        var amountfollower = 0;
                                                        var priceThai = 180;
                                                        var priceEng = 180;
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
                                                                    extension: "pdf|jpg"
                                                                },
                                                                student_copy: {
                                                                    required: true,
                                                                    extension: "pdf|jpg"
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
                                                                    extension: "<p class='text-danger'>File type invalid. (.pdf .jpg)</p>"
                                                                },
                                                                student_copy: {
                                                                    required: "<p class='text-danger'>This field is required.</p>",
                                                                    extension: "<p class='text-danger'>File type invalid. (.pdf  .jpg )</p>"
                                                                }
                                                            }
                                                        });

                                                        var validdform = $("#payform").validate();


                                                        function sendPay() {
                                                            var form = $("#payform");
                                                            validdform.element("#datePay");
                                                            validdform.element("#payment_copy");
                                                            validdform.element("#student_copy");
                                                            form.submit();
                                                        }

                                                        $(document).ready(function () {


                                                            $('#sandbox-container .input-group.date').datepicker({
                                                                format: "dd-mm-yyyy"
                                                            });
                                                        });
</script>