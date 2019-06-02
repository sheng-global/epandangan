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
                                            <li class="breadcrumb-item active">Calon</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Calonan Jawatan <?php echo $data[0]['post_name'] ?></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <pre id="debug"><?php var_dump($data) ?></pre>
                                </div>
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Calon</h4>
                                        <p class="text-muted font-13">
                                            Berikut adalah keterangan ahli yang dicalonkan bagi jawatan <?php echo $data[0]['post_name'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $user = array('id' => $data[0]['user_id'], 'controller' => 'candidate'); 
                        $get = $helper->get($user);
                        if($get) $img = BASE_URL."files/".$get[0]['file'];
                        else $img = BASE_URL."assets/images/default.jpg"; ?>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="text-center card-box">
                                    <div class="pt-2 pb-2">
                                        <img src="<?php echo $img ?>" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                        <h4 class="mt-3"><a href="#" class="text-dark"><?php echo $data[0]['full_name'] ?></a></h4>
                                        <p class="text-muted"><?php echo $data[0]['post_name'] ?></p>

                                        <button type="button" class="btn btn-success btn-sm waves-effect waves-light">Layak</button>
                                        <button type="button" class="btn btn-danger btn-sm waves-effect">Tidak</button>

                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <div class="mt-3">
                                                    <h4><?php echo $data[0]['count'] ?></h4>
                                                    <p class="mb-0 text-muted text-truncate">Pencalonan</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mt-3">
                                                    <h4>$29.8k</h4>
                                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mt-3">
                                                    <h4>1125</h4>
                                                    <p class="mb-0 text-muted text-truncate">Undian</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->

                                    </div> <!-- end .padding -->
                                </div> <!-- end card-box-->
                            </div>

                            <div class="col-xl-8">
                                <div class="card-box">
                                    <div class="media mb-3">
                                        <img class="d-flex mr-3 rounded-circle avatar-lg" src="<?php echo $img ?>" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-1"><?php echo $data[0]['full_name'] ?></h4>
                                            <p class="text-muted"><?php echo $data[0]['jawatan'] ?></p>
                                            <p class="text-muted"><i class="mdi mdi-office-building"></i> <?php echo $data[0]['jabatan'] ?></p>

                                            <?php if($data[0]['to_vote'] == 'yes') { ?><a href="javascript: void(0);" class="btn- btn-xs btn-info">Hantar E-mail</a><?php } ?>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary" id="tambah-gambar">Tambah Gambar</a>
                                            <div id="add-picture">
                                                <form method="post" role="form" action="<?php echo BASE_URL ?>candidate/updateNomination" id="update-nomination" enctype="multipart/form-data">
                                                <div class="">
                                                    <input type="file" name="files" class="form-control">
                                                </div>
                                                <div class="alert alert-info">The image must be less than 2MB size, with maximum width of 800px. Please resize your image before upload. Uploading an new attachment will delete the existing one.</div>
                                                <button type="submit" class="btn btn-success waves-effect waves-light m-b-5">Update</button>
                                                <input type="hidden" name="user_id" value="<?php echo $data[0]['user_id'] ?>">
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Maklumat Peribadi</h5>
                                    <div class="">
                                        <h4 class="font-13 text-muted text-uppercase">NRIC :</h4>
                                        <p class="mb-3"><?php echo $data[0]['ic_passport'] ?></p>

                                        <h4 class="font-13 text-muted text-uppercase mb-1">Gred Jawatan :</h4>
                                        <p class="mb-3"><?php echo $data[0]['gred_jawatan'] ?></p>

                                        <h4 class="font-13 text-muted text-uppercase mb-1">Kod Jabatan :</h4>
                                        <p class="mb-3"><?php echo $data[0]['kod_jabatan'] ?></p>

                                        <h4 class="font-13 text-muted text-uppercase mb-1">Jantina :</h4>
                                        <p class="mb-3"><?php echo $data[0]['jantina'] ?></p>

                                        <h4 class="font-13 text-muted text-uppercase mb-1">No gaji :</h4>
                                        <p class="mb-0"><?php echo $data[0]['no_gaji'] ?></p>

                                    </div>

                                </div> <!-- end card-box-->
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