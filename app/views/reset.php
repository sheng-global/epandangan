	    <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <!-- LOGO -->
                                    <a href="<?php echo BASE_URL ?>" class="logo text-center">
                                        <span class="logo-lg">
                                            <span class="logo-lg-text-dark">epandangan <i class="dripicons-message"></i></span>
                                        </span>
                                        <span class="logo-sm">
                                            <span class="logo-sm-text-dark"><i class="dripicons-message"></i></span>
                                        </span>
                                    </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                                        <style type="text/css">.fill{fill:#f1556c;}</style>
                                        <path class="fill" d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.707 13.946l-1.035 1.054h-.672v1h-1v1h-3v-2.292l3.146-3.185c.496 1.111 1.419 1.988 2.561 2.423zm5.293-4.279c0 2.025-1.642 3.667-3.667 3.667-2.024 0-3.666-1.642-3.666-3.667s1.642-3.667 3.666-3.667c2.025 0 3.667 1.642 3.667 3.667zm-1.375-1.375c0-.506-.41-.917-.917-.917s-.916.411-.916.917.409.917.916.917.917-.411.917-.917z"/>
                                    </svg>
                                    <p class="text-muted mb-4 mt-3" data-tag="reset-info"></p>
                                </div>

                                <form method="post" action="<?php echo BASE_URL ?>auth/process_reset_password">

                                    <div class="form-group mb-3">
                                        <label for="password" data-tag="password"></label>
                                        <input class="form-control" name="password" type="password" required="" placeholder="Kata laluan yang baru" autocomplete="off">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-info" type="submit" name="submit" data-tag="reset"></button>
                                    </div>
                                    <input type="hidden" name="redirect" id="redirect">
                                    <input type="hidden" name="token" value="<?php echo $token ?>">
                                    <input type="hidden" name="expiry_token" value="<?php echo $expiry_token ?>">
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