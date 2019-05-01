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
                                <h4 class="page-title">Translation Details</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Translation</h3>
                                    </div>
                                    <div class="panel-body">
                                    	<!-- Content start -->
                                    	<form method="post" role="form" action="<?php echo BASE_URL ?>language/update" novalidate="novalidate" id="edit-language">
            								<div class="form-group">
            									<label for="slug">Slug</label>
            									<input type="text" name="slug" class="form-control" value="<?php echo $data[0]['slug'] ?>">
            								</div>
                                            <div class="form-group">
                                                <label for="language">Language</label>
                                                <input type="text" name="language" class="form-control" value="<?php echo $data[0]['language'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea name="content" class="form-control"><?php echo $data[0]['content'] ?></textarea>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
            								<button type="submit" class="btn btn-success waves-effect waves-light m-b-5">Save</button>
            								<button class="btn btn-warning waves-effect waves-light m-b-5" id="back">Cancel</button>
                            				<a href="#" class="btn btn-danger waves-effect waves-light m-b-5" id="delete">Delete</a>
        								</form>
        								<!-- Content end -->
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