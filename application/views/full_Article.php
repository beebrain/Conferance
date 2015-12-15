
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main" id="showform">
                <h1 class="page-header">Full paper submission</h1>
                <div class="col-sm-8 col-md-offset-2" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Full paper submission
                            <?php //print_r($paticipation) ?>
                        </div>
                        <div class="panel-body" >

                            <?php
                            if ($paper == null) {
                                ?>
                                <?php
                                if ($paticipation == null || $paticipation->status == "-1") {
                                    ?>
                                    <div class="alert alert-warning">
                                        <p class="lead text-center"> We are so sorry. Please Submit your Abstract.</p>

                                    </div>
                                    <?php
                                } else if ($paticipation->status == "0") {
                                    ?>
                                    <div class="alert alert-info">
                                        <p class="lead text-center"> Please waiting. Your article is send to reviewers to review.</p>
                                    </div>
                                    <?php
                                } else if ($paticipation <> null && $paticipation->status == "1") {
                                    ?>

                                    <form class="form form-vertical" id="submitPaper" name = "submitPaper" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/UserController/submitPaper') ?>">

                                        <div class="row">
                                            <div class="col-md-4"><p><label>Paper title </label></p></div>
                                            <div class="col-md-8"><p><?= $paticipation->paper_title; ?> </p></div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"> <p><label>Field </label></p></div>
                                            <div class="col-md-8"><p> <?= $paticipation->Detail; ?> </p></div>

                                        </div>

                                        <div class="row">
                                            <?php //print_r($paticipation);  ?>

                                            <div class="col-md-4"><p> <label>Full paper/Proceeding</label></p></div>
                                            <div class="col-md-8">  
                                                <div class="controls">
                                                    <input type="file" value="Browse" name="paper" id="paper" >
                                                </div>
                                            </div>
                                        </div>
                                        <p></p>
                                        <div class="row">
                                            <div class="col-md-4">  <label>Type of Publication</label></div>
                                            <div class="col-md-8">  
                                                <div class="controls">
                                                    <select class="form-control" id="paper_type" name="paper_type">
                                                        <option value=""><p>Please select</p></option>
                                                        <option value="F"><p>Journal ("Advanced Materials Research")</p></option>
                                                        <option value="P"><p>Proceeding </p></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <p></p>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8">  
                                                <div class="controls">
                                                    <button type="button" onclick="sendData()" class="btn btn-primary pull-right">
                                                        submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                }
                            } else if ($paper->status == "0") {
                                ?>
                                <div class="alert alert-info">
                                    <p class="lead text-center"> Please waiting. Your Paper is in progress. </p>
                                </div>
                                <?php
                            } else if ($paper->status == "1") {
                                // resubmit
                                ?>

                                <div class="alert alert-warning">
                                    <p class="lead text-center"> Please, resubmit your edited paper.</p>
                                </div>
                                <form class="form form-vertical" id="submitPaper" name = "submitPaper" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/UserController/submitPaper') ?>">

                                    <div class="row">
                                        <?php //print_r($paper);  ?>

                                        <div class="col-md-4"><label>Full paper/Proceeding </label><label>(File type: .doc,.docx)</label></div>
                                        <div class="col-md-8">  
                                            <div class="controls">
                                                <input type="file" value="Browse" name="paper" id="paper" >

                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-md-4"><p>  <label>Type of Publication </label></p></div>
                                        <div class="col-md-8">  
                                            <div class="controls">
                                                <input type="hidden"  name="paper_type" value="<?php echo $paper->paper_code ?>">
                                                <select class="form-control" id="paper_type" name="paper_type" disabled="true">
                                                    <option value="F" <?php if ($paper->paper_code == 'F') echo "selected" ?>><p>Journal ("Advanced Materials Research")</p></option>
                                                    <option value="P" <?php if ($paper->paper_code == 'P') echo "selected" ?>><p>Proceeding </p></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-8">  
                                            <div class="controls">
                                                <button type="button" onclick="sendData()" class="btn btn-primary pull-right">
                                                    submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            } else if ($paper->status == "2") {
                                // success
                                ?>
                                <div class="alert alert-success">
                                    <p class="lead text-center"> Congratulations! We have accepted your Paper .<p>
                                </div>
                                <div class="clearfix text-center"><h4> Your Article Detail </h4></div>
                                <div class="col-md-10 col-md-offset-1">

                                    <table class="table table-user-information table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td style="width: 40%" class="text-left"><label>Paper title </label></td>
                                                <td><?= $paticipation->paper_title; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%" class="text-left"> <label>Field </label></td>
                                                <td><?= $paticipation->Detail; ?> </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%" class="text-left"> <label>Type of Presentation </label></td>
                                                <td><?= $paticipation->part_detail; ?> </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%" class="text-left">  <label>Abstract </label></td>
                                                <td><a href="<?= $paticipation->abstract_link; ?>">Link</a></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%" class="text-left"> <label>Type of Publication </label></td>
                                                <td><?= $paper->detailpaper ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%" class="text-left"><label>Paper</label></td>
                                                <td><a href="<?= $paper->paper_link; ?>">Link</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <?php
                            } else if ($paper->status == "-1") {
                                ?>
                                <div class="alert alert-danger">
                                    <p class="lead text-center">We are so sorry, your paper has not been accepted for journal.
                                        <br> But you can change your paper to publish in proceeding. 
                                        <br>If you want, please adjust your paper format and resubmit again.</p>
                                </div>
                                <div class="clearfix"></div>
                                <form class="form form-vertical" id="submitPaper" name = "submitPaper" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/UserController/submitPaper') ?>">
                                    <div class="row">
                                        <div class="col-md-4"><p><label>Paper title </label></p></div>
                                        <div class="col-md-8"><p> <?= $paticipation->paper_title; ?> </p></div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><p> <label>Field </label></p></div>
                                        <div class="col-md-8"><p> <?= $paticipation->Detail; ?></p> </div>

                                    </div>

                                    <div class="row">
                                        <?php //print_r($paticipation);  ?>

                                        <div class="col-md-4"><p> <label>Full paper/Proceeding</label></p></div>
                                        <div class="col-md-8">  
                                            <div class="controls">
                                                <input type="file" value="Browse" name="paper" id="paper" >
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-md-4"><p>  <label>Type of Publication </label></p></div>
                                        <div class="col-md-8">  
                                            <div class="controls">
                                                <input type="hidden"  name="paper_type" value="P">
                                                <select class="form-control" id="paper_type" name="paper_type" disabled="true">
                                                    <option value="P"><p>Proceeding </p></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-8">  
                                            <div class="controls">
                                                <button type="button" onclick="sendData()" class="btn btn-primary pull-right">
                                                    submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                            <div class="col-sm-offset-2 col-xs-offset-2 col-xs-8 col-sm-8" id="Confirm" hidden="true">
                                <h2>Confirm Data</h2>
                                <table class="table table-user-information table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%">Type of Publication:</td>
                                            <td><span id="paper_type_c">asdfasdf</span></td>
                                        </tr>
                                        <tr>
                                            <td>File Name :</td>
                                            <td><span id="paper_c">asdfasdf</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="pull-right">
                                    <button type="button" class="btn btn-outline btn-success" onclick="confirmData()">Confirm</button>
                                    <button type="button" class="btn btn-outline btn-warning" onclick="CancelData()">Cancel</button>
                                </p>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
            <!-- /.col-lg-12 -->
        </div>

    </div>

</div>


<script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/jquery.validate.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/additional-methods.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/bootstrap.min_.js') ?>"></script>
<script>
                                        $("#Confirm").hide();
                                        jQuery.validator.setDefaults({
                                            rules: {
                                                paper_type: {
                                                    required: true
                                                },
                                                paper: {
                                                    required: true,
                                                    extension: "doc|docx|pdf"
                                                }
                                            },
                                            messages: {
                                                paper_type: {
                                                    required: "<p class='text-danger'>This field is required.</p>",
                                                },
                                                paper: {
                                                    required: "<p class='text-danger'>This field is required.</p>",
                                                    extension: "<p class='text-danger'>File type invalid. (.doc .docx .pdf)</p>"
                                                }
                                            }
                                        });

                                        var form = $("#submitPaper");
                                        form.validate();
                                        console.log(form);
                                        function sendData() {
                                            if (form.valid()) {
                                                $("#paper_type_c").html($("#paper_type option:selected").text());
                                                $("#paper_c").html($("#paper").val().split('\\').pop());
                                                $("#Confirm").show();
                                                $("#submitPaper").hide();
                                            }
                                        }

                                        function confirmData() {
                                            if (form.valid()) {
                                                form.submit();
                                            }
                                        }
                                        function CancelData() {

                                            $("#Confirm").hide();
                                            $("#submitPaper").show();
                                        }
</script>



