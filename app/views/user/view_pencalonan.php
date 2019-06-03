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
                                            <li class="breadcrumb-item active">Pencalonan</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Pencalonan</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Pencalonan</h4>
                                        <p class="text-muted font-13 mb-4">
                                            Berikut adalah senarai calon yang dicalonkan oleh ahli ini.
                                        </p>

                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Jawatan</th>
                                                    <th>Nama Calon</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($calon as $candidate): ?>
                                                <tr>
                                                    <td><?php echo $candidate['post_name'] ?></td>
                                                    <td><?php echo $candidate['full_name'] ?></td>
                                                    <td><a href="#" class="btn btn-xs btn-danger delete" data-candidate="<?php echo $candidate['candidate_id'] ?>">Padam</a></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

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