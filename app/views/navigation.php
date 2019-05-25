    <body class="" onload="load()">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
        
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" href="#" role="button">
                            <img src="<?php echo BASE_URL ?>assets/images/default.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                <?php echo $_SESSION['full_name'] ?>
                            </span>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="<?php echo BASE_URL ?>auth/logout" class="nav-link right-bar-toggle waves-effect waves-light">
                            Log Keluar <i class="fe-log-out"></i>
                        </a>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="#" class="logo text-center">
                        <span class="logo-lg">
                            <span class="logo-lg-text-light"><img src="<?php echo BASE_URL ?>assets/images/logo-sm.png" alt="" height="24"><?php echo getenv('SITE_TITLE') ?></span>
                        </span>
                        <span class="logo-sm">
                            <img src="<?php echo BASE_URL ?>assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>
                            <li>
                                <a href="<?php echo BASE_URL ?>dashboard" class="waves-effect"><i class="fa fa-users"></i><span> Pencalonan </span></a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="ti-pencil"></i><span> Pemilihan </span></a>
                            </li>
                        <?php if($_SESSION['role'] != 'voter'): ?>
                            <li>
                                <a href="<?php echo BASE_URL ?>adminer.php" class="waves-effect" target="_blank"><i class="ti-settings"></i><span data-tag="database"></span></a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>language" class="waves-effect"><i class="ti-bookmark-alt"></i><span data-tag="language"></span></a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>user/ahli" class="waves-effect"><i class="fa fa-users"></i><span data-tag="member"></span></a>
                            </li>
                            <li>
                                <?php $model = new Controller;
                                $data = $model->loadModel('Vote_model');
                                $lists = $data->getPosts();?>
                                <a href="javascript: void(0);" class="waves-effect"><i class="fa fa-users"></i><span data-tag="candidate"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <?php foreach ($lists as $list) { ?>
                                    <li><a href="<?php echo BASE_URL ?>candidate/view/<?php echo $list['id'] ?>"><?php echo $list['post_name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            
                        <?php endif; ?>
                        </ul>
                    </div>
                    <!-- End Sidebar -->
                    <div id="demo"></div>

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->