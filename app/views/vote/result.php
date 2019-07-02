            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo SITE_TITLE ?></a></li>
                                            <li class="breadcrumb-item active">Keputusan Pemilihan</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Keputusan Pemilihan Jawatankuasa Induk Sesi 2019-2021</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">

                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-12">
                                        <button class="mb-2 btn-info btn-lg">Timbalan Yang Dipertua</button>
                                    </div> <!-- end col-->
                                </div>
                                
                                <div class="row"> 
                                    <?php
                                        $total = count($post2);
                                        foreach ($post2 as $candidate):
                                        $user = array('id' => $candidate['id'], 'controller' => 'candidate'); 
                                        $get = $helper->get($user);
                                        if($get) $img = BASE_URL."files/".$get[0]['file'];
                                        else $img = BASE_URL."assets/images/default.jpg";
                                        $percentage = number_format(($candidate['count']/$total)*100, 2);
                                    ?>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="widget-rounded-circle card-box">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-lg">
                                                            <img src="<?php echo $img ?>" class="img-fluid" alt="<?php echo $candidate['full_name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="mb-1 mt-2"><?php echo $candidate['full_name'] ?></h5>
                                                        <p class="mb-2 text-muted"><?php echo $candidate['jawatan'] ?></p>
                                                        <div class="mt-3">
                                                            <h6 class="text-uppercase">Peratusan Undian <span class="float-right"><?php echo $percentage ?>%</span></h6>
                                                            <div class="progress progress-sm m-0">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient" role="progressbar" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage ?>%">
                                                                    <span class="sr-only"><?php echo $percentage ?>% Undi</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row-->
                                            </div> <!-- end widget-rounded-circle-->
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-12">
                                        <button class="mb-2 btn-success btn-lg">Naib Yang Dipertua Muslimin</button>
                                    </div> <!-- end col-->
                                </div>
                                
                                <div class="row"> 
                                    <?php
                                        $total = count($post3);
                                        foreach ($post3 as $candidate):
                                        $user = array('id' => $candidate['id'], 'controller' => 'candidate'); 
                                        $get = $helper->get($user);
                                        if($get) $img = BASE_URL."files/".$get[0]['file'];
                                        else $img = BASE_URL."assets/images/default.jpg";
                                        $percentage = number_format(($candidate['count']/$total)*100, 2);
                                    ?>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="widget-rounded-circle card-box">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-lg">
                                                            <img src="<?php echo $img ?>" class="img-fluid" alt="<?php echo $candidate['full_name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="mb-1 mt-2"><?php echo $candidate['full_name'] ?></h5>
                                                        <p class="mb-2 text-muted"><?php echo $candidate['jawatan'] ?></p>
                                                        <div class="mt-3">
                                                            <h6 class="text-uppercase">Peratusan Undian <span class="float-right"><?php echo $percentage ?>%</span></h6>
                                                            <div class="progress progress-sm m-0">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient" role="progressbar" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage ?>%">
                                                                    <span class="sr-only"><?php echo $percentage ?>% Undi</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row-->
                                            </div> <!-- end widget-rounded-circle-->
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="mb-2 btn-pink btn-lg">Naib Yang Dipertua Muslimat</button>
                            </div> <!-- end col-->
                        </div>
                        
                        <div class="row"> 
                            <?php
                                $total = count($post4);
                                foreach ($post4 as $candidate):
                                $user = array('id' => $candidate['id'], 'controller' => 'candidate'); 
                                $get = $helper->get($user);
                                if($get) $img = BASE_URL."files/".$get[0]['file'];
                                else $img = BASE_URL."assets/images/default.jpg";
                                $percentage = number_format(($candidate['count']/$total)*100, 2);
                            ?>

                                <div class="col-md-6 col-xl-3">
                                    <div class="widget-rounded-circle card-box">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-lg">
                                                    <img src="<?php echo $img ?>" class="img-fluid" alt="<?php echo $candidate['full_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="mb-1 mt-2"><?php echo $candidate['full_name'] ?></h5>
                                                <p class="mb-2 text-muted"><?php echo $candidate['jawatan'] ?></p>
                                                <div class="mt-3">
                                                    <h6 class="text-uppercase">Peratusan Undian <span class="float-right"><?php echo $percentage ?>%</span></h6>
                                                    <div class="progress progress-sm m-0">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient" role="progressbar" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage ?>%">
                                                            <span class="sr-only"><?php echo $percentage ?>% Undi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div> <!-- end widget-rounded-circle-->
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="mb-2 btn-warning btn-lg">Setiausaha</button>
                            </div> <!-- end col-->
                        </div>
                        
                        <div class="row"> 
                            <?php
                                $total = count($post5);
                                foreach ($post5 as $candidate):
                                $user = array('id' => $candidate['id'], 'controller' => 'candidate'); 
                                $get = $helper->get($user);
                                if($get) $img = BASE_URL."files/".$get[0]['file'];
                                else $img = BASE_URL."assets/images/default.jpg";
                                $percentage = number_format(($candidate['count']/$total)*100, 2);
                            ?>

                                <div class="col-md-6 col-xl-3">
                                    <div class="widget-rounded-circle card-box">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-lg">
                                                    <img src="<?php echo $img ?>" class="img-fluid" alt="<?php echo $candidate['full_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="mb-1 mt-2"><?php echo $candidate['full_name'] ?></h5>
                                                <p class="mb-2 text-muted"><?php echo $candidate['jawatan'] ?></p>
                                                <div class="mt-3">
                                                    <h6 class="text-uppercase">Peratusan Undian <span class="float-right"><?php echo $percentage ?>%</span></h6>
                                                    <div class="progress progress-sm m-0">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient" role="progressbar" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage ?>%">
                                                            <span class="sr-only"><?php echo $percentage ?>% Undi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div> <!-- end widget-rounded-circle-->
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="mb-2 btn-pink btn-lg">Ketua Biro Helwa</button>
                            </div> <!-- end col-->
                        </div>
                        
                        <div class="row"> 
                            <?php
                                $total = count($post7);
                                foreach ($post7 as $candidate):
                                $user = array('id' => $candidate['id'], 'controller' => 'candidate'); 
                                $get = $helper->get($user);
                                if($get) $img = BASE_URL."files/".$get[0]['file'];
                                else $img = BASE_URL."assets/images/default.jpg";
                                $percentage = number_format(($candidate['count']/$total)*100, 2);
                            ?>

                                <div class="col-md-6 col-xl-3">
                                    <div class="widget-rounded-circle card-box">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-lg">
                                                    <img src="<?php echo $img ?>" class="img-fluid" alt="<?php echo $candidate['full_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="mb-1 mt-2"><?php echo $candidate['full_name'] ?></h5>
                                                <p class="mb-2 text-muted"><?php echo $candidate['jawatan'] ?></p>
                                                <div class="mt-3">
                                                    <h6 class="text-uppercase">Peratusan Undian <span class="float-right"><?php echo $percentage ?>%</span></h6>
                                                    <div class="progress progress-sm m-0">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient" role="progressbar" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage ?>%">
                                                            <span class="sr-only"><?php echo $percentage ?>% Undi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div> <!-- end widget-rounded-circle-->
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="mb-2 btn-dark btn-lg">Ahli Jawatankuasa</button>
                            </div> <!-- end col-->
                        </div>
                        
                        <div class="row"> 
                            <?php
                                $total = count($post8);
                                foreach ($post8 as $candidate):
                                $user = array('id' => $candidate['id'], 'controller' => 'candidate'); 
                                $get = $helper->get($user);
                                if($get) $img = BASE_URL."files/".$get[0]['file'];
                                else $img = BASE_URL."assets/images/default.jpg";
                                $percentage = number_format(($candidate['count']/$total)*100, 2);
                            ?>

                                <div class="col-md-6 col-xl-3">
                                    <div class="widget-rounded-circle card-box">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-lg">
                                                    <img src="<?php echo $img ?>" class="img-fluid" alt="<?php echo $candidate['full_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="mb-1 mt-2"><?php echo $candidate['full_name'] ?></h5>
                                                <p class="mb-2 text-muted"><?php echo $candidate['jawatan'] ?></p>
                                                <div class="mt-3">
                                                    <h6 class="text-uppercase">Peratusan Undian <span class="float-right"><?php echo $percentage ?>%</span></h6>
                                                    <div class="progress progress-sm m-0">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient" role="progressbar" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage ?>%">
                                                            <span class="sr-only"><?php echo $percentage ?>% Undi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div> <!-- end widget-rounded-circle-->
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="mb-2 btn-blue btn-lg">Pemeriksa Kira Kira</button>
                            </div> <!-- end col-->
                        </div>
                        
                        <div class="row"> 
                            <?php
                                $total = count($post9);
                                foreach ($post9 as $candidate):
                                $user = array('id' => $candidate['id'], 'controller' => 'candidate'); 
                                $get = $helper->get($user);
                                if($get) $img = BASE_URL."files/".$get[0]['file'];
                                else $img = BASE_URL."assets/images/default.jpg";
                                $percentage = number_format(($candidate['count']/$total)*100, 2);
                            ?>

                                <div class="col-md-6 col-xl-3">
                                    <div class="widget-rounded-circle card-box">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-lg">
                                                    <img src="<?php echo $img ?>" class="img-fluid" alt="<?php echo $candidate['full_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="mb-1 mt-2"><?php echo $candidate['full_name'] ?></h5>
                                                <p class="mb-2 text-muted"><?php echo $candidate['jawatan'] ?></p>
                                                <div class="mt-3">
                                                    <h6 class="text-uppercase">Peratusan Undian <span class="float-right"><?php echo $percentage ?>%</span></h6>
                                                    <div class="progress progress-sm m-0">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient" role="progressbar" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage ?>%">
                                                            <span class="sr-only"><?php echo $percentage ?>% Undi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div> <!-- end widget-rounded-circle-->
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo getenv('FOOTER') ?>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
