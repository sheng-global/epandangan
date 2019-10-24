            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">User</h4>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo BASE_URL ?>"><?php echo SITE_TITLE ?></a></li>
                                    <li><a href="<?php echo BASE_URL ?>user">User</a></li>
                                    <li class="active">Add new User</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-purple panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add new User</h3>
                                    </div>
                                    <div class="panel-body">
                                    	<!-- Content start -->
                                    	<form method="post" role="form" action="<?php echo BASE_URL ?>user/create" id="add-user">
                                            <div class="row">
                                                <div class="col-md-6">
                    								<div class="form-group">
                    									<label for="full_name">Full Name</label>
                    									<input type="text" name="full_name" class="form-control" required>
                    								</div>
                                                    <div class="form-group">
                                                        <label for="email">E-mail Address</label>
                                                        <input type="email" name="email" class="form-control" required>
                                                        <span class="help-block"><small>Please make sure the e-mail address is tally with AD</small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="role_id">User Role</label>
                                                        <select id="role_id" name="role_id" class="form-control" required>
                                                            <option value="2">User</option>
                                                            <option value="1">Administrator</option>
                                                            <option value="0">Super Administrator</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
        								<!-- Content end -->
                                    </div>
                                    <div class="panel-footer">
                                        <div class="form-group text-right m-b-0">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light m-b-5">Save</button>
                                            <button class="btn btn-warning waves-effect waves-light m-b-5" id="back">Cancel</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
        					</div>

                        </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2018. All rights reserved. Pengurusan Aset Air Berhad.
                </footer>

            </div>
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->