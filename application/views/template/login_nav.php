<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">MemberSection</a>
    </div>
    <!-- /.navbar-header -->

    <div class="navbar-collapse collapse" style="padding-right: 10px">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#Registration">Call for papers</a>
            </li>
            <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#Important">Important Date</a>
            </li>
            <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#committee">committee</a>
            </li>
            <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#Author">Author Guideline</a>
            </li>
            <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#Venue">Venue & Lodging</a>
            </li>
            <li><a href="<?php echo base_url('index.php/MainController/index/') ?>/#login">login</a>
            </li>
            <li><a href="#contact">contact</a>
            </li>
        </ul>
    </div>




    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li ><a href="<?php echo base_url('index.php/UserPanel/index') ?>"><i class="fa-bullhorn fa"> </i> Main</a></li>
                <li > <a href="<?php echo base_url('index.php/UserPanel/profile') ?>"><i class="fa-user fa"> </i> Profile</a></li>
                <li><a href="<?php echo base_url('index.php/UserPanel/AbArticle') ?>"><i class="fa fa-reorder"> </i> Abstract Submission </a></li>
                <li><a href="<?php echo base_url('index.php/UserPanel/fullArticle') ?>"><i class="fa fa-paper-plane"> </i> Full paper Submission </a></li>
                <li><a href="<?php echo base_url('index.php/UserPanel/payment') ?>"><i class="fa fa-money"> </i> Payment</a></li>
                <li><a href="<?php echo base_url('index.php/UserPanel/listArticle') ?>"><i class="fa fa-money"> </i> List of Abstract Submission</a></li>
                <li><a href="<?php echo base_url('index.php/UserController/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

