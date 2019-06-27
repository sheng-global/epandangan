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
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Nota: Sesi pemilihan akan dijalankan pada <strong>3 Julai 2019 mulai jam 8:30 pagi</strong>.
                                </div>


                            </div>
                        </div>

                        <?php if($nomination): ?>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Pencalonan diterima</h4>
                                <p>Sila semak pencalonan yang diterima dan sahkan pencalonan anda samada menerima atau menolak pencalonan ini sebelum 28 Jun 2019 jam 5:00 petang.</p>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($nomination as $post): ?>
                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon float-left">
                                        <?php echo $post['post_name'] ?>
                                    </div>
                                    <div class="ribbon-content">
                                        <h5><i class="mdi mdi-account-circle"></i> <?php echo $post['full_name'] ?></h5>
                                        <p class="text-muted"> <small><?php echo $post['jawatan'] ?> - <?php echo $post['jabatan'] ?></small></p>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modal-<?php echo $post['post_id'] ?>-<?php echo $post['candidate_id'] ?>" data-post-id="<?php echo $post['post_id'] ?>" <?php if($post['setuju'] == 'ya') echo "disabled" ?>>Pilihan Anda</button>
                                    </div>
                                </div>
                            </div>
                            <div id="modal-<?php echo $post['post_id'] ?>-<?php echo $post['candidate_id'] ?>" class="modal fade" tabindex="-2" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Pencalonan Jawatan <?php echo $post['post_name'] ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <h5>PENCALONAN SEBAGAI AHLI JAWATANKUASA INDUK SESI 2019-2021 PERSATUAN KAKITANGAN ISLAM DEWAN BANDARAYA KUALA LUMPUR (KESEDARAN)</h5>
                                            <p>Dengan segala hormatnya saya merujuk perkara di atas.</p>
                                            <p>Dimaklumkan bahawa tuan/puan dicalonkan secara majoriti oleh ahli persatuan bagi jawatan <strong><?php echo $post['post_name'] ?></strong> sepanjang tempoh pencalonan melalui E-Voting yang berakhir 18 Jun 2019 lalu</p>
                                            <p>Sehubungan dengan itu, selaras dengan keperluan pemilihan, tuan/puan dipohon untuk memberikan persetujuan samada  menerima atau menolak pencalonan berkenaan. </p>
                                            <p><strong>Apajua keputusan, sukacita diingatkan tuan/puan perlu mempertimbangkan kehendak ahli dan juga proses pemilihan yang dilaksanakan oleh pihak sekretariat agar lebih mudah serta lancar</strong>.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form name="agree-form" id="agree-form" class="needs-validation" novalidate>
                                                <input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>">
                                                <input type="hidden" name="candidate_id" value="<?php echo $post['candidate_id'] ?>">
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" id="tidak-setuju">Tidak Setuju</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light" id="save-nomination">Setuju</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <div class="row" style="display: none;">
                            <?php foreach($posts as $post): ?>
                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon float-left">
                                        <?php echo $post['post_name'] ?>
                                    </div>
                                    <div class="ribbon-content">
                                        <h5 class="text mt-0"><?php echo $post['post_available'] ?> kekosongan <span class="text-danger"><?php echo $post['indicator'] ?></span></h5>
                                        <?php
                                            $i = 0;
                                                foreach ($candidates as $candidate):
                                                if(($candidate['post_id'] == $post['id'])):
                                                    $i++;
                                            ?>
                                            <h5><i class="mdi mdi-account-circle"></i> <?php echo $candidate['full_name'] ?></h5>
                                            <p class="text-muted"> <small><?php echo $candidate['jawatan'] ?> - <?php echo $candidate['jabatan'] ?></small></p>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php if($i < $post['post_available']): ?>
                                            <button type="button" class="btn btn-warning waves-effect waves-light open-modal" data-toggle="modal" data-target="#modal" data-post-id="<?php echo $post['id'] ?>" disabled>Pilih <?php echo $post['post_available'] - $i ?> calon</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
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
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        Nota: Sila pastikan anda mengenali dan mendapat persetujuan dari ahli ini sebelum dicalonkan
                                    </div>
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
