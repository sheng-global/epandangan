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
                            <div class="col-md-12">
                            <h4 class="mb-4"><?php echo $post['post_name'] ?></h4>
                            <h5 class="text mt-0"><?php echo $post['post_available'] ?> kekosongan</h5>
                                <div class="card-columns">
                                <?php foreach ($candidates as $candidate): ?>
                                <?php $user = array('id' => $candidate['user_id'], 'controller' => 'candidate'); 
                                $get = $helper->get($user);
                                if($get) $img = BASE_URL."files/".$get[0]['file'];
                                else $img = BASE_URL."assets/images/default.jpg"; ?>
                                <?php if($post['id'] == $candidate['post_id']): ?>
                                    <div class="card">
                                        <img src="<?php echo $img ?>" class="card-img-top" alt="profile-image">

                                        <div class="card-body">

                                            <h5 class="card-title"><a href="#" class="text-dark"><?php echo $candidate['full_name'] ?></a></h5>
                                            <p class="card-text"><?php echo $candidate['jawatan'] ?></p>
                                            <p class="card-text"><?php echo $candidate['jabatan'] ?></p>

                                            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">Pilih</button>

                                        </div> <!-- end card-body-->
                                    </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                </div>
                            </div>
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

            <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Pilih Calon</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        </div>
                        <div class="modal-body p-4">
                            <form id="voting-form" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Calon</label>
                                        <select name="user_id" class="form-control" id="nama" style="width: 100%" data-toggle="select2" required></select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-warning waves-effect waves-light" id="save-vote">Pilih</button>
                            <input type="hidden" name="post_id" id="postID">
                            <input type="hidden" name="session_id" value="<?php echo $_SESSION['user_id'] ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
