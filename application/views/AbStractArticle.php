<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main">
                <h1 class="page-header">Abstract Submission</h1>
                <div class="col-sm-offset-2 col-sm-8 col-xs-12" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Abstract Submission
                            <?php //print_r($paticipation) ?>
                        </div>
                        <div class="panel-body" >
                            <?php
                            if ($paticipation == null || $paticipation->status == "-1") {
                                ?>
                                <form class="form form-vertical" id="submitPaper" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/UserController/submitAbstract') ?>">
                                    <div class="form-group">
                                        <label>Type of Presentation</label>
                                        <div class="controls">
                                            <select class="form-control" id="participation_type" name="participation_type">
                                                <option value=""><p>Please select</p></option>
                                                <option value="O"><p>Oral Presentation</p></option>
                                                <option value="P"><p>Poster Presentation</p></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="submit_ab">
                                        <div class="form-group">
                                            <label>Paper title</label>
                                            <div class="controls">
                                                <input class="form-control" placeholder="Paper title" id="paper_title" name = "paper_title">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Abstract (File types:.doc, .docx)</label>
                                            <div class="controls">
                                                <input type="file" value="Browse" name="abstract" id="abstract" >
                                            </div>
                                        </div>



                                        <div class="form-group" >
                                            <div class="form-group">
                                                <label>Select field</label>
                                                <div class="controls">
                                                    <select class="form-control" id="field_type" name="field_type">
                                                        <option value=""><p>Please select Topic</p></option>
                                                        <option value="P"><p>Pure Sciences</p></option>
                                                        <option value="A"><p>Applied Sciences</p></option>
                                                        <option value="H"><p>Health Science</p></option>
 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="controls">
                                            <label></label>
                                            <button type="button" onclick="sendData()" class="btn btn-primary pull-right">
                                                submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>

                            <?php if ($paticipation <> null && $paticipation->status == "0") { ?>
                                <div class="alert alert-info">
                                    <p class="lead text-center"> Thank you We recieved your abstract already.<br> Please waiting. <br>Your article is in progress.</p>
                                </div>
                            <?php } else if ($paticipation <> null && $paticipation->status == "1") { ?>
                                <div class="alert alert-success" >
                                    <p class="lead text-center"> Congratulations! We accepted your article .<br> Please send paper in Full paper submission</p>
                                </div>
                            <?php } ?>

                            <?php
                            if ($paticipation <> null && $paticipation->status <> "-1") {
                                ?>
                                <div class="col-sm-offset-1 col-sm-10 col-xs-12" >
                                    <span class="text-center"><h4> Your Article detail</h4></span>
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 40%">Type of Presentation:</td>
                                                <td><?php echo $paticipation->part_detail ?></td>
                                            </tr>
                                            <tr>
                                                <td>Paper title :</td>
                                                <td><?php echo $paticipation->paper_title ?></td>
                                            </tr>
                                            <tr>
                                                <td>Abstract :</td>
                                                <td><a href="<?= $paticipation->abstract_link ?>">Link Abstract</a></td>
                                            </tr>
                                            <tr>
                                                <td>Field :</td>
                                                <td><?php echo $paticipation->Detail ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            <?php } ?>

                            <div class="col-sm-offset-1 col-sm-10 col-xs-12" id="Confirm">
                                <h4>Confirm Submit Abstract</h4>
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">Type of Presentation:</td>
                                            <td><span id="Part_c">asdfasdf</span></td>
                                        </tr>
                                        <tr>
                                            <td>Paper title :</td>
                                            <td><span id="title_c">asdfasdf</span></td>
                                        </tr>
                                        <tr>
                                            <td>Abstract : </td>
                                            <td><span id="Abstract_c">asdfasdf</span></td>
                                        </tr>

                                        <tr>
                                            <td>Field :</td>
                                            <td><span id="field_c">asdfasdf</span></td>
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

        </div>
    </div>

</div>
<script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/jquery.validate.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/additional-methods.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/bootstrap.min_.js') ?>"></script>
<script>
                                        $("#participation_type").on('change', function () {
                                            var value_se = $('#participation_type').val();
                                            console.log(value_se);
                                            if (value_se == "L") {
                                                $("#submit_ab").hide();
                                            } else {
                                                $("#submit_ab").show();
                                            }
                                        });
                                        $("#Confirm").hide();

                                        jQuery.validator.setDefaults({
                                            rules: {
                                                paper_title: {
                                                    required: true,
                                                },
                                                abstract: {
                                                    required: true,
                                                    extension: "doc|docx|pdf"
                                                },
                                                field_type: {
                                                    required: true,
                                                },
                                                participation_type: {
                                                    required: true,
                                                }

                                            },
                                            messages: {
                                                paper_title: {
                                                    required: "<p class='text-danger'>This field is required.</p>",
                                                },
                                                abstract: {
                                                    required: "<p class='text-danger'>This field is required.</p>",
                                                    extension: "<p class='text-danger'>File type invalid. (.doc .docx .pdf)</p>"
                                                },
                                                field_type: {
                                                    required: "<p class='text-danger'>Please select an items.</p>",
                                                },
                                                participation_type: {
                                                    required: "<p class='text-danger'>Please select an items.</p>",
                                                },
                                            }
                                        });

                                        var form = $("#submitPaper");
                                        form.validate();
                                        console.log(form);
                                        function sendData() {
                                            if (form.valid()) {
                                                $("#Part_c").html($("#participation_type option:selected").text());
                                                $("#title_c").html($("#paper_title").val());
                                                $("#Abstract_c").html($("#abstract").val().split('\\').pop());
                                                $("#field_c").html($("#field_type option:selected").text());
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