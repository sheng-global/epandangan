        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h3 class="text-muted mb-4 mt-3">Muat Turun</h3>
                                </div>

                                <?php
                                    $limit = getenv('DOWNLOAD_COUNT_LIMIT') - $data[0]['count'];
                                ?>

                                <div class="mb-0 text-center">
                                    <p>Dokumen: Draf Pelan Struktur 2040</p>
                                    <p>Saiz: 300 MB</p>
                                    <p>Had muat-turun: <?php echo $limit ?> kali</p>
                                </div>

                                <?php if($limit > 0): ?>
                                <div class="form-group mb-0 text-center">
                                    <a class="btn btn-info" href="<?php echo $data[0]['link'] ?>" onClick="updateCount()">Muat turun</a>
                                </div>
                                <?php else: ?>
                                    <div class="alert alert-danger">
                                        Makluman: Had muat turun dokumen ini telah tamat. Sila hubungi urusetia di klmycity2040@dbkl.gov.my bagi mendapatkan pautan muat turun yang baru.
                                    </div>
                                <?php endif; ?>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->