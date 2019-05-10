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
                                            <li class="breadcrumb-item active">Language Strings</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Language Strings</h4>
                                </div>
                            </div>
                        </div>

            			<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <h4 class="header-title">List of Language Strings</h4>
                                        <div class="text-sm-right">
                                            <div class="btn-group pull-right m-t-15">
                                                <a href="<?php echo BASE_URL ?>language/add" class="btn btn-info waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-plus-circle mr-1"></i> Add new language string</a>
                                                <a href="#" id="regenerate-language" class="btn btn-danger waves-effect waves-light mb-2"><i class="mdi mdi-reload mr-1"></i> Regenerate language files</a>
                                            </div>
                                        </div>

                                        <table id="datatable" class="table table-striped dt-responsive nowrap">
            								<thead>
            									<tr>
                                                    <th>Slug</th>
            										<th>Language</th>
                                                    <th>Content</th>
                                                    <th>Action</th>
            									</tr>
            								</thead>
            							</table>
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