        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <img src="<?php echo BASE_URL."assets/images/fpx.png" ?>">
                                    <p class="text-muted mb-4 mt-3" data-tag="payment"></p>
                                </div>

                                <form method="post" role="form" action="<?php echo BASE_URL ?>payment/online_process" id="reload-payment" class="form-horizontal">
                                    <div class="form-group mb-3">
                                        <label for="payment_type" class="control-label">Payment for</label>
                                        <input name="payment_type" class="form-control select2" readonly required="" value="Draf PSKL2040">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="amount" class="control-label">Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">RM</span>
                                            <input type="number" id="amount" name="amount" class="form-control" value="1.00" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="bank_code" class="control-label">Payment Mode</label>
                                        <div class="radio radio-inline">
                                            <img src="<?php echo BASE_URL."assets/images/fpx.png" ?>">
                                            <input type="radio" id="fpx" value="fpx" name="payment_mode" required="" checked="checked">
                                            <label for="fpx">Internet Banking (Individual)</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email" class="control-label">E-mail</label>
                                        <input type="text" class="form-control" readonly="" value="fadlisaad@gmail.com">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div id="select_bank"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tnc" class="control-label">Terms &amp; Condition</label>
                                        <div class="text-mute">
                                            By clicking Proceed below, you are agree to FPX's <a href="https://www.mepsfpx.com.my/FPXMain/termsAndConditions.jsp" target="_new">terms and conditions</a>
                                        </div>
                                    </div>

                                    <input type="hidden" name="be_message" value="<?php echo $be_message ?>">

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-info" type="submit" name="submit" data-tag="login"></button>
                                    </div>
                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->