        <!-- Navigation Bar-->
        <header id="topnav">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ml-1">
                                    <?php echo $_SESSION['full_name'] ?> <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span data-tag="akaun-saya"></span>
                                </a>
                
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span data-tag="tetapan"></span>
                                </a>
                
                                <div class="dropdown-divider"></div>
                
                                <!-- item-->
                                <a href="<?php echo BASE_URL ?>auth/logout" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span data-tag="logout"></span>
                                </a>
                
                            </div>
                        </li>
                
                    </ul>
                
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index" class="logo text-center">
                            <span class="logo-lg">
                                <span class="logo-lg-text-light"><span class="text-lowercase">e</span><span data-tag="pandangan"></span> <i class="dripicons-message"></i></span>
                            </span>
                            <span class="logo-sm">
                                <span class="logo-sm-text-light"><i class="dripicons-message"></i></span>
                            </span>
                        </a>
                    </div>
                
                </div> <!-- end container-fluid-->
            </div>
            <!-- end Topbar -->
            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <?php if($_SESSION['permission'] != 'user'): ?>
                            <li><a href="<?php echo BASE_URL ?>dashboard/admin"><i class="fe-home"></i>Dashboard</a></li>
                            <li class="has-submenu"><a href="#"><i class="fe-layers"></i>Borang</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo BASE_URL ?>borang/pskl"><i class="fe-file-text"></i> PSKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>borang/ptkl"><i class="fe-file-text"></i> PBRKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>borang/tetapan"><i class="fe-settings"></i> Tetapan</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu"><a href="#"><i class="fe-calendar"></i>Jadual</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo BASE_URL ?>jadual/sesi"><i class="fe-clock"></i> Kalendar Sesi</a></li>
                                    <li><a href="<?php echo BASE_URL ?>jadual/senarai"><i class="fe-list"></i> Senarai Sesi</a></li>
                                    <li><a href="<?php echo BASE_URL ?>jadual/surat"><i class="fe-mail"></i> Surat Jemputan</a></li>
                                    <li><a href="<?php echo BASE_URL ?>jadual/tetapan"><i class="fe-settings"></i> Tetapan</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu"><a href="#"><i class="fe-users"></i>Pengguna</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo BASE_URL ?>pengguna/senarai"><i class="fe-list"></i> Senarai Pengguna</a></li>
                                    <li><a href="<?php echo BASE_URL ?>pengguna/tambah"><i class="fe-plus-circle"></i> Tambah Pengguna</a></li>
                                    <li><a href="<?php echo BASE_URL ?>pengguna/tetapan"><i class="fe-settings"></i> Tetapan</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu"><a href="#"><i class="fe-pie-chart"></i>Laporan</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo BASE_URL ?>laporan/pengguna"><i class="fe-users"></i> Jenis Pengguna</a></li>
                                    <li><a href="<?php echo BASE_URL ?>laporan/struktur"><i class="fe-life-buoy"></i> Struktur PSKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>laporan/topik"><i class="fe-box"></i> Topik PBRKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>laporan/sektor"><i class="fe-layout"></i> Sektor PBRKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>laporan/zon"><i class="fe-map-pin"></i> Zon Strategik PBRKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>laporan/borang"><i class="fe-layers"></i> Jenis Borang</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu"><a href="#"><i class="fe-settings"></i>Tetapan</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo BASE_URL ?>tetapan/index/struktur"><i class="fe-life-buoy"></i> Struktur PSKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>tetapan/index/topik"><i class="fe-box"></i> Topik PBRKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>tetapan/index/zon"><i class="fe-map-pin"></i> Zon Strategik PBRKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>tetapan/index/sektor"><i class="fe-layout"></i> Sektor PBRKL 2040</a></li>
                                    <li><a href="<?php echo BASE_URL ?>tetapan/index/lokasi"><i class="fe-map"></i> Lokasi Sesi Pendengaran</a></li>
                                    <li><a href="<?php echo BASE_URL ?>language"><i class="fe-flag"></i> Terjemahan Bahasa</a></li>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li><a href="<?php echo BASE_URL ?>dashboard"><i class="fe-home"></i>Dashboard</a></li>
                            <?php endif; ?>
                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->