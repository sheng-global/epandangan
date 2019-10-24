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
                                            <li class="breadcrumb-item"><a href="#">Language</a></li>
                                            <li class="breadcrumb-item active">Language Strings</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">New Language String</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">NewLanguage Strings</h4>
                                        
                                    	<form method="post" role="form" action="<?php echo BASE_URL ?>language/create" novalidate="novalidate">
            								<div class="form-group">
            									<label for="slug">Slug</label>
            									<input type="text" name="slug" class="form-control" placeholder="Add your slug" required="">
            								</div>
                                            <div class="form-group">
                                                <label for="content">English</label>
                                                <input type="text" name="content-en" class="form-control" placeholder="English" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Bahasa Melayu</label>
                                                <input type="text" name="content-my" class="form-control" placeholder="Bahasa Melayu" required="">
                                            </div>
                                            
            								<button type="submit" class="btn btn-success waves-effect waves-light m-b-5">Save</button>
            								<button class="btn btn-warning waves-effect waves-light m-b-5" id="back">Cancel</button>
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