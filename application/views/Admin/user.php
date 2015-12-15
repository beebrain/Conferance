
<div id="wrapper">
    <?php $this->load->view("Admin/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Main</h1>
                <div class="panel-body">

                    <div class="clearfix text-center"><h3>All User</h3></div>

                        <table class="dataTable display" id="dTable" >
                            <thead>
                                <tr>
                                    <th>userid</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($user as $key => $value) {
                                    ?>   

                                    <tr>
                                        <td><?=$value->user_id?></td>
                                        <td><?=$value->name?></td>
                                        <td><?=$value->address?></td>
                                        <td><?=$value->gender?></td>
                                        <td><?=$value->country?></td>
                                        <td><?=$value->email?></td>
                                        <td><?=$value->phone?></td>
                                        <td>delete</td>
                                        <td>edit</td>
                                    </tr>
                                    <?php
                                }
                                ?> 
                            </tbody>
                        </table>
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