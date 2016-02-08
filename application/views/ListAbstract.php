<link rel="stylesheet" href="<?php echo base_url('asserts/css/jquery.dataTables.min.css') ?>">
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header"> List Of Abstract</h1>
                <div class="panel-body">

                    <div class="clearfix text-center"><h3> List Of Abstract <?php //print_r($abstract)         ?></h3></div>
                    <div class="col-md-10 col-md-offset-1">

                        <table id="listmember" >
                            <thead>
                                <tr>
                                    <th class="text-center"><label >#</label></th>
                                    <th class="text-center"><label >Paper title</label></th>
                                    <th class="text-center"><label >Field</label></th>
                                    <th class="text-center"><label >Author</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if ($paper <> NULL) {

                                    foreach ($paper as $key => $value) {
                                        ?>
                                        <tr >
                                            <td ><?= $value->article_code ?></td>
                                            <td><?= $value->paper_title ?></td>
                                            <td class="text-center"><?= $value->fdetail ?></td>
                                            <td class="text-center"><?= $value->first . " " . $value->mid . " " . $value->last ?></td>
                                        </tr>
                                    <?php
                                    }
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

    $('#listmember').DataTable();
</script>