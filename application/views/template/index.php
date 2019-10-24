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
                                <div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Action <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo BASE_URL ?>template/add">Add new email template</a></li>
                                    </ul>
                                </div>
                                <h4 class="page-title">E-mail Template</h4>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo BASE_URL ?>"><?php echo SITE_TITLE ?></a></li>
                                    <li><a href="#">E-mail Template</a></li>
                                    <li class="active">List of E-mail Template</li>
                                </ol>
                            </div>
                        </div>

            			<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">List of E-mail Template</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
            								<thead>
            									<tr>
                                                    <th>Recipient</th>
            										<th>Subject</th>
                                                    <th>Last Update</th>
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

                <footer class="footer text-right">
                    <?php echo getenv('FOOTER') ?>
                </footer>

            </div>
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->