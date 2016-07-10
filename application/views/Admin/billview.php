<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<div class="row">
    <div class="col-lg-12 main">
        <h1 class="page-header">Bill Info</h1>
        <div class="panel-body">
        </div>
        <div class="panel-body">

            <div class="clearfix text-center"><h3> </h3></div>
            <div class="col-md-12">
                <table class="table tab-content" id="dTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>article_code</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Address</th>
                            <th>tel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //print_r($datauser);
                        foreach ($datauser as $key => $value) {
                            ?>   
                            <tr>
                                <td><?= $value['user']->user_id ?></td>
                                <td><?= $value['paper']->article_code ?></td>
                                <td><?= $value['paper']->paper_title ?></td>
                                <td><?= $value['paper']->title . " " . $value['paper']->first . " " . $value['paper']->last ?></td>
                                <td><?= $value['Address'] ?></td>
                                <td><?= $value['user']->phone ?></td>
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



<script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/jquery.validate.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/bootstrap.min_.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/datatable.js') ?>"></script>

<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

<script>

    $(document).ready(function () {
        $('#dTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                 'excel'
            ]
        });
    });
    function saveField(code) {
        console.log(code);
        var formData = $('#' + code).val();
        console.log(formData);
        var URL = "<?= base_url('index.php/AdminController/UpdateField') ?>"
        $.post(URL, {article_code: code, field_major: formData}, function (data) {
            var data_json = jQuery.parseJSON(data);

            console.log(data);
            $('#f-' + code).html(data_json['major']);

            }).fail(function (jqXHR, textStatus, errorThrown)
            {
            console.log("Fail");
            });


    }
</script>