
<div id="wrapper">
    <?php $this->load->view("Admin/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Payment <?php // print_r($payment) ?></h1>
                <div class="panel-body">

                    <div class="clearfix text-center"><h3> Payment Status </h3></div>
                    <div class="col-md-12">
                        <table class="table tab-content" id="dTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Pay Date</th>
<!--                                    <th>Address</th>-->
                                    <th>payment link</th>
                                    <th>student link</th>
                                    <th>student</th>
                                    <th>nation</th>
                                    <th>total</th>
                                    <th>status</th>
                                    <th>follower</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               // print_r($payment);
                                foreach ($payment as $key => $value) {
                                    ?>   

                                    <tr>
                                        <td><?=$value->submit_date?></td>
                                        <td><?=$value->title.$value->first." ".$value->mid." ".$value->last?></td>
                                        <td><?=$value->confirm_date?></td>
<!--                                        <td><?=$value->address?></td>-->
                                        <td><a href="<?=$value->payment_link?>">Link</a></td>
                                        <td><a href="<?=$value->student_link?>">Link</a></td>
                                        <td><?=$value->student?></td>
                                        <td><?=$value->nation?></td>
                                        <td><?=$value->totalpay?></td>
                                        <td><?=$value->status?></td>
                                        <td><?php echo sizeof($value->follower)?></td>
                                    </tr>
                                    <?php
                                }
                                ?> 
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
<script src="<?php echo base_url('asserts/js/datatable.js') ?>"></script>

<script>
    $('#dTable').DataTable();
</script>