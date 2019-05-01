<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    	<!-- Start Header -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title"><i class="md md-mail"></i> Add new Language String</h4>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo BASE_URL ?>"><?php echo SITE_TITLE ?></a></li>
                                    <li><a href="#">Language</a></li>
                                    <li class="active">New Language String</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel panel-info panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add New Language String</h3>
                                    </div>
                                    <div class="panel-body">
                                    	<!-- Content start -->
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
        								<!-- Content end -->
                                    </div>
                                </div>
        					</div>
                            <div class="col-md-4">
                                <div class="panel panel-primary panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Instruction</h3>
                                    </div>
                                    <div class="panel-body">
                                        <dl>
                                            <dt>Subject</dt><dd>The subject that will appear in recepient email</dd>
                                            <dt>Content</dt><dd>The content of the email</dd>
                                            <dt>Example</dt><dd>{{LOGIN}} placeholder will be replace by a login button. This button is generated in the controller. So, if you want to create new placeholder, make sure it is available to be use. Otherwise, the placeholder will not be populated.</dd>
                                            <dt>Title</dt><dd>Meaningful title for the email</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                    	</div> <!-- End Row -->
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    <?php echo getenv('FOOTER') ?>
                </footer>

            </div>
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->