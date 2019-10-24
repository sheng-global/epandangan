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
                                    <li class="active">Edit User</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="panel panel-purple panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit User</h3>
                                    </div>
                                    <div class="panel-body">
                                    	<!-- Content start -->
                                    	<form method="post" role="form" action="<?php echo BASE_URL ?>user/update" id="update-user">
                                        <div class="row">
                                            <div class="col-md-6">
                								<div class="form-group">
                									<label for="full_name">Full Name</label>
                									<input type="text" name="full_name" class="form-control" required value="<?php echo $data[0]['full_name'] ?>">
                								</div>
                                                <div class="form-group">
                                                    <label for="email">E-mail Address</label>
                                                    <input type="email" name="email" class="form-control" required value="<?php echo $data[0]['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role_id">User Role</label>
                                                    <select id="role_id" name="role_id" class="form-control" required>
                                                        <option value="2" <?php if($data[0]['role_id'] == '2') echo "selected='selected'"; ?>>User</option>
                                                        <option value="1" <?php if($data[0]['role_id'] == '1') echo "selected='selected'"; ?>>Administrator</option>
                                                        <option value="0" <?php if($data[0]['role_id'] == '0') echo "selected='selected'"; ?>>Super Administrator</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <div class="form-check-inline">
                                                        <div class="radio form-check-inline">
                                                            <input id="active" name="status" type="radio" value="active" <?php if($data[0]['status'] == 'active') echo "checked=\"checked\""; ?>>
                                                            <label for="active">Active</label>
                                                        </div>
                                                        <div class="radio form-check-inline">
                                                            <input id="inactive" name="status" type="radio" value="inactive" <?php if($data[0]['status'] == 'inactive') echo "checked=\"checked\""; ?>>
                                                            <label for="inactive">Inactive</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        								<!-- Content end -->
                                    </div>
                                    <div class="panel-footer">
                                        <div class="form-group text-right m-b-0">
                                            <input type="hidden" name="id" value="<?php echo $data[0]['user_id'] ?>">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light m-b-5">Update</button>
                                            <button type="button" class="btn btn-warning waves-effect waves-light m-b-5" id="back">Cancel</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
        					</div>
                            <div class="col-md-3">
                                <div class="panel panel-primary panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Instruction</h3>
                                    </div>
                                    <div class="panel-body">
                                        <dl>
                                            <dt>Administrator</dt><dd></dd>
                                            <dt>Approver Level</dt><dd>If the user is approver, all user under his/her approval will be removed.</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- container -->
                               
                    </div> <!-- content -->

                <footer class="footer text-right">
                    <?php echo getenv('FOOTER') ?>
                </footer>

            </div>
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->