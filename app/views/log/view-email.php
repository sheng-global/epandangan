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

                                <h4 class="page-title">E-mail Log</h4>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo BASE_URL ?>"><?php echo SITE_TITLE ?></a></li>
                                    <li>Log</li>
                                    <li>E-mail Log</li>
                                    <li class="active">Log #<?php echo $data[0]['id'] ?></li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box m-t-20">
                                    <h4 class="m-t-0 font-18"><b><?php echo $data[0]['subject'] ?></b></h4>

                                    <hr>

                                    <div class="media m-b-30">
                                        <div class="media-body">
                                            <span class="media-meta pull-right">Sent on: <?php echo $data[0]['last_update'] ?></span>
                                            <h4 class="text-primary font-16 m-0">Recipient: <?php echo $data[0]['recipient'] ?></h4>
                                            <small class="text-muted">From: no-reply@paab.my</small>
                                        </div>
                                    </div>
                                    <?php echo $data[0]['body'] ?>

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