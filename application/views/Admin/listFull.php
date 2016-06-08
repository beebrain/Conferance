
<div class="row">
    <div class="col-lg-12 main">
        <h1 class="page-header">Full Paper Manage</h1>
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
                            <th>Type Paper</th>
                            <th>Paticipate</th>
                            <th>Author</th>
                            <th>email</th>
                            <th>university</th>
                            <th>tel</th>
                            <th>field</th>
                            <th>link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($paper as $key => $value) {
                            ?>   

                            <tr>
                                <td><?= $value->user_id ?></td>
                                <td><?= $value->article_code ?></td>
                                <td><?= $value->paper_title ?></td>
                                <td><?= $value->fdetail ?></td>
                                <td><?= $value->detail ?><!--<a href="<?= base_url() . "/upload/" . $value->paper_link ?>">Link</a>--></td>
                                <td><?= $value->title . " " . $value->first . " " . $value->mid . " " . $value->last ?></td>
                                <td><?= $value->email ?></td>
                                <td><?= $value->university ?></td>
                                <td><?= $value->phone ?></td>
                                <td id="f-<?= $value->article_code ?>"><?php
                                    if ($value->field_major <> "") {
                                        echo $value->field_major;
                                    } else {
                                        ?>
                                        <input list="browsers" id="<?= $value->article_code ?>">
                                        <datalist id="browsers">
                                            <option value="Chemistry">
                                            <option value="Physic">
                                            <option value="Public Health">
                                            <option value="Computer">
                                            <option value="Mathematics">
                                            <option value="Biology">
                                        </datalist>
                                        <input onclick="saveField('<?= $value->article_code ?>')" type="button" value="save">
                                    <?php }
                                    ?></td>
                                <td><a href="<?= base_url() . "/upload/" . $value->paper_link ?>">link</a></td>
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

<script>
                                    $('#dTable').DataTable();

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