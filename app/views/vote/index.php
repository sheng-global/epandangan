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
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Pemilihan Jawatankuasa Induk Sesi 2019-2021</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Nota: Sesi pemilihan akan dijalankan pada <strong>3 Julai 2019 mulai jam 8:30 pagi</strong>.
                                </div>
                            </div>
                        </div>
                                
                        <?php foreach($posts as $post): ?>

                        <div class="row">
                            <div class="col-12">
                                <?php 
                                    if($post['id'] == '1' || $post['id'] == '6'){
                                        $box = "<div class=\"col ribbon-box\"><div class=\"ribbon ribbon-info float-right\"><i class=\"mdi mdi-access-point mr-1\"></i>&nbsp;&nbsp;Menang Tanpa Bertanding &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>";
                                    }else{
                                        $box = "<div class=\"col\">";
                                    }
                                ?>
                                <button class="mb-4 title btn-lg"><?php echo $post['post_name'] ?></button>
                            </div> <!-- end col-->
                        </div>
                        
                        <div class="row"> 
                            <?php foreach ($candidates as $candidate): ?>
                                <?php $user = array('id' => $candidate['candidate_id'], 'controller' => 'candidate'); 
                                $get = $helper->get($user);
                                if($get) $img = BASE_URL."files/".$get[0]['file'];
                                else $img = BASE_URL."assets/images/default.jpg"; ?>

                                <?php if($post['id'] == $candidate['post_id']): ?>
                                <div class="col-md-6 col-xl-4">
                                    <div class="widget-rounded-circle card-box">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div style="width:150px !important;">
                                                    <img src="<?php echo $img ?>" class="img-fluid" alt="<?php echo $candidate['full_name'] ?>">
                                                </div>
                                            </div>

                                            <?php echo $box ?>

                                                <h5 class="mb-1 mt-2"><?php echo $candidate['full_name'] ?></h5>
                                                <p class="mb-2 text-muted"><?php echo $candidate['jawatan'] ?> - <?php echo $candidate['jabatan'] ?></p>
                                                <?php
                                                $model = new Vote_model;
                                                $data = array(
                                                    'user_id' => $candidate['candidate_id'],
                                                    'voter_id' => $_SESSION['user_id'],
                                                    'post_id' => $post['id']
                                                );
                                                $compare = $model->checkVote($data);
                                                if(!$compare){
                                                    $button = "<button type=\"button\" class=\"btn btn-secondary btn-sm waves-effect waves-light save-vote\" data-post-id=\"".$candidate['post_id']."\" data-user-id=\"".$candidate['candidate_id']."\" data-voter-id=\"".$_SESSION['user_id']."\">Pilih</button>";
                                                }else{
                                                    $button = "<button type=\"button\" class=\"btn btn-danger btn-sm waves-effect waves-light delete-vote\" data-post-id=\"".$candidate['post_id']."\" data-user-id=\"".$candidate['candidate_id']."\" data-voter-id=\"".$_SESSION['user_id']."\">Padam</button>";
                                                }
                                                if($post['id'] == '1' || $post['id'] == '6'){
                                                    $button = '';
                                                }
                                                ?>
                                                <?php echo $button ?>
                                            </div>
                                        </div> <!-- end row-->
                                    </div> <!-- end widget-rounded-circle-->
                                </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>

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
