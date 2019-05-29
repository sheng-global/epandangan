	    <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center m-auto">
                                    <a href="#">
                                        <span><img src="<?php echo BASE_URL ?>assets/images/logo.png" alt="" height="65"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3" data-tag="login-info"></p>
                                </div>

                                <form method="post" action="<?php echo BASE_URL ?>auth/process_login_voter">

                                    <div class="form-group mb-3">
                                        <label for="ic_passport" data-tag="username"></label>
                                        <input class="form-control" name="ic_passport" type="text" required="" data-toggle="input-mask" data-mask-format="000000-00-0000" data-reverse="true" placeholder="Contoh 888888-88-8888">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="no_gaji" data-tag="password"></label>
                                        <input class="form-control" name="no_gaji" type="password" required="" placeholder="Tanpa 00 dihadapan">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-warning btn-block" type="submit" name="submit" data-tag="login"></button>
                                    </div>
                                    <input type="hidden" name="redirect" id="redirect">
                                    <input type="hidden" name="token" value="<?php echo $token ?>">
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