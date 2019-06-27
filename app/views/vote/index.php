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
                                    Nota: Sesi pemilihan akan ditutup pada <strong>26 Jun 2019 jam 2.00 petang</strong>.
                                </div>
                            </div>
                        </div>
                                
                        <?php foreach($posts as $post): ?>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-4"><?php echo $post['post_name'] ?></h4>
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
                                                <div class="avatar-lg">
                                                    <img src="<?php echo $img ?>" class="img-fluid rounded-circle" alt="user-img">
                                                </div>
                                            </div>
                                            <div class="col">
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
                                                    $button = "<button type=\"button\" class=\"btn btn-success btn-sm waves-effect waves-light save-vote\" data-post-id=\"".$candidate['post_id']."\" data-user-id=\"".$candidate['candidate_id']."\" data-voter-id=\"".$_SESSION['user_id']."\">Pilih</button>";
                                                }else{
                                                    $button = "<button type=\"button\" class=\"btn btn-info btn-sm waves-effect waves-light\">Sudah dipilih</button>";
                                                } ?>
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
