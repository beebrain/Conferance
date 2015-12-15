
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header"> List Of Abstract</h1>
                <div class="panel-body">

                    <div class="clearfix text-center"><h3> List Of Abstract <?php echo print_r($abstract) ?></h3></div>
                    <div class="col-md-8 col-md-offset-2">

                        <table class="table table-user-information ">
                            <thead>
                                <tr>
                                    <th class="text-center"><label >Author</label></th>
                                    <th class="text-center"><label >Paper title</label></th>
                                    <th class="text-center"><label >Field</label></th>
                                </tr>
                            </thead>


                            <tfoot>
                                <tr>
                                    <?php foreach ($abstract as $key => $value) {
                                        ?>

                                        <td><?= $value->name ?></td>
                                        <td><?= $value->paper_title ?></td>
                                        <td><?= $value->Detail ?></td>
                                    <?php }
                                    ?>
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
