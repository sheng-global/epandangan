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
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-info rounded">
                                                <i class="fe-aperture avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1">$<span data-plugin="counterup">12,145</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Income status</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-uppercase">Target <span class="float-right">60%</span></h6>
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->

                            <div class="col-md-6 col-xl-4">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-primary rounded">
                                                <i class="fe-shopping-cart avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">1576</span></h3>
                                                <p class="text-muted mb-1 text-truncate">January's Sales</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-uppercase">Target <span class="float-right">49%</span></h6>
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="49" aria-valuemin="0" aria-valuemax="100" style="width: 49%">
                                                <span class="sr-only">49% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->

                            <div class="col-md-6 col-xl-4">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-primary rounded">
                                                <i class="fe-cpu avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">178</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Available Stores</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-uppercase">Target <span class="float-right">74%</span></h6>
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%">
                                                <span class="sr-only">74% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-columns">
                                <?php foreach($posts as $post): ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <i class="mdi mdi-access-point mr-1"></i> <?php echo $post['post_name'] ?>
                                            </div>
                                            <div class="card-content">
                                                <h5 class="text mt-0"><?php echo $post['post_available'] ?> kekosongan <span class="text-danger"><?php echo $post['indicator'] ?></span></h5>
                                                <?php
                                                $i = 0;
                                                    foreach ($candidates as $candidate):
                                                    if(($candidate['post_id'] == $post['id'])):
                                                        $i++;
                                                ?>
                                                <h5><?php echo $candidate['full_name'] ?></h5>
                                                <p><?php echo $candidate['jawatan'] ?> - <?php echo $candidate['jabatan'] ?></p>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php if($i < $post['post_available']): ?>
                                                <button type="button" class="btn btn-primary waves-effect waves-light open-modal" data-toggle="modal" data-target="#modal" data-post-id="<?php echo $post['id'] ?>">Pilih <?php echo $post['post_available'] ?> calon</button>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
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
                            <button type="submit" class="btn btn-info waves-effect waves-light" id="save-vote">Pilih</button>
                            <input type="hidden" name="post_id" id="postID">
                            <input type="hidden" name="session_id" value="<?php echo $_SESSION['user_id'] ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->