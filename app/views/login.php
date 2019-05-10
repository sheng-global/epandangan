	    <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="<?php echo BASE_URL ?>assets/images/logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3" data-tag="login-info"></p>
                                </div>

                                <form method="post" action="<?php echo BASE_URL ?>auth/process_login">

                                    <div class="form-group mb-3">
                                        <label for="username" data-tag="username"></label>
                                        <input class="form-control" name="username" type="text" required="" placeholder="Alamat e-mail">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password" data-tag="password"></label>
                                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-info btn-block" type="submit" name="submit" data-tag="login"></button>
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