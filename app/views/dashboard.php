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
                                    <h4 class="page-title">Pencalonan Jawatankuasa Induk Sesi 2019-2021</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

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
                                                <button type="button" class="btn btn-warning waves-effect waves-light open-modal" data-toggle="modal" data-target="#modal" data-post-id="<?php echo $post['id'] ?>">Pilih <?php echo $post['post_available'] ?> calon</button>
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
                            <button type="submit" class="btn btn-warning waves-effect waves-light" id="save-vote">Pilih</button>
                            <input type="hidden" name="post_id" id="postID">
                            <input type="hidden" name="session_id" value="<?php echo $_SESSION['user_id'] ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->