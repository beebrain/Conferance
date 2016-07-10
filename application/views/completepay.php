
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Payment</h1>
                <div class="col-lg-12 col-md-12">




                    <div class="panel-body">
                        <div class="alert alert-success">
                            <p class="lead text-center">Your payment confirm 
                            </p>
                        </div>
                        <div class="clearfix text-center"><h4> Your Order Detail </h4></div>
                        <div class="col-md-8 col-md-offset-2">
                            <?php if ($payment_data <> NULL) { ?>
                                <table class="table table-user-information ">

                                    <tbody>
                                        <tr>
                                            <td style="width: 30%" ><label>Name</label></td>
                                            <td><?= $payment_data[0]->title . " " . $payment_data[0]->first . " " . $payment_data[0]->mid . " " . $payment_data[0]->last ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%" ><label>Address </label></td>
                                            <td><?= $payment_data[0]->address ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%"> <label>Register rate </label></td>
                                            <td><?= $payment_data[0]->totalpay ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%" > <label>Order Date </label></td>
                                            <td><?= date("d/m/Y - h:i:s A", strtotime($payment_data[0]->submit_date)) . " (UTC+7)"; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%" > <label>Registation Type</label></td>
                                            <td><?= $payment_data[0]->student; ?></td>
                                        </tr>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>
                            <?php } else {
                                ?>
                                <table class="table table-user-information ">

                                    <tbody>
                                        <tr>
                                            <td style="width: 30%" ><label>Name</label></td>
                                            <td><?= $user_data->title . " " . $user_data->first . " " . $user_data->mid . " " . $user_data->last ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%" ><label>Address </label></td>
                                            <td>
                                                <p><?= $user_data->department . " " . $user_data->faculty; ?> </p>
                                                <p><?= $user_data->university; ?> </p>
                                                <p><?= $user_data->country; ?> </p>
                                                <p><?= $user_data->postcode; ?> </p>
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
                                <?php }
                            ?>
                        </div>
                    </div>

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