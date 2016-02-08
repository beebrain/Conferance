
<nav class="navbar">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#userMenu">
            <span class="fa fa-bars fa-lg"></span>
        </button>


        <div class="collapse navbar-collapse">

            <ul class="nav" id="userMenu">
                <li class="active"> <a href="<?php echo base_url('index.php/UserPanel/index') ?>"><i class="fa-bullhorn fa"></i> News</a></li>
                <li><a href="<?php echo base_url('index.php/UserPanel/profile') ?>"><i class="glyphicon glyphicon-envelope"></i> Profile </a></li>
                <li><a href="<?php echo base_url('index.php/UserPanel/fullArticle') ?>"><i class="glyphicon glyphicon-cog"></i>Submit Proceeding/Full Papers</a></li>
                <li><a href="<?php echo base_url('index.php/UserPanel/payment') ?>"><i class="glyphicon glyphicon-user"></i>Payment</a></li>
                <li><a href="<?php echo base_url('index.php/UserController/logout') ?>"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
            </ul>
            <hr>
        </div>
 </nav>