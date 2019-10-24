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
                                            <li class="breadcrumb-item active">Senarai Calon</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Pencalonan Jawatan <?php echo $data[0]['post_name'] ?></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Calon</h4>
                                        <p class="text-muted font-13">
                                            Berikut adalah senarai ahli yang dicalonkan oleh ahli bagi jawatan <?php echo $data[0]['post_name'] ?> serta jumlah pencalonan yang diterima.
                                        </p>
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            Kekosongan: <?php echo $data[0]['post_available'] ?><br>
                                            Bilangan pencalonan diperlukan: <?php echo $data[0]['min_nomination_require'] ?><br>
                                            <?php if($data[0]['indicator']) echo "Nota: ".$data[0]['indicator']; ?>
                                        </div>

                                        <table id="datatable" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Jawatan</th>
                                                    <th>Jumlah</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
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