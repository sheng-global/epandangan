    <body class="fixed-left" onload="load()">

        <!-- Begin page -->
        <div id="wrapper">

        <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="#" class="logo"><i class="icon-magnet icon-c-logo"></i><span><?php echo SITE_TITLE ?></span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1): ?>
                                <li class="hidden-xs">
                                    <a href="javascript:void(0)" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown top-menu-item-xs">
                                    <a href="javascript:void(0)" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo BASE_URL ?>assets/images/default.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo BASE_URL ?>user/profile/<?php echo $_SESSION['user_id'] ?>"><i class="ti-user m-r-10 text-custom"></i> <span data-tag="profile"></span></a></li>
                                        <li><a href="#" id="change-language"><i class="ti-pencil m-r-10"></i> <span data-tag="change-language"></span></a></li>
                                        <li><a href="<?php echo BASE_URL ?>auth/logout"><i class="ti-power-off m-r-10 text-danger"></i> <span data-tag="logout"></span></a></li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                            </ul>
                        
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo BASE_URL ?>dashboard" class="waves-effect"><i class="ti-dashboard"></i><span> Dashboard </span></a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>adminer.php" class="waves-effect" target="_blank"><i class="ti-settings"></i><span data-tag="database"></span></a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>language" class="waves-effect"><i class="ti-bookmark-alt"></i><span data-tag="language"></span></a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>user/ahli" class="waves-effect"><i class="fa fa-group"></i><span data-tag="member"></span></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 