
<div id="wrapper">
    <?php $this->load->view("Admin/nav") ?>

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
                                    <th>university</th>
                                    <th>paper Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>participation</th>
                                    
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($user as $key => $value) {
                                    ?>   

                                    <tr>
                                        <td><?=$value->user_id?></td>
                                        <td><?=$value->first." ".$value->mid." ".$value->last?></td>
                                        <td><?=$value->university?></td>
                                        <td><?=$value->paper_title?></td>
                                        
                                        <td><?=$value->email?></td>
                                        <td><?=$value->phone?></td>
                                        <td><?=$value->detail?></td>
                                        
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