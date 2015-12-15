
<div id="wrapper">
    <?php $this->load->view("Admin/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Full Paper Manage</h1>
                <div class="panel-body">
                    <form method="get" action="<?php echo base_url('index.php/AdminPanel/fullArticle') ?> ">
                        <div class="col-lg-4">

                            <select name="citeria" class="form-control">
                                <option value="0">Wait Review</option>
                                <option value="1">Resubmit</option>
                                <option value="2">Approved</option>
                                <option value="3">Reject</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-default">Send</button>

                        </div>
                    </form>
                </div>
                <div class="panel-body">

                    <div class="clearfix text-center"><h3> <?= $status ?> </h3></div>
                    <div class="col-md-12">
                        <table class="table tab-content" id="dTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Type Paper</th>
                                    <th>Link Paper</th>
                                    <th>Link Abstract</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($paper as $key => $value) {
                                    ?>   

                                    <tr>
                                        <td><?= $value->paper_id ?></td>
                                        <td><?= $value->paper_title ?></td>
                                        <td><?= $value->detailpaper ?></td>
                                        <td><a href="<?= $value->paper_link ?>">Link</a></td>
                                        <td><a href="<?= $value->abstract_link ?>">Link</a></td>
                                        <td><?= $value->name ?></td>
                                        <td><?php
                                            if ($value->status == 0) {
                                                echo "Wait Review";
                                            } else if ($value->status == 1) {
                                                echo "Resubmit";
                                            } else if ($value->status == 2) {
                                                echo "Approved";
                                            } else {
                                                echo "Reject";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($value->status == 0) {
                                                echo "<p><a href=" . base_url('index.php/AdminController/fullpaperChange/1/') . "/" . $value->paper_id . " >Resubmit</a></p> "
                                                . "<p>  <a href=" . base_url('index.php/AdminController/fullpaperChange/2') . "/" . $value->paper_id . " >Approved</a></p> "
                                                . "<p>  <a href=" . base_url('index.php/AdminController/fullpaperChange/-1') . "/" . $value->paper_id . " >Reject</a></p> ";
                                            }
                                            ?>

                                        </td>
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