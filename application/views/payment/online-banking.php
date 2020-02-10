
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Start Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <img src="<?php echo BASE_URL."assets/images/fpx.png" ?>" class="pull-right">
                        <h4 class="page-title">Online Banking</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Payment through FPX</h3>
                            </div>
                            <div class="panel-body">
                                <!-- Content start -->
                                <form method="post" role="form" action="<?php echo BASE_URL ?>payment/online_process" id="reload-payment" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="payment_type" class="col-sm-3 control-label">Payment for</label>
                                        <div class="col-md-6">
                                            <input name="payment_type" class="form-control select2" readonly required="" value="Wallet Topup">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount" class="col-sm-3 control-label">Amount</label>
                                        <div class="col-md-6">
                                            <div class="input-group m-t-10">
                                                <span class="input-group-addon">RM</span>
                                                <input type="number" id="amount" name="amount" class="form-control" value="1.00" required="">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="bank_code" class="col-sm-3 control-label">Payment Mode</label>
                                        <div class="col-md-3">
                                            <div class="radio radio-inline">
                                                <img src="<?php echo BASE_URL."assets/images/fpx.png" ?>">
                                                <input type="radio" id="fpx" value="fpx" name="payment_mode" required="" checked="checked">
                                                <label for="fpx">Internet Banking (Individual)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">E-mail</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly="" value="fadlisaad@gmail.com">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div id="select_bank"></div>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tnc" class="col-sm-3 control-label">Terms &amp; Condition</label>
                                        <div class="col-md-6 text-mute">
                                            By clicking Proceed below, you are agree to FPX's <a href="https://www.mepsfpx.com.my/FPXMain/termsAndConditions.jsp" target="_new">terms and conditions</a>
                                        </div>
                                    </div>

                                    <input type="hidden" name="be_message" value="<?php echo $be_message ?>">
                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-3 col-sm-9">
                                        
                                        </div>
                                    </div>
                                <!-- Content end -->
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-warning waves-effect waves-light m-b-5" id="back">Cancel</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-b-5 pull-right">Proceed</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div> <!-- container -->                 
        </div> <!-- content -->