
<div class="container-fluid">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Participation Mode</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Participation</h4>
                <?php //print_r($paticipation) ?>
            </div>
            <div class="panel-body" >
                <?php
                if ($paticipation == null || $paticipation->status == "-1") {
                    ?>
                    <form class="form form-vertical" id="submitPaper" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/UserController/submitPaper') ?>">
                        <div class="form-group">
                            <label>Participation</label>
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
                                <label>Publication</label>
                                <div class="controls">
                                    <select class="form-control" id="paper_type" name="paper_type">
                                        <option value=""><p>Please select</p></option>
                                        <option value="F"><p>Full Paper</p></option>
                                        <option value="P"><p>Proceeding </p></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Abstract</label>
                                <div class="controls">
                                    <input type="file" value="Browse" name="abstract" id="abstract" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Full paper/Proceeding</label>
                                <div class="controls">
                                    <input type="file" value="Browse" name="paper" id="paper" >
                                </div>
                            </div>

                            <div class="form-group" >
                                <div class="form-group">
                                    <label>Select field</label>
                                    <div class="controls">
                                        <select class="form-control" id="field_type" name="field_type">
                                            <option value=""><p>Please select Topic</p></option>
                                            <option value="P"><p>Physical Science</p></option>
                                            <option value="B"><p>Biological Science </p></option>
                                            <option value="H"><p>Health Science</p></option>
                                            <option value="C"><p>Computer and Information Technology</p></option>
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


                <div class="alert alert-danger" hidden="true">
                    So sorry We don't accepted your paper.
                </div>
                <div class="col-sm-offset-2 col-xs-offset-2 col-xs-8 col-sm-8" id="Confirm">
                    <h2>Confirm Submit paper</h2>
                    <table class="table table-user-information table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 30%">Participation:</td>
                                <td><span id="Part_c">asdfasdf</span></td>
                            </tr>
                            <tr>
                                <td>Paper title :</td>
                                <td><span id="title_c">asdfasdf</span></td>
                            </tr>
                            <tr>
                                <td>Publication:</td>
                                <td><span id="pub_c">asdfasdf</span></td>
                            </tr>
                            <tr>
                                <td>Abstract : </td>
                                <td><span id="Abstract_c">asdfasdf</span></td>
                            </tr>
                            <tr>
                                <td>Full paper/Proceeding :</td>
                                <td><span id="paper_c">asdfasdf</span></td>
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

                <?php
                if ($paticipation <> null && $paticipation->status <> "-1") {
                    ?>
                    <div class="col-sm-offset-2 col-xs-offset-2 col-xs-8 col-sm-8" id="Confirm">
                        <h2>Detail Submit Paper</h2>

                        <table class="table table-user-information table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 30%">PaperCode:</td>
                                    <td><?php echo $paticipation->participation_type . $paticipation->paper_type . $paticipation->field_type . $paticipation->paticipation_id; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%">Participation:</td>
                                    <td><?php echo $paticipation->partDetail ?></td>
                                </tr>
                                <tr>
                                    <td>Paper title :</td>
                                    <td><?php echo $paticipation->paper_title ?></td>
                                </tr>

                                <tr>
                                    <td>Publication : </td>
                                    <td><?php
                                        if ($paticipation->paper_type == "P") {
                                            echo "Proceeding";
                                        } else {
                                            echo "Full paper";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Abstract :</td>
                                    <td><a href="<?= $paticipation->abstract_link ?>">Link Abstract</a></td>
                                </tr>
                                <tr>
                                    <td>Paper :</td>
                                    <td><a href="<?= $paticipation->paper_link ?>">Link Paper</a></td>
                                </tr>
                                <tr>
                                    <td>Field :</td>
                                    <td><?php echo $paticipation->fieldDetail ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php if ($paticipation->status == "0") { ?>
                            <div class="alert alert-info">
                                Your article is in progress. You will recieve  message from reviewer.
                            </div>
                        <?php } else if ($paticipation->status == "1") { ?>
                            <div class="alert alert-success" >
                                Congratulations! We accepted your paper .
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <hr>
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
                                    paper: {
                                        required: true,
                                        extension: "doc|docx|pdf"
                                    },
                                    field_type: {
                                        required: true,
                                    },
                                    participation_type: {
                                        required: true,
                                    },
                                    paper_type: {
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
                                    paper: {
                                        required: "<p class='text-danger'>This field is required.</p>",
                                        extension: "<p class='text-danger'>File type invalid. (.doc .docx .pdf)</p>"
                                    },
                                    field_type: {
                                        required: "<p class='text-danger'>Please select an items.</p>",
                                    },
                                    participation_type: {
                                        required: "<p class='text-danger'>Please select an items.</p>",
                                    },
                                    paper_type: {
                                        required: "<p class='text-danger'>Please select an items.</p>",
                                    }
                                }
                            });

                            var form = $("#submitPaper");
                            form.validate();
                            console.log(form);
                            function sendData() {
                                if (form.valid()) {
                                    $("#Part_c").html($("#participation_type option:selected").text());
                                    $("#title_c").html($("#paper_title").val());
                                    $("#pub_c").html($("#paper_type option:selected").text());
                                    $("#Abstract_c").html($("#abstract").val().split('\\').pop());
                                    $("#paper_c").html($("#paper").val().split('\\').pop());
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