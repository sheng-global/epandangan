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
                                <h4 class="page-title"><i class="md md-mail"></i> Add new E-mail Template</h4>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo BASE_URL ?>"><?php echo SITE_TITLE ?></a></li>
                                    <li><a href="#">E-mail Template</a></li>
                                    <li class="active">New E-mail Template</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel panel-info panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add New Template Details</h3>
                                    </div>
                                    <div class="panel-body">
                                    	<!-- Content start -->
                                    	<form method="post" role="form" action="<?php echo BASE_URL ?>template/create" novalidate="novalidate">
            								<div class="form-group">
            									<label for="subject">Subject</label>
            									<input type="text" name="subject" class="form-control" placeholder="Add your subject">
            								</div>
                                            <div class="form-group">
                                                <label for="body">Content</label>
                                                <textarea name="body" class="form-control summernote"><style type="text/css">img{max-width: 100%;}body{-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;}body{background-color: #f6f6f6;}@media only screen and (max-width: 640px){body{padding: 0 !important;}h1{font-weight: 800 !important; margin: 20px 0 5px !important;}h2{font-weight: 800 !important; margin: 20px 0 5px !important;}h3{font-weight: 800 !important; margin: 20px 0 5px !important;}h4{font-weight: 800 !important; margin: 20px 0 5px !important;}h1{font-size: 22px !important;}h2{font-size: 18px !important;}h3{font-size: 16px !important;}.container{padding: 0 !important; width: 100% !important;}.content{padding: 0 !important;}.content-wrap{padding: 10px !important;}.invoice{width: 100% !important;}}.login{-webkit-border-radius: 5; -moz-border-radius: 5; border-radius: 5px; font-family: Arial; color: #ffffff; font-size: 14px; background: #a1b2bd; padding: 10px 20px 10px 20px; text-decoration: none;}.login:hover{background: #3cb0fd; text-decoration: none;}</style><table class="body-wrap" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;"><tbody><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="container" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top" width="600"><div class="content" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;"><table class="main" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fff"><tbody><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 20px;" align="center" valign="top"><table style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" width="100%" cellspacing="0" cellpadding="0"><tbody><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top"><h2 class="aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 24px; color: #000; line-height: 1.2em; font-weight: 400; text-align: center; margin: 40px 0 0;" align="center">Title goes here</h2></td></tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0;" align="center" valign="top"><table class="invoice" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 90%; margin: 0px auto;"><tbody>{{DETAILS}}{{ORDER_DATA}}{{LOGIN}}</tbody></table></td></tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">Pengurusan Aset Air Berhad<br/>24th Floor, Menara Multi-Purpose, Capital Square,<br/>8, Jalan Munshi Abdullah,<br/>50100, Kuala Lumpur</td></tr><tr style="box-sizing: border-box; margin: 0;"><td style="font-family: Helvetica,Arial,sans-serif; color: grey; box-sizing: border-box; font-size: 10px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">This e-mail is generated by E-Office Supply system. No signature required. If you have any query regarding this system, please contact Administration.</td></tr></tbody></table></td></tr></tbody><tbody><tr><td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top">&nbsp;</td></tr></tbody></table></div></td></tr></tbody></table></textarea>
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