
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


                        <div class="panel-body">
                            <form id="payform" action="<?php echo base_url('index.php/UserController/paymentSubmit') ?>" enctype="multipart/form-data" method="post">
                                <label>Payment Detail <?php //print_r($user_data)                                        ?></label>
                                <p style="color: red"></p>
                                <p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="pull-right">Name :</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $user_data->title . " " . $user_data->first . " " . $user_data->mid . " " . $user_data->last ?></p>

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
                                            <input type="hidden" id="address_pay_tem" value="<?php echo $user_data->department . ' ' . $user_data->faculty . ' ' . $user_data->university . ' ' . $user_data->state . ' ' . $user_data->country . ' ' . $user_data->postcode ?> ">
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
                                <div class = "row">
                                    <div class = "col-md-4">
                                        <p class = "pull-right">Registation Type :</p>
                                    </div>
                                    <div class = "col-md-8" >
                                        <select class = "form-control" id = "student" name = "student">
                                            <option value = "N">Regular</option>
                                            <option value = "S">Student</option>
                                        </select>
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
                                            <td class = "text-right"><button type = "button" class = "btn btn-success" onclick = "sendPay()" id="submitpayment">Submit Payment</button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </p>
                            </form>
                        </div>


                    </div>
                </div>



            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 alert-info">
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
        </div>
        <div class="row">
            <p>
                
            </p>
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

                                                    $('#checkaddress').click(function (i, value) {
                                                        var ex = $('#address_pay_tem').val();
                                                        $('#address_pay').val(ex);
                                                        console.log("x");
                                                    });


                                                    $('#nation,#student').change(function () {
                                                        updatePrice();
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

                                                    function updatePrice() {
                                                        $('#totalpay').val(checkprice());
                                                        $('#total').html(checkprice());
                                                    }

                                                    function addfollower() {
                                                        $('#follower').append("<div id=\"image" + indexfollower + "\" class = \'form-group input-group no-margin-bottom\'> </div> ");
                                                        $("#image" + indexfollower).append("<input  type = \"text \"class=\"form-control\" type=\"file\" name=\"follower[]\" ><span class=\"input-group-addon\" onclick=\" deletefollow(" + indexfollower + ")\" > <i class = \"fa fa-minus-circle\" ></i></span>");
                                                        ++indexfollower;
                                                        ++amountfollower;
                                                        updatePrice();
                                                    }


                                                    function deletefollow(id) {
                                                        $("#image" + id).remove();
                                                        --amountfollower;
                                                        updatePrice();
                                                    }


                                                    function sendPay() {
                                                        var form = $("#payform");
                                                        form.submit();
                                                    }

                                                    function checkprice() {
                                                        var early = "2016-06-01";
                                                        var normal = "2016-06-30";
                                                        var currentDate = "<?php echo date("Y-m-d"); ?>";

                                                        if (Date.parse(currentDate) <= Date.parse(early)) {
                                                            if ($('#nation').val() == 'T') {
                                                                if ($('#student').val() == 'S') {
                                                                    return 4000 + (amountfollower * 2000);
                                                                } else {
                                                                    return 4500 + (amountfollower * 2000);
                                                                }
                                                            } else {
                                                                if ($('#student').val() == 'S') {
                                                                    return 160 + (amountfollower * 60);
                                                                } else {
                                                                    return 180 + (amountfollower * 60);
                                                                }
                                                            }

                                                        } else if (Date.parse(currentDate) <= Date.parse(normal)) {
                                                            if ($('#nation').val() == 'T') {
                                                                if ($('#student').val() == 'S') {
                                                                    return 4500 + (amountfollower * 2000);
                                                                } else {
                                                                    return 5000 + (amountfollower * 2000);
                                                                }
                                                            } else {
                                                                if ($('#student').val() == 'S') {
                                                                    return 160 + (amountfollower * 60);
                                                                } else {
                                                                    return 180 + (amountfollower * 60);
                                                                }
                                                            }
                                                        } else {
                                                            $("#submitpayment").prop('disabled', true);
                                                            if ($('#nation').val() == 'T') {
                                                                if ($('#student').val() == 'S') {
                                                                    return "-";
                                                                } else {
                                                                    return "-";
                                                                }
                                                            } else {
                                                                if ($('#student').val() == 'S') {
                                                                    return "-";
                                                                } else {
                                                                    return "-";
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