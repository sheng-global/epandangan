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
                                            <li class="breadcrumb-item active">Senarai Ahli Proses Pencalonan</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Senarai Ahli Proses Pencalonan</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Keahlian</h4>
                                        <p class="text-muted font-13 mb-4">
                                            Berikut adalah senarai ahli yang telah melalui proses pencalonan.
                                        </p>

                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No. Gaji</th>
                                                    <th>Nama</th>
                                                    <th>IC</th>
                                                    <th>Jawatan</th>
                                                    <th>Jumlah Calon</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <button class="btn btn-purple" id="back">Kembali</button>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-secondary" id="back" type="button">Kembali</button>
                                    </div>
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