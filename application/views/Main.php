
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Main</h1>
                <div class="panel-body">

                    <div class="clearfix text-center"><h3> Conference Status </h3></div>
                    <div class="col-md-8 col-md-offset-2">

                        <table class="table table-user-information ">
                            <thead>
                                <tr>
                                    <th style="width: 70%" class="text-center"><label >Section</label></th>
                                    <th class="text-center"><label >Status</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td  style="width: 70%"><label>Abstract Submission</label>
                                            <p>This section for submit your abstract.</p>
                                    </td>
                                    <td class="text-center"><label><?php
                                            if ($abstract == null) {
                                                echo "unSubmit";
                                            } elseif ($abstract->status == '0') {
                                                echo "waiting for revision";
                                            } elseif ($abstract->status == '1') {
                                                echo "Approved";
                                            }
                                            ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="width: 70%"><label>Full paper Submission</label>
                                        <p>This section you should submit full paper to reviewer</p>
                                        <p>if you select public with fullpaper you must pay for fullpaper.</p>
                                    </td>
                                    <td class="text-center"><label><?php
                                            if ($paper == null) {
                                                echo "N/A";
                                            } elseif ($paper->status == '0') {
                                                echo "waiting for revision";
                                            } elseif ($paper->status == '1') {
                                                echo "Please Resubmit";
                                            } elseif ($paper->status == '2') {
                                                echo "Approved";
                                            } else {
                                                echo "Not accepted for journal";
                                            }
                                            ?>
                                        </label></td>
                                </tr>
                                <tr>
                                    <td style="width: 70%"> <label>Payment </label>
                                        <p>This section for sent copy tranfer payment to staff</p>
                                    </td>
                                    <td class="text-center"><label><?php
                                            if ($payment == null) {
                                                echo "N/A";
                                            } elseif ($payment->status == '0') {
                                                echo "Checking";
                                            } elseif ($payment->status == '1') {
                                                echo "Approved";
                                            }  else {
                                                echo "Please Resubmit payment ";
                                            }
                                            ?>
                                        </label></td>
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

            </div>
            <!-- /.col-lg-12 -->
        </div>

    </div>

</div>


<script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/jquery.validate.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/bootstrap.min_.js') ?>"></script>
