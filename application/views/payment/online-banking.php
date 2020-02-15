        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h3 class="text-muted mb-4 mt-3">Pembayaran</h3>
                                </div>

                                <form method="post" role="form" action="<?php echo BASE_URL ?>payment/online_process" id="reload-payment" class="form-horizontal">
                                    <div class="form-group mb-3">
                                        <label for="payment_type" class="control-label">Bayaran untuk</label>
                                        <input class="form-control" readonly value="Dokumen PDF Draf PSKL2040">
                                        <input name="payment_type" type="hidden" value="web">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="language" class="control-label">Versi</label>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="my" value="my" name="language" required="" checked="checked">
                                            <label for="my">Bahasa Melayu</label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="en" value="en" name="language">
                                            <label for="en">English</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="amount" class="control-label">Jumlah (RM)</label>
                                        <input type="number" id="amount" name="amount" class="form-control" value="100.00" readonly="">
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="bank_code" class="control-label">Kaedah Pembayaran</label>
                                        <div class="radio radio-inline">
                                            <img src="<?php echo BASE_URL."assets/images/fpx.png" ?>">
                                            <input type="radio" id="fpx" value="fpx" name="payment_mode" required="" checked="checked">
                                            <label for="fpx">Perbankan Internet (Individu)</label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <img src="<?php echo BASE_URL."assets/images/migs.png" ?>">
                                            <input type="radio" id="migs" value="migs" name="payment_mode">
                                            <label for="migs">Kad Kredit</label>
                                        </div>
                                    </div>

                                    <div id="select_bank"></div>

                                    <div class="form-group mb-3">
                                        <label for="fullname" class="control-label">Nama Penuh</label>
                                        <input type="text" class="form-control" name="fullname" required="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email" class="control-label">E-mail</label>
                                        <input type="text" class="form-control" name="email" required="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="mobile" class="control-label">No. Telefon</label>
                                        <input type="text" class="form-control" name="mobile">
                                    </div>

                                    <div class="form-group">
                                        <label for="tnc" class="control-label">Terma &amp; Syarat</label>
                                        <div class="text-mute">
                                            Dengan ini saya bersetuju dengan <a href="https://www.mepsfpx.com.my/FPXMain/termsAndConditions.jsp" target="_new">Terma dan Syarat</a> FPX.
                                        </div>
                                    </div>

                                    <input type="hidden" name="be_message" value="<?php echo $be_message ?>">

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-info" type="submit" name="submit">Bayar</button>
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