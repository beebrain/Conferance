
<div id="wrapper">
    <?php $this->load->view("template/login_nav") ?>



    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 main" id="showform">
                <h1 class="page-header">Full paper submission</h1>
                <div class="col-sm-8 col-md-offset-2" >

                    <?php if ($paper == NULL) { ?>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Full paper submission
                                <?php //print_r($paticipation)  ?>
                            </div>
                            <div class="panel-body" >

                                <form class="form form-vertical" id="submitPaper" name = "submitPaper" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/UserController/submitPaper') ?>">
                                    <div class="form-group">
                                        <label>Title <span style="color: red"> *</span>  </label>
                                        <input type="text" name = "paper_title" id = "paper_title" class="form-control " disabled="" placeholder="Title">

                                    </div>
                                    <div class="form-group">
                                        <label>Participate <span style="color: red"> *</span>  </label>
                                        <input type="text" class="form-control" value="<?= $user->detail ?>" disabled="">

                                    </div>
                                    <div class="form-group">
                                        <label>Field <span style="color: red"> *</span>  </label>
                                        <select class="form-control" id="field_type" name="field_type"  disabled="" required>
                                            <option value=""><p>Please Select</p></option>
                                            <?php
                                            foreach ($field as $key => $value) {
                                                echo "<option value='$value->code'><p>$value->Detail</p></option>";
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class = "form-group">
                                        <?php ?>
                                        <label>Full paper <span style="color: red"> *</span>  </label>
                                        <input type="file"  disabled="" class="form-control" value="Browse" name="paper" id="paper" placeholder="Department" >
                                    </div>
                                    <p><span style="color: red"> You have 3 days for resubmit your article. </span></p>

                                    <div class="form-group">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-8">  
                                            <div class="controls">
                                                <button type="button" onclick="sendData()" class="btn btn-danger pull-right disabled">
                                                    expired submit paper
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    <?php } else { ?>

                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Profile</h4>
                                    </div>
                                    <div class="modal-body">


                                        <form class="form form-vertical" id="submitPaper" name = "submitPaper" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/UserController/UpdatePaper') ?>">
                                            <div class="form-group">
                                                <label>Article Code <span style="color: red"> *</span>  </label>
                                                <input type="text" class="form-control" value="<?= $paper->article_code ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Title <span style="color: red"> *</span>  </label>
                                                <input type="text" name = "paper_title" id = "paper_title" class="form-control" placeholder="Title" value="<?= $paper->paper_title; ?>">

                                            </div>
                                            <div class="form-group">
                                                <label>Participate <span style="color: red"> *</span>  </label>
                                                <input type="text" class="form-control" value="<?= $user->detail ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Field <span style="color: red"> *</span>  </label>
                                                <select class="form-control" id="Ufield_type" name="field_type" disabled>
                                                    <?php
                                                    echo "<option value='$paper->field_type'><p>$paper->fdetail</p></option>";
                                                    ?>
                                                </select>
                                            </div>
                                            <div class = "form-group">
                                                <label>Full paper <span style="color: red"> *</span>  </label>
                                                <input type="file"  class="form-control" value="Browse" name="paper" id="Upaper" placeholder="Department" >
                                            </div>
                                            <p></p>

                                            <div class="form-group pull-right">
                                                <button type="submit">Send Paper</button>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix text-center"><h4> Your Article Detail </h4></div>
                        <table class="table table-user-information table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Information <?php
                                        $day1 = strtotime($paper->submit_date);
                                        $day2 = strtotime(date("Y-m-d"));
                                        //print_r($day2-$day1);
                                        ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 40%" class="text-left"><label>Article Code </label></td>
                                    <td><?= $paper->article_code; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%" class="text-left"><label>Paper title </label></td>
                                    <td><?= $paper->paper_title; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%" class="text-left"> <label>Field </label></td>
                                    <td><?= $paper->fdetail; ?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%" class="text-left"> <label>Type of Presentation </label></td>
                                    <td><?= $paper->detail; ?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%" class="text-left"><label>Paper</label></td>
                                    <td><a href="<?= base_url() . "upload/" . $paper->paper_link; ?>">Link</a></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%" class="text-left"><label>submit date</label></td>
                                    <td> <?= $paper->submit_date; ?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%" class="text-left"><label>Note</label></td>
                                    <td><span style="color: red"> You have 3 days for resubmit your article. </span></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        if ($day2 - $day1 > 60 * 60 * 24 * 3) {
                            echo "<span style='color: red'> You not allow to resubmit your article. </span>";
                            
                        } else {
                            ?>
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >
                                <i class="fa fa-edit" ></i>
                            </button>


                        <?php }
                    }
                    ?>

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
                                                    // $("#Confirm").hide();
                                                    jQuery.validator.setDefaults({
                                                        rules: {
                                                            paper: {
                                                                required: true,
                                                                extension: "doc|docx"
                                                            }
                                                        },
                                                        messages: {
                                                            paper: {
                                                                required: "<p class='text-danger'>This field is required.</p>",
                                                                extension: "<p class='text-danger'>File type invalid. (.doc .docx )</p>"
                                                            }
                                                        }
                                                    });

                                                    var form = $("#submitPaper");
                                                    form.validate();
                                                    function sendData() {
                                                        console.log(form);
                                                        if (form.valid()) {
                                                            form.submit();
                                                        }
                                                    }

</script>



