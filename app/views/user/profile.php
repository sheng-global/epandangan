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

                                <h4 class="page-title">Profile</h4>
                                <p class="text-muted page-title-alt"><?php echo $_SESSION['full_name'] ?></p>
                            </div>
                        </div>
                        
                        <div class="row">

                            <div class="col-lg-6">

                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark text-uppercase">
                                            User Details
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                            <span class="divider"></span>
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                            <span class="divider"></span>
                                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="portlet2" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <div class="list-group m-b-0">
                                                <a href="#" class="list-group-item"> 
                                                    <h4 class="list-group-item-heading">Full Name</h4> 
                                                    <p class="list-group-item-text"><?php echo $user[0]['full_name'] ?></p> 
                                                </a>
                                                <a href="#" class="list-group-item"> 
                                                    <h4 class="list-group-item-heading">E-mail Address</h4> 
                                                    <p class="list-group-item-text"><?php echo $user[0]['email'] ?></p> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                            </div>

                        </div>
                        <!-- end row -->                        
                        
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2017. All rights reserved. Pengurusan Aset Air Berhad.
                </footer>

            </div>
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->