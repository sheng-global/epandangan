            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="wrapper">
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
                                <h4 class="page-title">Edit Language String</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="header-title">Edit Translation</h3>
                               
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
                               
                </div> <!-- end container -->
            </div>
            <!-- end wrapper -->
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->