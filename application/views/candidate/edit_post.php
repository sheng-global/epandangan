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
                                            <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>"><?php echo SITE_TITLE ?></a></li>
                                            <li class="breadcrumb-item"><a href="#">Jawatan</a></li>
                                            <li class="breadcrumb-item active">Ubah Jawatan</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Ubah Jawatan</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        
                                    	<form method="post" role="form" action="<?php echo BASE_URL ?>candidate/update_post" novalidate="novalidate">
            								<div class="form-group">
            									<label for="post_name">Nama Jawatan</label>
            									<input type="text" name="post_name" class="form-control" value="<?php echo $data[0]['post_name'] ?>" required="">
            								</div>

                                            <div class="form-group">
                                                <label for="post_available">Kekosongan</label>
                                                <input type="number" name="post_available" class="form-control" value="<?php echo $data[0]['post_available'] ?>" required="">
                                            </div>

                                            <div class="form-group">
                                                <label for="min_nomination_require">Jumlah pencalonan minima</label>
                                                <input type="number" name="min_nomination_require" class="form-control" value="<?php echo $data[0]['min_nomination_require'] ?>" required="">
                                            </div>

                                            <div class="form-group">
                                                <label for="indicator">Syarat-syarat</label>
                                                <input type="text" name="indicator" class="form-control" value="<?php echo $data[0]['indicator'] ?>">
                                            </div>

            								<button type="submit" class="btn btn-success waves-effect waves-light m-b-5">Save</button>
            								<button class="btn btn-warning waves-effect waves-light m-b-5" id="back">Cancel</button>
                                            <input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
        								</form>
        								</div>
                                </div>
                            </div>

                        </div> <!-- End Row -->

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